<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kindship;

class KindshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kindship::create( ['title' => 'Cônjuge/Companheiro(a)'] );
        Kindship::create( ['title' => 'Filho(a)'] );
        Kindship::create( ['title' => 'Enteado(a)'] );
        Kindship::create( ['title' => 'Genro/Nora'] );
        Kindship::create( ['title' => 'Neto(a)'] );
        Kindship::create( ['title' => 'Pai/Padastro/Mãe/Madastra'] );
        Kindship::create( ['title' => 'Dependente Econômico'] );
        Kindship::create( ['title' => 'Avô/Avó'] );
        Kindship::create( ['title' => 'Sogro(a)'] );
        Kindship::create( ['title' => 'Irmão(ã)'] );
        Kindship::create( ['title' => 'Sobrinho(a)'] );
        Kindship::create( ['title' => 'Tio(a)'] );
        Kindship::create( ['title' => 'Primo(a)'] );
        Kindship::create( ['title' => 'Cunhado(a)'] );
    }
}
