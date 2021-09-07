<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Invoice extends Model
{
    protected $table = 'Sale_Invoice';

    public function sales(){
        return this->belongsTo('App\Sale', 'sale_id');
    }

    public function articles(){
        return this->belongsTo('App\Article', 'article_id');
    }


    use HasFactory;
}
