<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping_Invoice extends Model
{

    protected $table = 'Shopping_Invoice';

    public function shoppings(){
        return this->belongsTo('App\Shopping', 'shopping_id');
    }

    public function articles(){
        return this->belongsTo('App\Article', 'article_id');
    }

    use HasFactory;
}
