<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Employee extends Model
{


    protected $table = 'employees';
    protected $fillable=[
        "name",
        "surname",
        "id_position",
        "direction",
        "CI",
        "password",
        "phone",
        "salary",
        "schedule"
    ];

    
    public function position(){
        return $this->belongsTo(Position::class);
    }



    public function sales(){
        return $this->hasmany('App\Sale');
    }


    public function shoppings(){
        return $this->hasmany('App\Shopping');
    }


    use HasFactory;
}