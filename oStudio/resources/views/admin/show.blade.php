@extends('admin.layout.app')


@section('content')
        <div class="container">
          <div class="jumbotron">
            <li>{{$product->name}}</li>
          <p>{{$product->description}}</p>
          <img src="{{$product->image}}" alt="product number {{$product->id}} image">
          
        
        <div class="col-md-3"style="float:right">  
                <table>
                  <tr>  
                  <a href="/admin/{{$product->id}}/edit"><button class="btn btn-secondary">Edit</button></a>
                  </tr>
                  <tr>
                    <span> </span>
                  </tr>
                  <tr>
                      <form action="/admin/product/{{ $product->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">Delete</button>            
                    </form>
                  </tr>
                </table>
            </div>
        </div>
      </div>
@endsection