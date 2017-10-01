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

                                    <form id="register-form" name="register-form" class="nobottommargin" action="{{ route('register') }}" method="post">

                                        {{ csrf_field() }}

                                        <div class="col_full">
                                            <label for="name">Name:</label>
                                            <input type="text" id="name" name="name" value="" class="form-control" required autofocus />
                                        </div>

                                        <div class="col_full">
                                            <label for="email">Email Address:</label>
                                            <input type="email" id="email" name="email" value="" class="form-control" required/>
                                        </div>

                                        <div class="col_full">
                                            <label for="password">Choose Password:</label>
                                            <input type="password" id="password" name="password" value="" class="form-control" required/>
                                        </div>

                                        <div class="col_full">
                                            <label for="password-confirm">Re-enter Password:</label>
                                            <input type="password" id="password-confirm" name="password-confirm" value="" class="form-control" required/>
                                        </div>

                                        <div class="col_full nobottommargin">
                                            <button type="submit" class="button button-3d button-black nomargin">Register</button>
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