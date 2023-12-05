<?php

declare(strict_types=1);

namespace App\Services\FirstSuggestion;

use Illuminate\Contracts\Auth\Authenticatable;
use App\Contracts\FirstSuggestion\ServiceContract;

class SmsService implements ServiceContract
{
    /**
     * @inheritdoc
     */
    public function send(Authenticatable $user): void
    {
        // TODO: Implement send() method.
    }
}
