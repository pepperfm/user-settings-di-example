<?php

declare(strict_types=1);

namespace App\Services\SecondSuggestion;

use Illuminate\Contracts\Auth\Authenticatable;

class TelegramService extends BaseNotificationService
{
    /**
     * @inheritdoc
     */
    public function send(Authenticatable $user): void
    {
        // TODO: Implement send() method.
    }
}
