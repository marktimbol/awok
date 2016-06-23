@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Checkout</h2>
        </div>
        <div class="col-md-9">
            <form method="POST" id="paymentForm">
                <div class="payment-errors">
                    
                </div>
                {!! csrf_field() !!}
                <h3>Personal Information</h3>
                <hr />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">E-mail</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                        </div>
                    </div>
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
                    <input type="text" class="form-control" data-stripe="number" />
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Expiry (MM/YY)</label>
                            <input type="text" size="2" class="form-control" data-stripe="exp_month" />
                            <span> / </span>
                            <input type="text" size="2" class="form-control" data-stripe="exp_year" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>CVC</label>
                            <input type="text" size="4" class="form-control" data-stripe="cvc" />
                        </div>
                    </div>
                </div>

                <hr />

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg submit">Pay Now</button>
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

@section('footer_scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_FdWDhqgmFddybwXdk6GOL1fH');
        $(function() {
            var $form = $('#paymentForm');

            $form.submit(function(event) {
                // Disable the submit button to prevent repeated clicks:
                $form.find('.submit').prop('disabled', true);

                // Request a token from Stripe:
                Stripe.card.createToken($form, stripeResponseHandler);

                // Prevent the form from being submitted:
                return false;
            });

            function stripeResponseHandler(status, response) {
                // Grab the form:
                var $form = $('#paymentForm');

                if (response.error) { // Problem!

                    // Show the errors on the form:
                    $form.find('.payment-errors').text(response.error.message);
                    $form.find('.submit').prop('disabled', false); // Re-enable submission

                } else { // Token was created!

                    // Get the token ID:
                    var token = response.id;

                    // Insert the token ID into the form so it gets submitted to the server:
                    $form.append($('<input type="hidden" name="stripeToken">').val(token));

                    // Submit the form:
                    $form.get(0).submit();
                }
            };
        });
    </script>    

@endsection


