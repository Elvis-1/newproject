@extends('layouts.app')

@section('content')
{{-- <div style="margin:0 100px"> --}}
<div style="margin:100px 360px">
<h1>CREATE A CAR</h1>
<form action="/cars" method="POST">
@csrf
       <div>
          <input type="text" name="name" placeholder="Name of car">
       </div><br><br>
        <div>
          <input type="text" name="description" placeholder="description">
       </div><br><br>
       <div>
          <input type="text" name="founded" placeholder="founded">
       </div><br><br>
        <div>
          <input type="submit" placeholder="submit">
       </div>

</form>
@if($errors->any())
   <div>
   @foreach ($errors->all() as $error )

     <li>{{$error}}</li>
       
   @endforeach
   
   </div>
</div>
 @endif 
@endsection