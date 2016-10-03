@extends('layouts.master')


@section('content')
    <div class="row signform">
        @include('includes.message-errors')
    <div class="col-md-6 col-md-offset-3">
        <h3>Sign In</h3>
        <form action=" {{ route('signin') }}" method="post">
            <div class="form-group {{ $errors->has('email') ? 'has-errors' : '' }}" >
                <label for="email">Your E-Mail</label>
                <input class="form-control " type="text" name="email" id="email" value="{{ Request::old('email') }}">
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-errors' : '' }}">
                <label for="password">Your Password</label>
                <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                <p><a href="{{ url('password/reset') }}">Forgot My Password</a></p>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@endsection