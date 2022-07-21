@extends('layouts.admin')

@section('content')
<div id="admin">
    <barchart></barchart>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-4 d-flex justify-content-between" >
                <div class="card-header">Welcome back <span class="text-primary">{{Auth::user()->name}} {{ __('You are logged in!') }}</span>

                </div>
                <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="button mt-1">
                            <a href="{{route('admin.products.create')}}" class="btn btn-green text-white">Create Product</a>
                        </div>
                </div>



            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <a href="{{route('admin.products.index')}}" class="icon-dashboard">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" width="29" height="29" viewBox="0 0 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            </a>
                            <span class="weekend">Weekend</span>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize text-danger fw-bold">Products</p>
                            <h4 class="mb-0">34</h4>
                        </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than lask week</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <a href="{{route('admin.orders.index')}}" class="icon-dashboard order">
                                <svg xmlns="http://www.w3.org/2000/svg" class=""  width="29" height="29" viewBox="0 0 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            </a>
                            <span class="weekend">Weekend</span>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize text-danger fw-bold">Today's Orders</p>
                            <h4 class="mb-0">115</h4>
                        </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+34% </span>than lask week</p>
                        </div>
                    </div>



                </div>
            </div>
    </div>

            </div>

@endsection
