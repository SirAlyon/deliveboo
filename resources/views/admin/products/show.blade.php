
@extends('layouts.admin')

@section('content')

<div class="products d-flex py-4">
    <img width="500" class="img-fluid" src="{{$product->image}}" alt="{{$product->name}}">

    <div class="product-data px-4">
        <h3>{{$product->name}}</h3>
        <div class="content">
            {{$product->description}}
        </div>
    </div>
</div>


@endsection