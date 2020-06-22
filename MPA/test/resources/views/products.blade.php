@extends('layout')

@extends('navigation')

@section('content')
<div class="container">
    <div class="title">Products</div>

    <style>
    .test {
        height: 260px;
        margin: 0px;
    }

    .bottom-align-text {
        position: absolute;
        bottom: 0;
    }

    .b-m-15 {
        margin-bottom: 15px;
    }
    </style>

    <div class="row" style="float: none; margin: 0 auto;">
        @foreach ($products as $product)
        <div class="col-md-3 img-thumbnail test">
            <h3>{{ $product->title }}</h3>
            <p>{{ $product->description }}</p>

            <div class="clearfix bottom-align-text b-m-15">
                <p>${{ $product->price }}</p>
                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-primary pull-left"
                    role="button">Add to cart</a>
                <a href="/products/{{ $product->id }}" class="btn btn-secondary pull-right" role="button">Link
                    to product</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop

@extends('footer')