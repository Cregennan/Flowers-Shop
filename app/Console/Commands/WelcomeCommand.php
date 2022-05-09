<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Config;

class WelcomeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'welcome';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Welcomes new owner to its project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Развертываем решение...");



        $this->info("Ставим базу...");
        $this->call('migrate');

        $this->info("Сдаем курсач на 5...");
        $this->info("Генерируем цветы по  умолчанию...");
        $this->call('db:seed', [
            '--class'=>'FlowerSeeder',
        ]);
        $this->info("Создаем аккаунт админа...");
        $this->call('make:user');
        $this->info('Все готово, можете перейти по адресу http://flowers_vmk.com');
        $this->info('Если проект ставился из гитхаба, пропиши дополнительно npm run build');
    }
}
