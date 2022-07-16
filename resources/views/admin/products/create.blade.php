@extends('layouts.admin')

@section('content')
<div class="container">

<h2 class="mt-4">Create a new Product</h2>

@include('partials.errors')

<form action="{{route('admin.products.store')}}" method="post">
@csrf 

<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="product name" aria-describedby="namehelper" value="{{old('name')}}">
  <small id="namehelper" class="text-muted">type the product name</small>
</div>

<div class="mb-3">
  <label for="price" class="form-label">Price</label>
  <input type="number" name="price" id="price" step="0.10" class="form-control @error('price') is-invalid @enderror" placeholder="product price" aria-describedby="pricehelper" value="{{old('price')}}">
  <small id="pricehelper" class="text-muted">Insert the price</small>
</div>

<div class="mb-3">
  <label for="image" class="form-label">Image</label>
  <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Add product image" aria-describedby="imagehelper" value="{{old('image')}}">
  <small id="imagehelper" class="text-muted">Add product image</small>
</div>

<div class="mb-3">
  <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
  <textarea class="form-control" name="description" id="description" rows="5">{{old('description')}}</textarea>
</div>

<button type="submit" class="btn btn-primary text-white">Add Product</button>
</form>
</div>


@endsection