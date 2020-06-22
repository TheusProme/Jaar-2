@extends('layout')

@extends('navigation')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>login</h1>
            <form action="{{ route('user.login') }}" method="post">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Login</button>

                {{ csrf_field() }}
            </form>
            <p>Don't have an account? <a href="{{ route('user.register') }}">Sign up here</a></p>
        </div>
    </div>
@endsection

@extends('footer')
