@extends('layouts.master2')


@section('content')
    <body>
    </div>
    <body>
    <div class="image-header">
        <h1> Ready to have fun or share your funny videos with the world?</h1>
        <div class="header-buttons">
        @if(!Auth::user())
        <a class="ghost-button" href="{{ route('signup') }}">Register Now! </a>
        <a class="ghost-button" href="{{ route('signin') }}">Sign In! </a>
        @endif
        @if(Auth::user())
            <a class="ghost-button" href="{{ route('video.upload') }}">Share your video with us! </a>
        @endif
            </div>
    </div>
    </body>
    {{--<div class="Header_dashboard">--}}
        {{--<p>Test</p>--}}
    {{--</div>--}}
    {{--<div class="carousel slide" id="myCarousel">--}}

        {{--<!-- Indicators -->--}}
        {{--<ol class="carousel-indicators">--}}
            {{--<li class="active" data-slide-to="0" data-target="#myCarousel"></li>--}}
            {{--<li data-slide-to="1" data-target="#myCarousel"></li>--}}
            {{--<li data-slide-to="2" data-target="#myCarousel"></li>--}}
        {{--</ol>--}}

        {{--<div class="carousel-inner">--}}
            {{--<div class="item active" id="slide1">--}}
                {{--<div class="carousel-caption">--}}
                    {{--<h4>Bootstrap 3</h4>--}}
                    {{--<p>Created website with twitter bootstrap 3</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="item" id="slide2">--}}
                {{--<div class="carousel-caption">--}}
                    {{--<h4>Coded web by Bla Bla</h4>--}}
                    {{--<p>HTML5 CSS3 BootStrap3 JQuery Laravel Ajax</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="item" id="slide3">--}}
                {{--<div class="carousel-caption">--}}
                    {{--<h4>Web hosting 404</h4>--}}
                    {{--<p>Learn how to host your website and get your website running!</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- Controls carousel -->--}}
        {{--<a class="left carousel-control" data-slide="prev" href="#myCarousel"><span class="icon-prev"></span></a>--}}
        {{--<a class="right carousel-control" data-slide="next" href="#myCarousel"><span class="icon-next"></span></a>--}}
    {{--</div>--}}


    <div class="container" id="dashboard_content">


        <div class="row" id="featuresHeading">
            <div class="col-12">
                <h2>More Features</h2>
                <p class="lead">Nesciunt 3 wolf moon schlitz narwhal mixtape, id tilde culpa paleo crucifix humblebrag.</p>
            </div>
        </div>

        <div class="row" id="features">
            @foreach($videos as $video)
                <div class="col-sm-4 feature">
                    <div class="panel">
                        <div class="panel-heading">
                            @if(Auth::user() == $video->user)
                                <div class="delete pull-right"><a href="{{ route('video.delete', [$video->id]) }}">X</a>
                                </div>
                            @endif
                            <h3 class="panel-title video_name">{{ $video->video_name }}</h3>

                        </div>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe width="320" height="250" class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/{{ $video->video_url  }}"
                                    allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen"
                                    msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen"
                                    webkitallowfullscreen="webkitallowfullscreen">
                            </iframe>
                        </div>
                        <div class="info">
                            <p>Posted by {{ $video->user->first_name }} on {{ $video->created_at }}</p>
                            <hr class="postInfo">
                        </div>
                        <div class="video_description">
                            <p>{{ $video->description }} </p>
                            <a href="{{ route('view.video', [$video->id]) }}" class="btn btn-danger btn-block">Continue
                                to video</a>
                        </div>
                    </div>
                </div>
             @endforeach
        </div>
        <div class="text-center">
            {!! $videos->links() !!}
        </div>


        <div class="row" id="moreCourses">
            <div class="col-12">
                <hr>
                <h3>Weekly top rated videos coming soon!</h3>
                <div class="thumbnails row">
                    <div class="col-6">
                        <div class="thumbnail">
                            <img src="https://placeholdit.imgix.net/~text?txtsize=52&txt=553%C3%97311&w=553&h=311" alt="HearthStonePlay">

                            <div class="caption">
                                <h3>Weekly Video #1</h3>

                                <p><a href="#" class="btn btn-primary btn-small" target="_blank">Watch now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="thumbnail">
                            <img src="https://placeholdit.imgix.net/~text?txtsize=52&txt=553%C3%97311&w=553&h=311" alt="overwatchPlay">

                            <div class="caption">
                                <h3>Weekly video #2</h3>

                                <p><a href="#" class="btn btn-primary btn-small" target="_blank">Watch now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </body>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <h6>Copyright &copy; 2016 Arturas</h6>
                </div>
                <div class="col-sm-4">
                    <h6>About Us</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit, harum, dolor ipsa ex vero voluptatem blanditiis repellat suscipit vel obcaecati eius quidem tempore autem doloremque quos at iste pariatur beatae?</p>
                </div>

                <div class="col-sm-2">
                    <h6>Navigation</h6>
                    <ul class="unstyled">
                        <div class="footerNav">
                        <li ><a href="#">Home</a></li>
                        <li ><a href="{{ route('contact.us') }}">Contact</a></li>
                        </div>
                    </ul>
                </div>

                <div class="col-sm-2">
                    <h6>Folow Us</h6>
                    <ul class="unstyled">
                        <li><a href="#"><img src="{{ URL::to('images/facebooklogo.png') }}" width="30px" height="30px"></a></li>
                        <li><a href="#"><img src="{{ URL::to('images/twitterlogo.png') }}" width="30px" height="30px" class="footer_twitter"></a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h6>Coded To Learn</h6>
                </div>
            </div>
        </div>
    </footer>

@endsection