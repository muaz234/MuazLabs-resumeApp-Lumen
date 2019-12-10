<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('SkillTableSeeder');
        $this->call('CertificateTableSeeder');
        // $this->call('UsersTableSeeder');
        // $this->call('CandidateTableSeeder');
        // $this->call('EducationHistoryTableSeeder');
        // $this->call('PortfolioTableSeeder');
        // $this->call('ReferencesTableSeeder');
        // $this->call('WorkExperienceTableSeeder');
    }
}
