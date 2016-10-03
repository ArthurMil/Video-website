@extends('layouts.master')

@section('content')
    <div class="col-sm-2"></div>
    <div class="col-sm-8 InspectVideo">
        <h3 class="h3text">{{ $video->video_name }}</h3>
    <div class="embed-responsive embed-responsive-16by9  col-xs-12 text-center ">

        <iframe width="600" height="400" class="embed-responsive-item"
         src="https://www.youtube.com/embed/{{ $video->video_url}}" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen">
        </iframe>
    </div>
        <section class="row new-post">
            @if(Auth::user())
                <h3>What do you want to say?</h3>
            @endif
            @if(!Auth::user())
               <h3>Comments</h3>
                @endif
                <form action="{{ route('post.create', $video->id) }}" method="post" id="subbot">
                    @if(Auth::user())
                    <div class="form-group textCont">
                        <textarea class="form-control" name="body" id="body" rows="5" placeholder="Your Post"></textarea>
                    </div>

                    <div class="BtnPost">
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </div>
                    @endif
                </form>
        </section>
        @foreach($video->posts()->orderBy('created_at', 'desc')->paginate(12) as $post)
    <div class="row">
        <div class="panel panel-default comment-section">
            <article class="post" data-postid="{{ $post->id }}">
                <div class="panel-heading"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span><span class="badge">{{ $post->likes->where('post_id', $post->id)->where('like', 1)->count() }}</span>
                    <strong>{{ $post->user->first_name }}</strong> <span class="text-muted">{{ $post->created_at }}</span>
                </div>
                <div class="panel-body">
                    {{ $post->body }}
                </div>
                <div class="interaction">
                    @if(Auth::user())
                    <a href="#"
                       class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like' }}</a>
                    @endif
                    @if(Auth::user() == $post->user)
                        |
                        <a class="edit" href="#">Edit</a> |
                        <a href="{{ route('post.delete', ['post_id'=>$post->id]) }}">Delete</a>
                    @endif

                </div>
            </article>
            </div>
        </div>
        @endforeach
        <div class="text-center">
            {{$video->posts()->paginate(12)->links()}}
        </div>
    </div>
    <div class="col-sm-2"></div>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>


    <script>
        var token ='{{ Session:: token() }}';
        var urlEdit = '{{ route('edit') }}';
        var urlLike = '{{ route('like') }}';
    </script>

@endsection