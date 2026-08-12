<?php

namespace App\Enums;

enum Gender: string
{
    case Male = 'Male';
    case Female = 'Female';

    public function label(): string
    {
        return match ($this) {
            self::Male => 'Male',
            self::Female => 'Female',
        };
    }
}
