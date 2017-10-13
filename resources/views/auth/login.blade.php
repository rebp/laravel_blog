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

                                    {!! Form::open(['action' => 'Auth\LoginController@login', 'method' => 'post']) !!}

                                        <h3>Login to your Account</h3>

                                        <div class="col_full">
                                            {!! Form::label('email', 'Email') !!}
                                            {!! Form::text('email', null, ['class' => 'sm-form-control']) !!}
                                            @if ($errors->has('email'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col_full">
                                            {!! Form::label('password', 'Password') !!}
                                            {!! Form::password('password', ['class' => 'sm-form-control']) !!}   
                                            @if ($errors->has('password'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col_full">
                                            <label>
                                                {!! Form::checkbox('remember', null, old('remember') ? true : false ) !!} Remember Me
                                            </label>
                                        </div>

                                        <div class="col_full nobottommargin">
                                            {!! Form::submit('Login', ['class' => 'button button-3d button-black nomargin']) !!}
                                            <a href="#" class="fright">Forgot Password?</a>   
                                        </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section><!-- #content end -->
@endsection