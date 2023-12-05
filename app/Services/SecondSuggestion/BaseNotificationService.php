<?php

declare(strict_types=1);

namespace App\Services\SecondSuggestion;

use Illuminate\Contracts\Auth\Authenticatable;

abstract class BaseNotificationService
{
    /**
     * @param \App\Models\User $user
     *
     * @return void
     */
    abstract public function send(Authenticatable $user): void;
}
