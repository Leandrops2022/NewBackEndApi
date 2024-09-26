<?php

namespace App\Services;

use App\Contracts\Services\HandleErrorServiceInterface;
use Illuminate\Support\Facades\Log;

class HandleErrorService implements HandleErrorServiceInterface
{
    public function handleError($e): array
    {
        Log::error('Error: '.$e->getMessage().' in '.$e->getFile().' on line'.$e->getLine());

        $message = $e->getMessage();

        return [
            'message' => $message,
        ];
    }
}
