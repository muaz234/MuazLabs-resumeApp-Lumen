<?php

use Illuminate\Database\Seeder;
use App\Certificate;
class CertificateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certificate::create
        ([
            'title' => 'RHCSA',
            'year_of_certification' => 2020,
            'institution' => 'Red Hat',
            'validity_period' => '5 years',
            'candidate_id' => 1
        ]);
    }
}
