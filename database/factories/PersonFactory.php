<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $age = $this->faker->numberBetween(18, 50);
        $gender = $this->get_gender();
        $background = $this->get_background($age);

        return [
            'family_name' => $this->faker->lastName(),
            'first_name' => $this->get_first_name($gender),
            'gender' => $gender,
            'age' => $age,
            'birthplace' => $this->faker->prefecture(),
            'residence' => $this->faker->prefecture(),
            'height' => $this->get_height($gender),
            'edu_back' => $background,
            'annual_income' => $this->get_income($background),
        ];
    }

    private function get_gender()
    {
        $gender = ['male', 'female'];
        return $gender[array_rand($gender)];
    }

    private function get_background($age)
    {
        if ($age < 22) {
            return '高卒';
        } elseif ($age < 24) {
            return $this->faker->randomElement(['高卒', '大卒']);
        } else {
            return $this->faker->randomElement(['高卒', '高卒', '大卒', '大卒', '大学院卒']);
        }
    }

    private function get_first_name($gender)
    {
        if ($gender === 'male') {
            return $this->faker->firstNameMale();
        } elseif ($gender === 'female') {
            return $this->faker->firstNameFemale();
        }
    }

    private function get_height($gender)
    {
        if ($gender === 'male') {
            return $this->faker->numberBetween(160, 190);
        } elseif ($gender === 'female') {
            return $this->faker->numberBetween(150, 170);
        }
    }

    private function get_income($back)
    {
        if ($back === '高卒') {
            return $this->faker->numberBetween(20, 100) * 10;
        } elseif ($back === '大卒') {
            return $this->faker->numberBetween(40, 100) * 10;
        } elseif ($back === '大学院卒') {
            return $this->faker->numberBetween(60, 100) * 10;
        }
    }

}
