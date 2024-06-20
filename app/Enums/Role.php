<?php

namespace App\Enums;

enum Role : string
{
    case USER = 'user';
    case ADMINISTRATOR = 'administrator';
    case MODERATOR = 'moderator';

    /**
     * Return the values as an array
     *
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
