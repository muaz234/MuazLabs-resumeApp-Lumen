<?php

use Illuminate\Database\Seeder;
use App\Portfolio;
class PortfolioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Portfolio::create
        ([
            'name' => 'Weather App',
            'description' => 'Created using Kotlin and OpenWeather API data',
            'year' => '2019',
            'duration' => '1 day',
            'candidate_id' => 1    
        ]);
    }
}
