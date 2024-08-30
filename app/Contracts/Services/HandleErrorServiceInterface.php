<?php

namespace App\Contracts\Services;

interface HandleErrorServiceInterface
{
    public function handleError($e): array;
}
