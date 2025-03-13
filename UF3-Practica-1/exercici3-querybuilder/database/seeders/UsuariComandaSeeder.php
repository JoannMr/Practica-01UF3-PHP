<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuari;
use App\Models\Comanda;

class UsuariComandaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Creación de usuarios
        $jordi = Usuari::create(['nom' => 'Jordi']);
        $maria = Usuari::create(['nom' => 'Maria']);
        $pau = Usuari::create(['nom' => 'Pau']);

        // Comandas relacionadas a cada usuario
        $jordi->comandas()->createMany([
            ['descripcio' => 'Comanda 1'],
            ['descripcio' => 'Comanda 2'],
            ['descripcio' => 'Comanda 3'],
        ]);

        $maria->comandas()->create(['descripcio' => 'Comanda única']);

        $pau = Usuari::where('nom', 'Pau')->first();
        $pau->comandas()->createMany([
            ['descripcio' => 'Comanda 1'],
            ['descripcio' => 'Comanda 2'],
            ['descripcio' => 'Comanda 3'],
            ['descripcio' => 'Comanda 4'],
            ['descripcio' => 'Comanda 5'],
        ]);
    }
}
