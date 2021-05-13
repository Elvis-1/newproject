@extends('layouts.app')

{{-- COLLECTION TO ARRAY --}}
{{-- @foreach($cars as $car)
      {{$car['name']}}
@endforeach --}}

{{-- COLLECTION TO JSON --}}
@foreach($cars as $car)
      {{$car->name}}
@endforeach
@section('content')

{{--ELOQUENT SERIALIZATION --}}

<div style="margin:0 100px">
     
        <div>
            <h1 style="text-align:center; margin-top:50px; font-size:50px">Cars</h1>
         </div>
         <div>
         <a href="cars/create">Add a new car</a>
         </div><br><br>
         @foreach ($cars as $car )
         <div>
         <a href="/cars//edit">Edit a car</a>
         </div><br>
         <div>
         <form action="/cars/" method="POST">
         @csrf
         @method('delete')
         <input type="submit" value='Delete'>
         </form>
         </div>
         <br>
         <div>
         <small style="color:blue;"><I>FOUNDED: 2021</I></small>
         </div>
         <div>
            <h1 style=" margin-top:20px; font-size:50px"></h1>
            <p></p>
            <hr>
        </div>
@endforeach

</div>

{{-- WORKING WITH ARRAYS --}}
{{-- <div style="margin:0 100px">
     
        <div>
            <h1 style="text-align:center; margin-top:50px; font-size:50px">Cars</h1>
         </div>
         <div>
         <a href="cars/create">Add a new car</a>
         </div><br><br>
         @foreach ($cars as $car )
         <div>
         <a href="/cars/{{$car->id}}/edit">Edit a car</a>
         </div><br>
         <div>
         <form action="/cars/{{$car->id}}" method="POST">
         @csrf
         @method('delete')
         <input type="submit" value='Delete'>
         </form>
         </div>
         <br>
         <div>
         <small style="color:blue;"><I>FOUNDED: 2021</I></small>
         </div>
         <div>
            <h1 style=" margin-top:20px; font-size:50px">{{$car->name}}</h1>
            <p>{{$car->description}}</p>
            <hr>
        </div>
@endforeach

</div> --}}
 


@endsection