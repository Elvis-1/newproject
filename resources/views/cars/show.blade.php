@extends('layouts.app')

@section('content')
<div style="margin:0 100px">
             <div>
            <img src="{{asset('images/'. $car->image_path)}}">
         </div>
     
        <div>
            <h1 style="text-align:center; margin-top:50px; font-size:50px">{{$car->name}}</h1>
         </div>


       
         <div>
         <small style="color:blue;"><I>FOUNDED: {{$car->founded}}</I></small>
         </div>
         <div>

            <p>{{$car->description}}</p>
             <p>Models</p>
                   @forelse ($car->carsModels as $model)
                       
                    <li>
                    {{-- we are accessing it like this because its an object --}}
                     {{$model['model_name']}}  
                    </li>   
                    @empty                
                   <p>No models found</p>
                   </ul>
                   @endforelse
            <hr>
        </div>
         <div>
@endsection