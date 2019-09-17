@extends('user.layout.base')

@section('content')
<h1>{{$product->name}}</h1>
<div>
    <small>{{$product->description}}</small><br/>
    <img alt="image of product {{$product->id}}"src="{{$product->image}}">
</div>
@endsection