@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">Welcome back <span class="text-primary">{{Auth::user()->name}} {{ __('You are logged in!') }}</span></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    
                    <div class="button mt-3">
                        <a href="{{route('admin.products.create')}}" class="btn btn-primary text-white">Create Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection