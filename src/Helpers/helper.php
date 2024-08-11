<?php

use Mrkatz\FlashMessage\Flash;

if (!function_exists('flash')) {
    function flash($message = null, $type = 'info', $timeout = 5000)
    {
        $flash = app(Flash::class);

        if ($message) {
            return $flash->message($message, $type, $timeout);
        }

        return $flash;
    }
}
