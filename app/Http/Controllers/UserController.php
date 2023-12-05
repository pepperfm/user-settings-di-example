<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\FirstSuggestion\ServiceContract;
use App\Contracts\SecondSuggestion\NotificationContract;
use App\Models\User;

class UserController
{
    /**
     * @param Request $request
     *
     * @return void
     */
    public function changeSettingsRequestFirst(Request $request)
    {
        $user = User::query()->first();
        $service = $this->resolveServiceInstanceFromType($request->input('type', 'telegram'));
        $service->send($user);
    }

    private function resolveServiceInstanceFromType(string $type = 'telegram'): ServiceContract
    {
        $serviceClass = '\\App\\Services\\' . str($type)->lower()->ucfirst()->value() . 'Service';
        $service = app($serviceClass) ?? null;

        if (!$service) {
            throw new \InvalidArgumentException("Notification for [$type] not supported.");
        }
        if (!$service instanceof ServiceContract) {
            throw new \TypeError('Service must implement ' . ServiceContract::class . ' interface.');
        }

        return $service;
    }

    /*
     * ----------------------------------------
     */

    /**
     * @param Request $request
     * @param NotificationContract $factory
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @return void
     */
    public function changeSettingsRequestSecond(Request $request, NotificationContract $factory)
    {
        $user = User::query()->first();
        $service = $factory->from($request->input('type', 'telegram'));
        $service->send($user);
    }
}
