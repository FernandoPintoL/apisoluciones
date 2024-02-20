<?php

namespace Database\Seeders;

use App\Models\Moneda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Moneda::create( [
            "detalle"=> "BOLVIANO",
            "simbolo"=> "B$",
        ] );

        Moneda::create( [
            "detalle"=> "REAL",
            "simbolo"=> "R$",
        ] );

        Moneda::create( [
            "detalle"=> "DOLAR",
            "simbolo"=> "$",
        ] );
    }
}