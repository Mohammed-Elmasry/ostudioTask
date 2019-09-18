@extends('admin.layout.app')

@section('content')
<h1>Update Product</h1>
<form method="post" action="/admin/product/{{$product->id}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
          <label for="name">Product name</label>
        <input name="name" type="text" class="form-control" value="{{$product->name}}" placeholder="product name.." required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
        <textarea name="description" class="form-control" value="{{$product->description}}"id="exampleInputPassword1" rows="10" placeholder="Description" required></textarea>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

@endsection