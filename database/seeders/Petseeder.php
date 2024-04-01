<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;

class Petseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Add a record with Eloquent ORM
        $pet = new Pet;
        $pet->name   =  'Patricio';
        $pet->photo  = '1708977468.jpg';
        $pet->type   =  'Duck';
        $pet->weight =  4;
        $pet->age    =  5;
        $pet->breed  =  'Madarin Duck';
        $pet->location   =  'Cali';
        $pet->save();

        $pet = new Pet;
        $pet->name   =  'Rodolfo';
        $pet->photo  = '1708708497.jpg';
        $pet->type   =  'Macaw';
        $pet->weight =  2;
        $pet->age    =  4;
        $pet->breed  =  'Macaw Red';
        $pet->location   =  'Bogota';
        $pet->save();

        $pet = new Pet;
        $pet->name   =  'Kika';
        $pet->photo  = '1708986078.jpg';
        $pet->type   =  'Dog';
        $pet->weight =  4;
        $pet->age    =  2;
        $pet->breed  =  'Border Collie';
        $pet->location   =  'Manizales';
        $pet->save();

        
    }
}
