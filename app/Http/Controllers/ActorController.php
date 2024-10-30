<?php

namespace App\Http\Controllers;

use App\Contracts\Services\ActorServiceInterface;
use App\Contracts\Services\HandleErrorServiceInterface;
use App\Http\Resources\ActorResource;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ActorController extends Controller
{
    public function __construct(protected ActorServiceInterface $actorService, protected HandleErrorServiceInterface $errorHandler) {}

    public function show($slug)
    {
        try {
            $data = new ActorResource($this->actorService->getActor($slug));
            return ["actorData" => $data];
        } catch (ModelNotFoundException $e) {
            return response()->json($this->errorHandler->handleError($e), 400);
        } catch (Exception $e) {
            return response()->json($this->errorHandler->handleError($e), 500);
        }
    }
}
