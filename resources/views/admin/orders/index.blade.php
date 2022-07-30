@extends('layouts.admin')

@section('content')


<div class="d-flex justify-content-between py-3">
    <h1 class="fw-bold font-fa">All Orders</h1>
</div>

<table class="table table-striped  table-responsive table-light border-dark">
    <thead>
        <tr>
          <th scope="row">ID</th>
          <th>Name</th>
          <th>Lastname</th>
          <th>Email</th>
          <th>Address</th>
          <th>Phone Number</th>
          <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
        
        @forelse($orders as $order)

        <tr>
            <th scope="row">{{$order->id}}</th>
            <th>{{$order->guest_name}}</th>
            <th>{{$order->guest_lastname}}</th>
            <th>{{$order->guest_email}}</th>
            <th>{{$order->guest_address}}</th>
            <th>{{$order->guest_phone_number}}</th>
            <th>€ {{$order->total_price}}</th>
        </tr>

        @empty
        <tr>
            <th scope="row">No orders</th>
        </tr>

        @endforelse
    </tbody>
</table>
@endsection

