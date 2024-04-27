<?php

namespace App\Telegram;

use App\Models\ConfigSystem;
use App\Models\PressRequest;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;
use Telegram\Bot\FileUpload\InputFile;

class SendMessages
{
    public static function send(
        string $text,
        PressRequest $press = null
    ): void
    {
        $config = ConfigSystem::whereIn('key', ['token', 'group'])->get();

        try {
            if($config->first(function ($item) {
                return $item->key == 'token';
            })->value) {

                $api = new Api($config->first(function ($item) {
                    return $item->key == 'token';
                })->value);

                if (isset($press->id)) {
                    $path = \Storage::disk($press->file->disk)->path($press->file->name);

                    $api->sendPhoto([
                        'chat_id' => $config->first(function ($item) {
                            return $item->key == 'group';
                        })->value,
                        'caption' => $text,
                        'photo' => InputFile::create($path),
                        'parse_mode' => 'HTML',
                        'disable_web_page_preview' => true
                    ]);

                    return;
                }
                $api->sendMessage([
                    'chat_id' => $config->first(function ($item) {
                        return $item->key == 'group';
                    })->value,
                    'text' => $text . '<a href="' . $press->photo . '">.</a>',
                    'parse_mode' => 'HTML',
                    'disable_web_page_preview' => true
                ]);
            }
        } catch (TelegramSDKException $e) {
            Log::error('Send messages api telegram - ' . $e->getMessage());
        }
    }
}
