@extends('layouts.public')

@section('title', 'Login')

@section('content')
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tab-login">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="nobottommargin" action="{{ route('login') }}" method="post">
                                        
                                        {{ csrf_field() }}

                                        <h3>Login to your Account</h3>

                                        <div class="col_full">
                                            <label for="email">Email:</label>
                                            <input type="text" id="email" name="email" value="" class="form-control" required/>
                                        </div>

                                        <div class="col_full">
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" name="password" value="" class="form-control" requiered/>
                                        </div>

                                        <div class="col_full">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>

                                        <div class="col_full nobottommargin">
                                            <button class="button button-3d button-black nomargin" >Login</button>
                                            <a href="{{ route('password.request') }}" class="fright">Forgot Password?</a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section><!-- #content end -->
@endsection