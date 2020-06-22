@extends('layout')

@extends('navigation')

@section('content')
@if (Session::has('cart'))
<div class="container">
    <div class="title">Products</div>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <ul class="list-group">
                @foreach ($products as $product)
                <li class="list-group-item">
                    <span class="badge">{{ $product['quantity'] }}</span>
                    <strong>{{ $product['item']['title'] }}</strong>
                    <span class="label label-success">{{ $product['price'] }}</span>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('product.increaseByOne', ['id' => $product['item']['id']]) }}">
                                    Increase by 1</a>
                            </li>
                            <li>
                                <a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}">
                                    Reduce by 1</a>
                            </li>
                            <li>
                                <a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}">
                                    Reduce all</a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <strong>Total: {{ $totalPrice }}</strong>
        </div>
    </div>
    <hr>
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <a href="{{ route('checkout') }}" type="button" class="btn btn-succes">Checkout</a>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h2>No items in cart!</h2>
        </div>
    </div>
</div>
@endif
@stop

@extends('footer')