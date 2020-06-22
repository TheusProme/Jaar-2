@extends('layout')

@extends('navigation')

@section('content')
    <div class="container">
        <div class="title">Checkout</div>
        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted"></span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email">
                    </div>

                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" name="zip">
                        </div>
                    </div>

                    <hr class="mb-4">

                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>
@stop

@extends('footer')
