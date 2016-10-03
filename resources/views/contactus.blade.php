
@extends('layouts.master')

@section('content')
    <div class="col-md-6 col-md-offset-3">
             <section class="row new-post">
                <h3>Contact Us</h3>
                 <form action="{{ url('/contactus') }}" method="POST">
                     {{ csrf_field() }}
                     <div class="form-group" >
                         <label name="email">Your E-Mail</label>
                         <input class="form-control " type="text" name="email" id="email">
                     </div>
                     <div class="form-group">
                         <label name="subject">Subject:</label>
                         <input class="form-control" id="subject" name="subject">
                     </div>
                    <div class="form-group">
                        <label name="text">Message:</label>
                        <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                    </div>
                     <input type="submit" value="Send Message" class="btn btn-success">

                     {{--<button type="submit" class="btn btn-primary">Send</button>--}}
                     {{--<input type="hidden" name="_token" value="{{ Session::token() }}">--}}
                 </form>
            </section>
        </div>

@endsection