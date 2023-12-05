<?php

declare(strict_types=1);

namespace App\Contracts\SecondSuggestion;

use Illuminate\Contracts\Container\BindingResolutionException;
use App\Services\SecondSuggestion;

interface NotificationContract
{
    /**
     * Build a Layout provider instance.
     *
     * @param string|null $driver
     *
     * @throws BindingResolutionException
     *
     * @return SecondSuggestion\SmsService|SecondSuggestion\TelegramService|SecondSuggestion\EmailService
     */
    public function from(?string $driver): SecondSuggestion\BaseNotificationService;
}
