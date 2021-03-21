<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use App\Dimension;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'content' => $faker->text,
        'dimension_id' => (string) factory(Dimension::class)->create()->id
    ];
});
