<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create( ['role' => 'ADMIN'] );
        Role::create( ['role' => 'OPERATOR'] );
        Role::create( ['role' => 'USER'] );
        Role::create( ['role' => 'AUDITOR'] );
        Role::create( ['role' => 'ASSOCIATE'] );
        Role::create( ['role' => 'DEPENDENT'] );
        Role::create( ['role' => 'PARTNER'] );
    }
}
