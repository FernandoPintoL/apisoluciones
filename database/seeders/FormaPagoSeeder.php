<?php

namespace Database\Seeders;

use App\Models\FormaPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormaPago::create( [
            "detalle"=>"EFECTIVO"
        ] );

        FormaPago::create( [
            "detalle"=>"TRANSFERECIA BANCARIA"
        ] );

        FormaPago::create( [
            "detalle"=>"TARJETA DE DEBITO Y CREDITO"
        ] );

        FormaPago::create( [
            "detalle"=>"CHEQUES"
        ] );
    }
}