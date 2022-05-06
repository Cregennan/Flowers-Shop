<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BouquetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b = new \App\Models\Bouquet([
            'name' => 'Букет 1',
            'description' => 'Букет букет',
            'picture' => 'dwd',
            'flowers' => [
                1 => 2,
            ],
        ]);
        $b->save();
    }
}
