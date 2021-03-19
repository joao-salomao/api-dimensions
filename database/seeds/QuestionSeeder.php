<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::insert([
            [
                'dimension_id' => 1,
                'content' => 'Quantos dias da semana você prefere trabalhar de home-office',
                'active' => true
            ],
            [
                'dimension_id' => 2,
                'content' => 'Qual a sua cor favorita',
                'active' => false
            ],            [
                'dimension_id' => 3,
                'content' => 'Qual o seu sabor de sorvete preferido ?',
                'active' => true
            ],            [
                'dimension_id' => 4,
                'content' => 'Azul ou vermelhor ?',
                'active' => false
            ],
        ]);
    }
}
