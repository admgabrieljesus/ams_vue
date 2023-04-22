<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Associate;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        include( base_path() . '/database/datas/addresses_associates.php');
     
        foreach ($addresses as $address) {
            $address['addressable_type'] = Associate::class;
            Address::factory(1)->create($address);
        }

    }
}
