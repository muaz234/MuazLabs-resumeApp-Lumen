<?php

use Illuminate\Database\Seeder;
use App\WorkExperience;
class WorkExperienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        WorkExperience::create
        ([
            'company_name' => 'Prasarana Malaysia Berhad',
            'duration' => '9 months',
            'position' => 'Application Engineer',
            'location' => 'Bangsar, Kuala Lumpur',
            'description' => 'Responsible to develop mobile application using Java(Native mobile app) and website using Wordpress CMS based platform.',
            'candidate_id' => 1
        ]);

    }
}
