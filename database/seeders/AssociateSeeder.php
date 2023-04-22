<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Associate;

class AssociateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include( base_path() . '/database/datas/associates.php');

        foreach ($persons as $associate) {
            $associate['comment'] = '';
            $associate['rg'] = '';
            Associate::factory(1)->create($associate);
        }
    }
}
