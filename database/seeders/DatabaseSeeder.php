<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\ChangeTypeEnum;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ])->settings()->updateOrCreate([
            'additional_phone' => '88005553535',
            'telegram' => '@test',
            'email' => 'test@test.com',
            'change_type' => collect(ChangeTypeEnum::cases())->shuffle()->first(),
        ]);
    }
}
