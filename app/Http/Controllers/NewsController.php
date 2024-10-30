<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NewsServiceInterface;

class NewsController extends Controller
{
    public function __construct(protected NewsServiceInterface $newsService) {}

    public function index()
    {
        return response()->json($this->newsService->getAllNews());
    }

    public function show($slug)
    {
        $data = $this->newsService->getNewsAndHighlights($slug);

        return response()->json($data, 200);
    }
}
