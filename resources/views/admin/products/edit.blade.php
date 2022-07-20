
@extends('layouts.admin')

@section('content')

<div class="container" style="height: 700px; width: 700px;";>
<h2 class="mt-4 mb-4">Edit <span class="text-secondary">{{$product->name}}</span> </h2>

@include('partials.errors')

<form action="{{route('admin.products.update', $product->id)}}" method="post" enctype="multipart/form-data" novalidate class="needs-validation">
@csrf 
@method('PUT')

<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="product name" aria-describedby="namehelper" value="{{$product->name}}" minlength="2" maxlength="50" required>
  <div class="invalid-feedback">Product name is invalid!</div>
  
  <small id="namehelper" class="text-muted">Type the product name</small>
</div>

<div class="mb-3">
  <label for="price" class="form-label">Price</label>
  <input type="number" name="price" id="price" step="0.01" class="form-control @error('price') is-invalid @enderror" aria-describedby="pricehelper" value="{{$product->price}}" min="0" max="999" required>
  <div class="invalid-feedback">Product price is invalid!</div>
</div>

<div class="d-flex">
       <div class="media me-4">
            <img class="shadow" width="150" src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}">
       </div>
       <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
            <input type="file" name="image" id="image" class="form-control" placeholder="Add product image" aria-describedby="imagehelper" accept="image/png,image/gif,image/jpg, image/jpeg">
             <div class="invalid-feedback">Product name is invalid!</div>
            <small id="imagehelper" class="text-muted">Add product image</small>
       </div>
</div>

<div class="mb-3">
  <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
  <textarea class="form-control" name="description" id="description" rows="5">
  {{old('description', $product->description)}}
  </textarea>
  <div class="invalid-feedback">Product name is invalid!</div>

</div>

<div class="form-check form-switch mb-3">
  <label class="form-check-label" for="visibility">Visibility</label>
  <input class="form-check-input" type="checkbox" name="visibility" id="visibility" {{ ($product->visibility == 0) ? "checked" : "" }} >
</div>
 
<button type="submit" class="btn btn-secondary text-white">Update Product</button>
</form>
</div>


@endsection