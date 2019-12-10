<?php

use Illuminate\Database\Seeder;
use App\Reference;
class ReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Reference::create
        ([
            'name' => 'belum dikenalpasti',
            'designation' => 'Senior Manager',
            'company_name' => 'Syarikat Prasarana Negara Berhad',
            'year_known' => '1.5 yrs',
            'email' => 'anonymous@gmail.com.my',
            'contact_number' => '999',
            'candidate_id' => 1
        ]);

    }
}
