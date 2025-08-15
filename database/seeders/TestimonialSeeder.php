<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Rick Wright',
            'designation' => 'Executive Engineer',
            'photo' => 'images/client.jpg',
            'platform' => 'instagram',
            'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum.'
        ]);

        Testimonial::create([
            'name' => 'Jane Doe',
            'designation' => 'Wellness Coach',
            'photo' => 'images/client2.jpg',
            'platform' => 'facebook',
            'message' => 'This program transformed my life in ways I never thought possible.'
        ]);
        Testimonial::create([
            'name' => 'Dharamveer',
            'designation' => 'Businesss Owner',
            'photo' => 'images/client3.jpg',
            'platform' => 'facebook',
            'message' => 'This program transformed my life in ways I never thought possible.'
        ]);
    }
}
