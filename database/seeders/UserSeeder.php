<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ 
            'name'  => 'GABRIEL DE JESUS FILHO' ,
            'email'  => 'gabriel.jesus.filho@gmail.com' ,
            'password'  => '$2y$10$jfusVtWWCOmBVRgv4iTYROOoCWiSd7JS0lcSjVusgAXIZHzw6Yih.',
            'role_id' => 1,
        ]);

        User::create([ 
            'name'  => 'LUCILA SANTANA' ,
            'email'  => 'lubconsultoria@gmail.com' ,
            'password'  => '$2y$10$z4k0k9obmxqoThFeGffffe4.AO1Ng.UrcY3n7r79.6JVNkis1Z.iu',
            'role_id' => 1,
        ]);
        
        User::create([ 
            'name'  => 'DAIANE COSTA DA SILVA DE JESUS' ,
            'email'  => 'bahia@aepet.org.br' ,
            'password'  => '$2y$10$DEhHJWm/ho4zREGl2uZcXOYAivCYBM2r9PHmcYQ/wpIqchMukmgdm',
            'role_id' => 2,
        ]);
    }
}
