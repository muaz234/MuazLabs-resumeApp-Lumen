<?php

use Illuminate\Database\Seeder;
use App\Candidate;
class CandidateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Candidate::create(
            [
                'fullname' => 'Muaz Ahmed',
                'job_title' => 'Software Engineer',
                'address' => 'Rumah No NLT 1, Jalan Gombak, 53100 Gombak, Selangor D.E',
                'contact_no' => '0125696250',
                'email' => 'ahmedmuaz0152@gmail.com',
                'website' => 'muazahmed.me'
            ]);
    }
}
