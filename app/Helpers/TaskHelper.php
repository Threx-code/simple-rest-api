<?php

namespace App\Helpers;

use Exception;

class TaskHelper
{
    /**
     * @return int
     * @throws Exception
     */
    public static function randomNumber(): int
    {
        return random_int(1, 1000);
    }

    /**
     * @throws Exception
     */
    public static function fileName(): string
    {
        return bin2hex(random_bytes(32));
    }

}
