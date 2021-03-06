@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-card"><h5 class="text-center text-white">{{ __('Registration on Deliveboo') }}</h5></div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card-body bg-color-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate class="needs-validation">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><span class="form-label">{{ __('Name') }}</span> &ast;</label>
                           
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus minlength="3" maxlength="50">
                                <div class="invalid-feedback">Your name is invalid!</div>
                                <small class="text-muted">Max 50 characters | Only letters</small>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right"><span class="form-label">{{ __('Lastname') }}</span> &ast;</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                <div class="invalid-feedback">Lastname is invalid!</div>
                                <small class="text-muted">Max 50 characters | Only letters</small>
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right"><span class="form-label">{{ __('Restaurant Name') }}</span> &ast;</label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="restaurant_name" autofocus>
                                <div class="invalid-feedback">Restaurant Name is invalid!</div>
                                <small class="text-muted">Max 70 characters</small>
                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right"><span class="form-label">{{ __('address') }}</span> &ast;</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                <div class="invalid-feedback">Your Address is invalid!</div>
                                <small class="text-muted">Max 255 characters</small>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right"><span class="form-label">{{ __('Vat Number') }}</span> &ast;</label>

                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" pattern="[0-9]+"  maxlength="11" autocomplete="vat" autofocus required >
                                <div class="invalid-feedback">Your VAT is invalid!</div>
                                <small class="text-muted">Your vat 11 numbers</small>
                                @error('vat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="types" class="col-md-4 col-form-label text-md-right"><span class="form-label">Restaurant Types</span> &ast;</label>

                            <div class="col-md-6">
                                <select multiple class="form-select form-control @error('restaurant_name') is-invalid @enderror" name="types[]" id="types" aria-label="types" required>
                                    @foreach ($types as $type)
                                    <option value="{{$type->id}}" {{ (collect(old('types'))->contains($type->id)) ? 'selected':'' }}>{{$type->name}}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Select one or more types</small>
                            </div>

                            @error('types')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><span class="form-label">{{ __('E-Mail Address') }}</span> &ast;</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="image" class="col-md-4 col-form-label text-md-right"><span class="form-label">Image</span></label>
                            <div class="col-md-6">
                                <input type="file" name="image" id="image" class="pl-0 pt-1 form-control @error('image') is-invalid @enderror" placeholder="Insert image" aria-describedby="helpimage">
                                <small class="text-muted">File format: jpeg,jpg,svg,png</small>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><span class="form-label">{{ __('Password') }}</span> &ast;</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><span class="form-label">{{ __('Confirm Password') }}</span> &ast;</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" minlength="8">
                            </div>
                        </div>

                        <div class="mb-3 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-large rounded-pill text-uppercase text-white">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

