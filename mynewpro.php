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