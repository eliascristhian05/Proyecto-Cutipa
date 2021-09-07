<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{


    protected $table = 'articles';
    protected $fillable=["Description","shopping_price","sale_price","id_category"];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sale_invoices(){
        return $this->hasmany('App\Sale_invoices');
    }


    public function shopping_invoices(){
        return $this->hasmany('App\Shopping_invoices');
    }

    use HasFactory;
}
