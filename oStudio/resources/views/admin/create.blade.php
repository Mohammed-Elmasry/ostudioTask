@extends('admin.layout.app')

@section('content')
<h1>Create New Product</h1>
<form method="post" action="{{route('newProduct')}}">
        @csrf
        <div class="form-group">
          <label for="name">Product name</label>
          <input name="name" type="text" class="form-control" aria-describedby="emailHelp" placeholder="product name.." required>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="exampleInputPassword1" rows="10" placeholder="Description" required></textarea>
        </div>
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection