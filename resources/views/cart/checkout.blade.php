@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Checkout</h2>
        </div>
        <div class="col-md-9">
            <form method="POST">
                {!! csrf_field() !!}
                <h3>Personal Information</h3>
                <hr />
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                </div>

                <div class="form-group">
                    <label for="name">E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                </div>

                <h3>Delivery Address</h3>
                <hr />
                <div class="form-group">
                    <label for="address1">Address 1</label>
                    <input type="text" name="address1" class="form-control" value="{{ old('address1') }}" />
                </div>

                <div class="form-group">
                    <label for="address2">Address 2</label>
                    <input type="text" name="address2" class="form-control" value="{{ old('address2') }}" />
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city') }}" />
                        </div>    
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" name="state" class="form-control" value="{{ old('state') }}" />
                        </div>   
                    </div>
                </div>

                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" class="form-control" value="{{ old('country') }}" />
                </div>

                <h3>Payment Method</h3>
                <hr />
                <div class="form-group">
                    <label>Name on Card</label>
                    <input type="text" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Card Number</label>
                    <input type="text" class="form-control" />
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Expiry</label>
                            <input type="text" class="form-control" placeholder="MM/YY" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CVC</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                </div>

                <hr />

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg">Pay Now</button>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <h3>Order Summary</h3>
            <hr />
        </div>
    </div>
</div>
@endsection


