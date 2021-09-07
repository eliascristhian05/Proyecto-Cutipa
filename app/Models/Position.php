<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $fillable =['description'];

    public function personals(){
        return $this->hasmany('App\Personal');
    }
    use HasFactory;
}

