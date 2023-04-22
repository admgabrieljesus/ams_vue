<?php

namespace Database\Seeders;

use App\Models\Email;
use App\Models\Associate;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include( base_path() . '/database/datas/emails_associates.php');
     
        foreach ($emails as $e) {
            $e['emailable_type'] = Associate::class;
            Email::factory(1)->create($e);
        }

    }
}
