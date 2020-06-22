@extends('layout')

@extends('navigation')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Laravel
        </div>
        @if (Session::has('success'))
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div id="charge-message" class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop

@extends('footer')
