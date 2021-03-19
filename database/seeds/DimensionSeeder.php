<?php

use App\Dimension;
use Illuminate\Database\Seeder;

class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dimension::insert([
            [
                'title' => 'Cultura'
            ],
            [
                'title' => 'Estrutura'
            ],
            [
                'title' => 'Conceito'
            ],
            [
                'title' => 'Engajamento'
            ]
        ]);
    }
}
