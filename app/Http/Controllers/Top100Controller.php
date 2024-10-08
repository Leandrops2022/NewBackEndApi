<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Top100ServiceInterface;

class Top100Controller extends Controller
{
    public function __construct(private Top100ServiceInterface $top100Service) {}

    public function index()
    {
        return response()->json($this->top100Service->getTop100List());
    }

    public function getTop100Suggestions()
    {
        return response()->json($this->top100Service->getTop100Suggestions());
    }

    public function getTop100Data($slug)
    {
        return response()->json($this->top100Service->getTop100Data($slug));
    }

    public function getTop100Text($slug)
    {
        return response()->json($this->top100Service->getTop100Text($slug));
    }
}
