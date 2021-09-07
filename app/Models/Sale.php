<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

    protected $table = 'sales';
    protected $fillable=["id_employee","id_client","quantity","date"];

 
  //  protected static function boot(){
   //     parent::boot();
   //     self::creating(function ($table){
    //        if(!app()->runningInConsole()){
      //          $table->id_client=auth()->id();
        //    }
        //});
   // }
    public function sale(){
        return $this->belongsTo(Sale::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }


    public function sales_invoice(){
        return $this->hasmany('App\Sale_Invoice');
    }

    use HasFactory;
}
