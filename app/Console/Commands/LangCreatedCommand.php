<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Language;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Throwable;

class LangCreatedCommand extends Command
{
    protected $signature = 'zbara:lang-created  {name?} {value?}';

    protected $description = 'Добавление языка';


    public function handle()
    {
        try {
            Language::createLang(
                $this->argument('name') ?? $this->ask('Язык?', 'Украинская'),
                $this->argument('value') ?? $this->ask('Код языка', 'UA')
            );

            $this->info('Язык создан.');

        } catch (Exception | QueryException | Throwable $e) {
            $this->error($e->getMessage());
        }
    }
}
