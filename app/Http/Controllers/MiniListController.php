<?php

namespace App\Http\Controllers;

use App\Services\HandleErrorService;
use App\Services\MiniListService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class MiniListController extends Controller
{
    public function __construct(protected MiniListService $miniListService, protected HandleErrorService $handleErrorService)
    {

    }

    public function index(): LengthAwarePaginator
    {
        $data = $this->miniListService->getAllMiniLists();
        return $data;
    }

    public function show($slug)
    {
        try {
            $data = $this->miniListService->getMiniListAndHighlights($slug);
            return response()->json($data, 200);
        } catch (ModelNotFoundException) {
            return response()->json([
                "error" => "The resource you're looking for could not be found"
            ], 404);
        } catch (Exception $e) {
            $message = $this->handleErrorService->handleError($e);
            return response()->json($message,500);
        }

    }

}
