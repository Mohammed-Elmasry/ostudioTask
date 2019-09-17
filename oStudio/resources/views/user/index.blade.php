@extends('user.layout.base')

@section('content')
    <div>
        @if (count($products) > 0)
            <ul>
                @foreach ($products as $product)
                <a href="/products/{{$product->id}}">
                    <div class="jumbotron">
                            <li>{{$product->name}}</li>
                    <small><p>{{$product->description}}</p></small>
                    </div>
                </a>    
                @endforeach
            </ul>    
            {{$products->links()}}
        @else
            <p>No Products Found!</p>
        @endif
    </div>
@endsection