<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\ActorRepositoryInterface;
use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use App\Models\Actor;
use Exception;
use Illuminate\Support\Facades\Log;

class ActorController extends Controller
{

    public function __construct(protected ActorRepositoryInterface $actorRepository)
    {

    }

    public function store(StoreActorRequest $request)
    {
        dd('test');
        $validatedData = $request->validated();

        try {
            $actor = $this->actorRepository->store($validatedData);

            if (isset($actor)) {
                return response()->json([
                    'id' => $actor->id,
                ], 201);
            }

            return response()->json('The operation failed', 500);
        } catch (Exception $e) {
            Log::error('Error: '.$e->getMessage());

            return response()->json('An error has ocurred', 500);
        }
    }

    public function show(Actor $actor)
    {
        //
    }


    public function edit(Actor $actor)
    {
        //
    }


    public function update(UpdateActorRequest $request, Actor $actor)
    {
        //
    }

    public function destroy(Actor $actor)
    {
        //
    }
}
