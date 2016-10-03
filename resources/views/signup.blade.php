@extends('layouts.master')


@section('content')

    <div class="row signform">
        @include('includes.message-errors')
    <div class="col-md-6 col-md-offset-3">
        <h3>Sign Up</h3>
        <form action=" {{ route('signup') }}" method="post">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" >
                <label for="email">Your E-Mail</label>
                <input class="form-control " type="text" name="email" id="email" value=" {{ Request::old('email') }}">
            </div>
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">Your First Name</label>
                <input class="form-control" type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}">
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Your Password</label>
                <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password_confirmation">Password Confirmation</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="{{ Request::old('password_confirmation') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
    </div>

@endsection