<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filename = Str::random(15).'.txt';
        Storage::disk('public')->put($filename, $this->faker->sentences(20, true));
        return [
            'title' => $this->faker->sentence(),
            'content_path' => '/storage/'.$filename,
            'type' => rand(0, 1) ? 'outside' : 'inside',
            'major_id' => Major::all()->random()->id
        ];
    }
}
