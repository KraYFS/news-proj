<?php

namespace App\Console\Commands;

use App\Models\ConfigSystem;
use Illuminate\Console\Command;
use Telegram\Bot\Api;

class ConfigSystemCommand extends Command
{
    protected $signature = 'zbara:config';

    protected $description = 'Конфигурация панели - default.';


    public function handle()
    {
        $params = [
            [
                'key' => 'token',
                'value' => '',
            ],
            [
                'key' => 'group',
                'value' => '',
            ],
            [
                'key' => 'lang',
                'value' => '',
            ]
        ];

        ConfigSystem::truncate();

        foreach ($params as $param){
            ConfigSystem::create([
                'key' => $param['key'],
                'value' => $param['value'],
            ]);
        }
    }
}
