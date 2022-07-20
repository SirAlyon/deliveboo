@extends('layouts.admin')

@section('content')
<div class="container-sm">

<h2 class="mt-4 mb-4">Create a new Product</h2>

@include('partials.errors')

<form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data" novalidate class="needs-validation">
@csrf 

<div class="mb-3">
  <label for="name" class="form-label">Name</label>
  <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Pizza Margherita" aria-describedby="namehelper" value="{{old('name')}}"  minlength="2" maxlength="50" required>
  <div class="invalid-feedback">Product name is invalid!</div>
</div>

<div class="mb-3">
  <label for="price" class="form-label">Price</label>
  <input type="number" name="price" id="price" step="0.01" class="form-control @error('price') is-invalid @enderror" placeholder="5" aria-describedby="pricehelper" value="{{old('price')}}" min="0" max="999" required>
  <div class="invalid-feedback">Product price is invalid!</div>
</div>

<div class="mb-3">
  <label for="image" class="form-label">Image</label>
  <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Add product image" aria-describedby="imagehelper" accept="image/png,image/gif,image/jpg, image/jpeg">
  <small id="imagehelper" class="text-muted">Upload your product image</small>
</div>

<div class="mb-3">
  <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
  <textarea class="form-control" name="description" id="description" rows="5">{{old('description')}}</textarea>
</div>

<div class="form-check form-switch mb-3">
  <label class="form-check-label" for="visibility">Visibility</label>
  <input class="form-check-input" type="checkbox" name="visibility" id="visibility" checked>
</div>

<button type="submit" class="btn btn-dark text-white">Add Product</button>
</form>
</div>

@endsection
