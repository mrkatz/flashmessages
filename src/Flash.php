<?php

namespace Mrkatz\FlashMessage;

class Flash
{
    protected $messages = [];

    public function __construct()
    {
        // Load existing flash notifications if any
        $this->messages = session()->get('flash_notifications', []);
    }

    public function message($message, $type = 'info', $timeout = null)
    {
        // Get default message and timeout from config if not provided
        $defaultMessage = config("flash.type.$type.message", 'Default message');
        $defaultTimeout = config("flash.type.$type.timeout", config('flash.timeout'));

        $this->messages[] = [
            'type' => $type,
            'message' => $message ?? $defaultMessage,
            'timeout' => $timeout ?? $defaultTimeout,
            'dismissible' => config('flash.dismissible', true),
        ];

        session()->flash('flash_notifications', $this->messages);

        return $this;
    }

    public function success($message = null, $timeout = null)
    {
        return $this->message($message, 'success', $timeout);
    }

    public function error($message = null, $timeout = null)
    {
        return $this->message($message, 'error', $timeout);
    }

    public function warning($message = null, $timeout = null)
    {
        return $this->message($message, 'warning', $timeout);
    }

    public function info($message = null, $timeout = null)
    {
        return $this->message($message, 'info', $timeout);
    }
}
