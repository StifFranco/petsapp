<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use App\Models\User;
use App\Models\Adoption;

class AdoptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Add a record with Eloquent ORM
       $adoptn = new Adoption;
       $adoptn->user_id = 2;
        $adoptn->pet_id =1;
       $adoptn->save();

       $adoptn = new Adoption;
       $adoptn->user_id = 8;
        $adoptn->pet_id =2;
       $adoptn->save();

       $adoptn = new Adoption;
       $adoptn->user_id = 8;
        $adoptn->pet_id =3;
       $adoptn->save();

       $adoptn = new Adoption;
       $adoptn->user_id = 10;
        $adoptn->pet_id = 3;
       $adoptn->save();
    }
}
