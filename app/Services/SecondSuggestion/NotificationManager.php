<?php

declare(strict_types=1);

namespace App\Services\SecondSuggestion;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Manager;
use App\Contracts\SecondSuggestion\NotificationContract;
use App\Services\SecondSuggestion;

class NotificationManager extends Manager implements NotificationContract
{
    /**
     * @param string $provider
     *
     * @throws BindingResolutionException
     * @return SecondSuggestion\BaseNotificationService
     */
    private function buildProvider(string $provider): SecondSuggestion\BaseNotificationService
    {
        return $this->container->make($provider);
    }

    public function from(?string $driver): SecondSuggestion\BaseNotificationService
    {
        return $this->driver($driver);
    }

    /**
     * @throws BindingResolutionException
     *
     * @return SecondSuggestion\SmsService
     */
    public function createSmsDriver(): SecondSuggestion\BaseNotificationService
    {
        return $this->buildProvider(SecondSuggestion\SmsService::class);
    }

    /**
     * @throws BindingResolutionException
     *
     * @return SecondSuggestion\TelegramService
     */
    public function createTelegramDriver(): SecondSuggestion\BaseNotificationService
    {
        return $this->buildProvider(SecondSuggestion\TelegramService::class);
    }

    /**
     * @throws BindingResolutionException
     *
     * @return SecondSuggestion\EmailService
     */
    public function createEmailDriver(): SecondSuggestion\BaseNotificationService
    {
        return $this->buildProvider(SecondSuggestion\EmailService::class);
    }

    /**
     * @inheritdoc
     */
    public function getDefaultDriver(): string
    {
        return 'Telegram';
    }
}
