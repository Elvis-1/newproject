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



     public function carsModels(){
         return $this->hasMany(CarModel::class);
     }

     public function headquarter(){
         return $this->hasOne(Headquater::class);
     }
     // define a has many relationship

     public function engines(){
         
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
            'car_id'.// Foreign key on CarModel table
            'model_id' // Foreign key on Engine table
        );
        

     }
}
