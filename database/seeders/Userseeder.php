<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Add a record with Eloquent ORM
        $user = new User;
        $user->document =  123456789;
        $user->fullname = "Jesus Jose Gonzales Smith";
        $user->gender    = "Male";
        $user->birthdate = "1985/05/15";
        $user->photo    = "foto_foto.PNG";
        $user->phone    = 3226557899;
        $user->email    = "jejoja@gmail.com";
        $user->password = bcrypt('admin');
        $user->role     = "Admin";
        $user->save();

        //Add  a record with a Array
        DB::table('users')->insert([
            'document' => 987654321,
            'fullname' => 'Abraham Simpson',
            'gender' => 'Male',
            'birthdate' => '1935/02/11',
            'photo' => 'Abraham Simpson',
            'phone' => 3226557899,
            'email' => 'abraham@gmail.com',
            'password' => bcrypt('12345'),
        ]);

  
    } 
}
