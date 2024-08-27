<?php

namespace App\Services;

use App\Contracts\Services\HandleErrorServiceInterface;
use Illuminate\Support\Facades\Log;

class HandleErrorService implements HandleErrorServiceInterface
{
    public function handleError($e): string
    {
        Log::error("Error: :". $e->getMessage()."in ".$e->getFile()."on line".$e->getLine());

        $message = "An Error has ocurred while processing your request, our developers have been notified about this error
        and it will be fixed soon. Please try again later";

        return $message;
    }
}
