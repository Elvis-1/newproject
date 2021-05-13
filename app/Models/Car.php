<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
     protected $fillable = ['name','description'];
     protected $hidden = ['updated_at']; //add what you want to hide in your json object collection
     protected $visible = ['name','description']; // shows only values or column you want visible



     public function carsmodels(){
         return $this->hasMany(CarModel::class);
     }
}
