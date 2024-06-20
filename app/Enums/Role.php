<?php

namespace App\Enums;

enum Role
{
    case SUPERUSER = 'superuser';
    case USER = 'user';
    case ADMINISTRATOR = 'administrator';

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
