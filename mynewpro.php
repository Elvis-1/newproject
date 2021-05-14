<?php
/* ---- STARTED A NEW PROJECT
composer create-project laravel/laravel newproject
1) $ composer reqiure laravel-frontend-presets/tailwindcss --dev
2) npm install and npm run dev
3) create model with migration -- $ php artisan make:model Car -m
4) make controller with resource -- $ php artisan  make:controller CarsController --resource
5) add to your route 
   use App\Http\Controllers\CarsController;
   Route::resource('/', CarsController::class); --- this maps all the resource at ones
   
6) add frontend ui presets  
    go to -- https://github.com/laravel-frontend-presets
    run -- composer require laravel-frontend-presets/tailwindcss --dev
    run -- npm install && npm run dev
7)  edit your migration, edit your env file and run php artisan migrate
8) insert values into your table
9) edit your model with optional parameters
      class Car extends Model
   {
      use HasFactory;
      protected $table = 'cars';
      protected $primaryKey = 'id';
      protected $timestamps = true;
      

   }

10) go to your car controller and pull in your car model
    use App\Models\Car;   
11) check your endpoint 'php artisan route:list'
12) anything you want to hide from your json object collection add to your  model 'protected $hidden = ['id'];' 
13) we added a scheme to an already existing migration(we could have made another), the schema is below
     
        Schema::create('cars_model', function (Blueprint $table) {
            $table->increments('id');
            $table->unassignedInteger('car_id');
            $table->string('model_name');
            $table->timestamps();
            $table->foreign('car_id')
            ->references('id')->on('cars')->onDelete('cascade');

        });

       when you run php artisan migrate, it will say nothing to migrate
       to migrate this, you have to roll back the migration and migrate again  
       'php artisan migrate:rollback'    

14)ELOQUENT RELATIONSHIP
    a) Create cars_model migration, reference the cars_model table to the cars table 
            Schema::create('cars_model', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_id');
            $table->string('model_name');
            $table->timestamps();
            $table->foreign('car_id')
            ->references('id')->on('cars')->onDelete('cascade');

        });
    b) create CarModel model
    c) add the eloquent function to the Car  Model this connects it to the CarModel 
           public function carsmodels(){
         return $this->hasMany(CarModel::class);
     }
15) make engine model 
16) request validation
17) to set your own rules, do '$ php artisan make:rule Uppercase'
   go to uppercase in the rules folder and work on it and require it in your controller 'use App\Rules\Uppercase;'
    

