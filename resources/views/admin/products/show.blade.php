
@extends('layouts.admin')

@section('content')

<div class="blog-card d-flex py-5">
    <div class="meta">
    <img width="500" class="photo" class="img-fluid" src="{{asset('storage/'. $product->image)}}" alt="{{$product->name}}">
    </div>
    <div class="description">
      <h1>{{$product->name}}</h1>
      <h5 class="mt-4 fw-bold">&euro; {{$product->price}}</h5>
      <h4>Ricevi in omaggio il nuovo formato di Coca Cola</h4>
      <p>{{$product->description}}</p>
      <p class="read-more">
        <a href="{{route('admin.products.edit', $product->id)}}">Edit</a>
      </p>
    </div>
  </div>


@endsection