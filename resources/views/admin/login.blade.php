@extends('layout.app')

@section('content')
@if(isset($error))
    <div class="alert alert-success">
        {{ $error }}
    </div>
@endif
<div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" method="post" action="{{ route('adminlogin') }}">
                @csrf
                    <div class="sign-avatar">
                        <img src="{{ asset ('img/avatar-sign.png') }}" alt="">
                    </div>
                    <header class="sign-title">Sign In</header>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="E-Mail or Phone"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="reset-password.html">Reset Password</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded">Sign in</button>
                    <p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p>
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->


<script src="{{ asset ('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset ('js/lib/popper/popper.min.js') }}"></script>
<script src="{{ asset ('js/lib/tether/tether.min.js') }}"></script>
<script src="{{ asset ('js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<script src="js/app.js"></script>
@endsection