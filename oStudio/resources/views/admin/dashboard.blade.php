@extends('admin.layout.app')
@section('content')
  <h1>Products</h1>
  <a href="/admin/create"><button class="btn btn-primary">New</button></a>
    @if(count($products) > 0)
      <ul>
      @foreach ($products as $product)
        <br/>
        <div class="jumbotron">
          <li>{{$product->name}}</li>
        <p>{{$product->description}}</p>
        <img src="{{$product->image}}" alt="product number {{$product->id}} image">
        </div>
      @endforeach
      </ul>
        {{$products->links()}}
    @else
      <p>No Products to Display</p>
    @endif
  @endsection