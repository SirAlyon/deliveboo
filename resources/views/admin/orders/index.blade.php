@extends('layouts.admin')

@section('content')


<div class="d-flex justify-content-between py-3">
    <h1>All Orders</h1>
    <div><a href="{{route('admin.orders.create')}}" class="btn btn-primary">Add Order</a></div>
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
          <th>Actions</th>
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
            <th>
                  <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-order-{{$order->id}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                </button>
            

                <!-- Modal -->
                <div class="modal fade" id="delete-order-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitle-{{$order->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark">Delete order #{{$order->id}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                                <div class="text-danger text-center">IRREVERSIBLE ACTION!</div>
                                <div class="text-center">Are you sure you want to delete order <strong>#{{$order->id}}</strong> ?</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>


                                <form action="{{route('admin.orders.destroy', $order->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </th>
        </tr>

        @empty
        <tr>
            <th scope="row">No orders</th>
        </tr>

        @endforelse
    </tbody>
</table>
@endsection

