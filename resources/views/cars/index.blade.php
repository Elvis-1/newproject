@extends('layouts.app')

@section('content')
<div style="margin:0 100px">
      {{-- {{$cars->name}} --}}
        <div>
            <h1 style="text-align:center; margin-top:50px; font-size:50px">Cars</h1>
         </div>
         <div>
         <a href="cars/create">Add a new car</a>
         </div><br><br>
         @foreach ($cars as $car )
         <div>
         <a href="/cars/{{$car->id}}/edit">Edit a car</a>
         </div>
         <div>
         <small style="color:blue;"><I>FOUNDED: 2021</I></small>
         </div>
         <div>
            <h1 style=" margin-top:20px; font-size:50px">{{$car->name}}</h1>
            <p>{{$car->description}}</p>
            <hr>
        </div>
@endforeach

</div>
@endsection