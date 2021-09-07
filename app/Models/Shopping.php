<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{

    protected $table = 'shopping';
    protected $fillable=["id_provider", "id_employee","shopping_date","shopping_quantity"];

  
    public function shopping(){
        return $this->belongsTo(Shopping::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }


    public function shopping_invoice(){
        return $this->hasmany('App\Shopping_Invoice');
    }

    use HasFactory;
}