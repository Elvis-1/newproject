@extends('layouts.app')

@section('content')
{{-- <div style="margin:0 100px"> --}}
<div style="margin:100px 360px">
<h1>CREATE A CAR</h1>
<form action="/cars" method="post">
@csrf
       <div>
          <input type="text" name="name" placeholder="Name of car">
       </div><br><br>
        <div>
          <input type="text" name="description" placeholder="description">
       </div><br><br>
        <div>
          <input type="submit" placeholder="submit">
       </div>

</form>
</div>
  
@endsection