<?php

namespace App\Console\Commands;

use App\Actions\CreateUserAction;
use Illuminate\Console\Command;

class MakeUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {name} {login} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создать пользователя';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CreateUserAction $action)
    {
        $action->execute($this->argument('name'), $this->argument('login'), $this->argument('password'));
        $this->info("Пользователь ".$this->argument('login')." успешно создан");
    }
}
