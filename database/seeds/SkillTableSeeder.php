<?php

use Illuminate\Database\Seeder;
use App\Skill;
class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create
        ([
            'name' => 'ReactJS',
            'competency_rating' => 'begineer',
            'candidate_id' => 1
        ]);
    }
}
