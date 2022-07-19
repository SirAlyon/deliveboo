
@extends('layouts.admin')

@section('content')

<div class="container">
<h2 class="mt-4">Edit {{$product->name}}</h2>

@include('partials.errors')

<form action="{{route('admin.products.update', $product->id)}}" method="post" enctype="multipart/form-data">
@csrf 
@method('PUT')

<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" placeholder="product name" aria-describedby="namehelper" value="{{old('name', $product->name)}}">
  <small id="namehelper" class="text-muted">type the product name</small>
</div>

<div class="mb-3">
  <label for="price" class="form-label">Price</label>
  <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="product price" aria-describedby="pricehelper" value="{{old('price', $product->price)}}">
  <small id="pricehelper" class="text-muted">Insert the price</small>
</div>

<div class="d-flex">
       <div class="media me-4">
            <img class="shadow" width="150" src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}">
       </div>

       <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
            <input type="file" name="image" id="image" class="form-control" placeholder="Add product image" aria-describedby="imagehelper" value="{{old('image', $product->image)}}">
            <small id="imagehelper" class="text-muted">Add product image</small>
       </div>
</div>

<div class="mb-3">
  <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
  <textarea class="form-control" name="description" id="description" rows="5">
  {{old('description', $product->description)}}
  </textarea>
</div>

<div class="form-check form-switch mb-3">
  <label class="form-check-label" for="visibility">Visibility</label>
  <input class="form-check-input" type="checkbox" name="visibility" id="visibility" {{ ($product->visibility == 0) ? "checked" : "" }} >
</div>
 
<button type="submit" class="btn btn-primary text-white">Update Product</button>
</form>
</div>


@endsection