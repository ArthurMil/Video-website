@extends('layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <h3>Your Profile</h3>
        <form action="{{ route('picture.save') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Image (only .jpg)</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>

                <div class="form-group {{ $errors->has('email') ? 'has-errors' : '' }}" >
                    <label for="first_name">First Name</label>
                    <input class="form-control " type="text" name="first_name" id="first_name" value="{{ $user->first_name }}">
                </div>

            <button type="submit" class="btn btn-primary">Save Account</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
        <h4>Profile image: </h4>
    </div>


    @if (Storage::disk('local')->has('-' . $user->id . '.jpg'))
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{ route('account.image', ['filename' => '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
            </div>
        </section>
    @endif
@endsection