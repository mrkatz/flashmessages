<?php

namespace Mrkatz\FlashMessages;

class Flash
{
    protected $messages = [];

    public function message($message, $type = 'info', $timeout = null)
    {
        if (session()->has('flash_notifications')) {
            $this->messages = session()->pull('flash_notifications');
        }

        $this->messages[] = [
            'type' => $type,
            'message' => $message ?? config("flash.type.$type.message", 'Default message'),
            'timeout' => $timeout ?? config("flash.type.$type.timeout", config('flash.timeout'))
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
