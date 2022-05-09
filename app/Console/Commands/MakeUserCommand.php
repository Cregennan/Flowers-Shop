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
    protected $signature = 'make:user';

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
        $name = 'Yi Long Musk';
        $login = $this->ask('Введите логин админа');
        $password = $this->ask('Введите пароль админа');

        $action->execute($name, $login, $password);
        $this->info("Пользователь ".$login." успешно создан");
    }
}
