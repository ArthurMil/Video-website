@extends('layouts.master')

@section('content')

    <div class="col-md-6 col-md-offset-3">
        <h3>Upload Video</h3>
        <form action="{{ route ('post.video') }}" method="post">
            <div class="form-group">
                <label for="video">Enter Youtube Video URL</label>
                <input class="form-control " type="text" name="video_url" id="video_url" value="">
            </div>
            <div class="form-group">
                <label for="video_name">Video Name</label>
                <input class="form-control " type="text" name="video_name" id="video_name" value="">
            </div>
            <div class="form-group">
                <label for="description">About video</label>
            <textarea class="form-control" name="description" id="description" rows="3"
                      placeholder="Video Description"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Upload</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
@endsection