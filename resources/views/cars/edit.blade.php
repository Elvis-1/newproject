@extends('layouts.app')

@section('content')
{{-- <div style="margin:0 100px"> --}}
<div style="margin:100px 360px">
<h1>UPDATE A CAR</h1>
<form action="/cars/{{$car->id}}" method="post">
@csrf
    @method('PUt')
       <div>
          <input type="text" name="name" value="{{$car->name}}">
       </div><br><br>
        <div>
          <input type="text" name="description" value="{{$car->description}}">
       </div><br><br>
        <div>
          <input type="submit" placeholder="submit">
       </div>

</form>
</div>
  
@endsection