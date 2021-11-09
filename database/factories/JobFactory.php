<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $text = $this->faker->realText($maxNbChars = 50, $indexSize = 2);
        return [
            'user_id'            => 3,
            'jobTitle'           => $text,
            'slug'               => Str::slug($text),
            'category'           => 'radiology-technician',
            'zip'                => $this->faker->postcode(),
            'type'               => 'Full Time',
            'jobLength'          => '1 Year',
            'shiftHours'         => '5Hrs',
            'salary'             => $this->faker->numberBetween($min = 1000, $max = 9000) . '-' . $this->faker->numberBetween($min = 9000, $max = 19000),
            'pay_type'           => 'weekly',
            'requirements'       => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'about'              => $this->faker->realText($maxNbChars = 500, $indexSize = 2),
            'specialties'        => $this->faker->randomDigitNot(5),
            'status'             => 'active',
        ];
    }
}
