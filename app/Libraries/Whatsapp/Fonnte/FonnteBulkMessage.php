<?php

namespace App\Libraries\Whatsapp\Fonnte;

class FonnteBulkMessage
{
    private array $messageWhatsapp = [];

    public function __construct(public array $messages)
    {
        foreach ($messages as $message) {
            // Gunakan 'target' sebagai ganti 'destination'
            $target = $message['target'] ?? $message['destination'] ?? '';
            $messageText = $message['message'] ?? '';
            $delay = $message['delay'] ?? 2;
            
            array_push(
                $this->messageWhatsapp,
                (new FonnteMessage($target, $messageText, $delay))
                    ->toArray()
            );
        }
    }

    public function toArray()
    {
        return $this->messageWhatsapp;
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }
}