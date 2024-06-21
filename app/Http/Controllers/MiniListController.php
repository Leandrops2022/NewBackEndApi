<?php

namespace App\Http\Controllers;

use App\Models\MiniList;
use Illuminate\Http\Request;

class MiniListController extends Controller
{
    public function showMinilista($slug)
    {
        $data = MiniList::where('slug', $slug)->firstOrFail();
        return response()->json($data);
    }
}
