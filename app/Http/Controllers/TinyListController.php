<?php

namespace App\Http\Controllers;

use App\Contracts\Services\HandleErrorServiceInterface;
use App\Contracts\Services\TinyListServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class TinyListController extends Controller
{
    public function __construct(protected TinyListServiceInterface $tinyListService, protected HandleErrorServiceInterface $handleErrorService) {}

    public function index(): LengthAwarePaginator
    {
        $data = $this->tinyListService->getAllTinyLists();

        return $data;
    }

    public function show($slug)
    {
        try {

            $data = $this->tinyListService->getTinyListAndHighlights($slug);

            return response()->json($data, 200);
        } catch (ModelNotFoundException) {
            return response()->json([
                'error' => "The resource you're looking for could not be found",
            ], 404);
        } catch (Exception $e) {
            $message = $this->handleErrorService->handleError($e);

            return response()->json($message, 500);
        }
    }
}
