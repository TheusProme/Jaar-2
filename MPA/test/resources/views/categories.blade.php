@extends('layout')

@extends('navigation')

@section('content')
<section>
    <div class="container">
        <div class="text-muted mt-5 mb-5 text-center display-4">Categories</div>
        <hr />
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 p-2">
                <div class="card p-3 shadow text-center border-0">
                    <a class="card-body" href="/categories/{{ $category->id }}">
                        <img src="https://img.icons8.com/nolan/64/safe-ok.png">
                        <hr />
                        <h2 class=" card-title display-1" style="font-size:3.0vmin;">{{ $category->title }}</h2>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop

@extends('footer')