<?php

use Illuminate\Database\Seeder;
use App\EducationHistory;
class EducationHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EducationHistory::create
        ([
            'qualification' => 'Bachelor',
            'name' => 'Degree in Information Technology',
            'major' => 'Data Management',
            'year' => '2019',
            'final_score' => 'CGPA 3.33',
            'institution' => 'IIUM',
            'description' => 'Graduated Jan 2019 with Upper Second Class Degree',
            'candidate_id' => 1
        ]);
    }
}
