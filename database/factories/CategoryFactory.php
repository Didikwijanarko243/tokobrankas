<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            // slug otomatis di-generate oleh model (event "saving"), tidak perlu diisi di sini
            'name' => ucfirst(fake()->unique()->words(2, true)),
        ];
    }
}