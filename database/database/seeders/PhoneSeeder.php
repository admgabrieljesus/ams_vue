<?php

namespace Database\Seeders;

use App\Models\Associate;
use Illuminate\Database\Seeder;
use App\Models\Phone;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include( base_path() . '/database/datas/phones_associates.php');
     
        foreach ($phones_persons as $phone) {
            $phone['phoneable_type'] = Associate::class;
            Phone::factory(1)->create($phone);
        }

    }
}