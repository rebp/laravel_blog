@extends('layouts.public')

@section('title', 'Register')

@section('content')
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tab-register">
                            <div class="panel panel-default nobottommargin">
                                <div class="panel-body" style="padding: 40px;">
                                
                                    <h3>Register for an Account</h3>

                                    {!! Form::open(['action' => 'Auth\RegisterController@register', 'method' => 'post']) !!}


                                        <div class="col_full">
                                            {!! Form::label('name', 'Name') !!}
                                            {!! Form::text('name', null, ['class' => 'sm-form-control']) !!}
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col_full">
                                            {!! Form::label('email', 'Email Address') !!}
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
                                            {!! Form::label('password_confirmation', 'Confirm Password') !!}
                                            {!! Form::password('password_confirmation', ['class' => 'sm-form-control']) !!} 
                                        </div>

                                        <div class="col_full nobottommargin">
                                            {!! Form::submit('Register', ['class' => 'button button-3d button-black nomargin']) !!}
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
