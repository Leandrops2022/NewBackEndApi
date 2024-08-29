<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use App\Models\Actor;
use Exception;
use Illuminate\Support\Facades\Log;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActorRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $actor = Actor::create($validatedData);
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

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActorRequest $request, Actor $actor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        //
    }
}
