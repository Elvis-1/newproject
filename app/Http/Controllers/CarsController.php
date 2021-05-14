<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select all cars
        // $cars = Car::all();
        // dd($cars);
        // $cars = Car::where('name','=','Audi')
        // ->get();

        // $cars = Car::chunk(2, function($cars){
        //       foreach($cars as $car){
        //           print_r($car);
        //       }
        // });

        // $cars = Car::where('name','=','Audi')->firstOrFail();
        // $cars = Car::where('name','=','Tesla')->firstOrFail();

        // $cars = Car::where('name','=','Audi')->count();
        // print_r(Car::where('name','=','Audi')->count());
        // print_r(Car::all()->count());
        // print_r(Car::sum('id'));
        // print_r(Car::avg('id'));

        // $cars = Car::all();
        // return view('cars.index',[
        //     'cars'=> $cars
        // ]);

        // RETURNING A COLLECTION --- ELOQUENT SERIALISATION
        // $cars = Car::all()->toArray();
        // var_dump($cars);
        // $cars = Car::all()->toJson();
        // $cars = json_decode($cars);
        // var_dump($cars);
        // return view('cars.index',[
        //     'cars'=> $cars
        // ]);

        $cars = Car::all();
        
       
        return view('cars.index',[
            'cars'=> $cars
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {

    //     // REQUEST VALIDATION
    //     //    $request->validate([
    //     //        'name' => 'required|unique:cars',
    //     //        'founded' => 'required|integer|min:0|max:2021',
    //     //        'description' => 'required'
    //     //    ]);

    //     $request->validate([
    //         'name' => new Uppercase,
    //         'founded' => 'required|integer|min:0|max:2021',
    //         'description' => 'required'
    //     ]);
    //     // if it's valid, it will proceed
    //     // if it's not valid, throw a validationExeption
    //     // dd('ok');

    //     // $car = new Car;
    //     // $car->name = $request->input('name');
    //     // $car->description = $request->input('description');
    //     // $car->save();

    //     // return redirect('/cars');

    //     /*  alternatively  */

    //     $car = Car::create([
    //         'name' => $request->input('name'),
    //         'description' => $request->input('description') // to use this method, go to your model and add a fillable assignment
    //     ]);
    //     return redirect('/cars');
    // }

    // USING REQUEST VALIDATION FORM

    // public function store(CreateValidationRequest $request)
    // {

        

    //           $request->validated();
        
    //     // if it's valid, it will proceed
    //     // if it's not valid, throw a validationExeption
    //     // dd('ok');

    //     // $car = new Car;
    //     // $car->name = $request->input('name');
    //     // $car->description = $request->input('description');
    //     // $car->save();

    //     // return redirect('/cars');

    //     /*  alternatively  */

    //     $car = Car::create([
    //         'name' => $request->input('name'),
    //         'description' => $request->input('description'), // to use this method, go to your model and add a fillable assignment
    //         'founded' => $request->input('founded')
    //     ]);
    //     return redirect('/cars');
    // }

    
    // VALIDATING IMAGE

    public function store(Request $request)
    {

        $request->validate([
            'name'=> 'required',
            'founded' => 'required|integer|min:0|max:2021',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);
        // Methods we can use on the request
        //guessExtension()
        //getMimeType()
        //store()
        //asStore()
        //store
        //move()
        // guessClientExtension()
        //getClientMimeType()
        // getClientOriginalName()
        // getSize()
        //getError()
        //isValid()

         $newImageName = time() . '-'. $request->name .'.'.$request->image->extension();
        $test = $request->image->move(public_path('images'),$newImageName);
        //  dd($newImageName);
        //   $request->file('image')->guessExtension();
        //    dd($test);
               
        
       

        $car = Car::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'), // to use this method, go to your model and add a fillable assignment
            'founded' => $request->input('founded'),
            'image_path'=>$newImageName
        ]);
        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $car = Car::find($id);
        // dd($car);
        //dd($car->engines);
        return view('cars.show')->with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car =Car::find($id)->first();
        return view('cars.edit')->with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::where('id',$id)
        ->update([
            'name' => $request->input('name'),
            'description' => $request->input('description') // to use this method, go to your model and add a fillable assignment
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id)->first();
        $car->delete();
        return redirect('/cars');
    }
}
