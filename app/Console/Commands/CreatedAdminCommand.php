<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Throwable;

class CreatedAdminCommand extends Command
{
    protected $signature = 'zbara:admin-created  {name?} {email?} {password?} {--id=}';

    protected $description = 'Создания админа.';

    public function handle(): void
    {
        try {
           Admin::createAdmin(
               $this->argument('name') ?? $this->ask('What is your name?', 'admin'),
                   $this->argument('email') ?? $this->ask('What is your email?', 'admin@admin.com'),
                   $this->argument('password') ?? $this->secret('What is the password?')
           );

           $this->info('Пользователь создан.');

        } catch (Exception | QueryException | Throwable $e) {
            $this->error($e->getMessage());
        }
    }
}
