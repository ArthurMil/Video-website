<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">
</head>
<body>
<header>
    <div class="navbar navbar-fixed-top padding">
        <div class="container">

            <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/"><img src= {{URL::asset("images/logo.png")}} alt="YourLogo"></a>
            <div class="nav-collapse collapse navbar-responsive-collapse">

                <ul class="nav navbar-nav pull-right">
                    @if(!Auth::check())
                    <button type="button" class="btn btn-default" id="signButton" onclick="window.location='{{ URL::route('signup') }}'">Sign Up</button>
                    <button type="button" class="btn btn-default" id="signButton" onclick="window.location='{{ URL::route('signin') }}'">Sign In</button>
                    @endif
                    @if(Auth::check())

                           <!-- <button type="button" class="btn btn-default" id="signButton" onclick="window.location='{{ URL::route('logout') }}'">Logout</button> -->

                   <li class="dropdown">
                      <!-- <div class="row headerImage">
                           @if (Storage::disk('local')->has('-' . Auth::user()->id . '.jpg'))
                               <section class="row new-post">
                                   <div class="col-md-6 col-md-offset-3">
                                       <img src="{{ route('account.image', ['filename' => '-' . Auth::user()->id . '.jpg']) }}" width="100px" height="100px" alt="" class="img-responsive">
                                   </div>
                               </section>
                       </div>
                       @endif -->
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                           @if (Storage::disk('local')->has('-' . Auth::user()->id . '.jpg'))
                           <img class="img-circle profile_Image pull-left" src="{{ route('account.image', ['filename' => '-' . Auth::user()->id . '.jpg']) }}" width="35px" height="35px" alt="">
                           @endif
                           @if (!Storage::disk('local')->has('-' . Auth::user()->id . '.jpg'))
                                   <img src={{URL::asset("images/profile_default.png")}} class="img-circle profile_Image pull-left"  alt="profile_default" width="35px" height="35px">
                            @endif
                            My Account({{Auth::user()->first_name}})<strong class="caret"></strong></a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ URL::route('video.upload') }}"><span class="glyphicon glyphicon-wrench"></span>Upload Video</a>
                            </li>
                            <li>
                                <a href="{{URL::route('updateProfile')}}"><span class="glyphicon glyphicon-refresh"></span>Update Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ URL::route('logout') }}"><span class="glyphicon glyphicon-off" ></span>Sign Out</a>
                            </li>
                        </ul>
                    </li>
                        @endif
                </ul>
            </div>
        </div>
    </div>
</header>
</body>
</html>