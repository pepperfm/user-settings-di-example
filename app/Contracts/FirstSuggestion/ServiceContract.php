<?php

declare(strict_types=1);

namespace App\Contracts\FirstSuggestion;

use Illuminate\Contracts\Auth\Authenticatable;

interface ServiceContract
{
    /**
     * Send notification
     *
     * @param \App\Models\User $user
     *
     * @return void
     */
    public function send(Authenticatable $user): void;
}
