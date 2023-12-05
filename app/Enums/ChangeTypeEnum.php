<?php

declare(strict_types=1);

namespace App\Enums;

enum ChangeTypeEnum: int
{
    case EMAIL = 0;

    case TELEGRAM = 1;

    case SMS = 2;

    public function label(): string
    {
        return match ($this) {
            self::EMAIL => 'email',
            self::TELEGRAM => 'telegram',
            self::SMS => 'sms',
        };
    }
}
