@extends('user.layout.base')

@section('content')
    <div>
        @if (count($products) > 0)
            <ul>
                @foreach ($products as $product)
                    <div class="jumbotron">
                            <li>{{$product->name}}</li>
                    <small><p>{{$product->description}}</p></small>
                    </div>    
                @endforeach
            </ul>    
        @else
            <p>No Products Found!</p>
        @endif
    </div>
@endsection