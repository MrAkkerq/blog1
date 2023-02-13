<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            'code' => $this->faker->countryCode(),
            'title' => $this->faker->word(),
            'detail' => $this->faker->randomAscii(),
            'body' => $this->faker->text(),
            'published' => $this->faker->boolean()
        ];
    }
}
