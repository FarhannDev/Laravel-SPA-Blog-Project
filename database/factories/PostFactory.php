<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'post_title' => fake()->sentence(6),
      'post_slug'  => fake()->slug(),
      'post_description' => fake()->text(),
      'user_id'     => mt_rand(1, 20),
      'post_categorie_id' => mt_rand(1, 3)
    ];
  }
}
