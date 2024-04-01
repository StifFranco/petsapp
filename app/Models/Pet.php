<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'photo',
        'type',
        'weight',
        'age',
        'breed',
        'location'
    ];

    //RelationShip (Relaciones de mascotas): Pet has one adoption

    public function adoption(){
        return $this->hasOne('App\Models\Adoption');
    }

}
