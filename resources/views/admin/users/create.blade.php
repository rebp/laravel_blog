@extends('layouts.admin-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">
            
                <h1>Create User</h1>

                    {!! Form::open(['action' => 'AdminUsersController@store', 'method' => 'post', 'files' => true, 'class' => 'nobottommargin']) !!}

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
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', null, ['class' => 'sm-form-control']) !!}
                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="col_full">
                            {!! Form::label('role_id', 'Role') !!}
                            {!! Form::select('role_id', ['' => 'Choose Options'] + $roles, null, ['class' => 'sm-form-control']) !!}
                            @if ($errors->has('role_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="col_full">
                            {!! Form::label('is_active', 'Status') !!}
                            {!! Form::select('is_active', [
                                '' => 'Choose Options',
                                0 => 'Not Active',
                                1 => 'Active'
                            ], null, ['class' => 'sm-form-control']) !!} 
                            @if ($errors->has('is_active'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('is_active') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="col_full">
                            {!! Form::label('photo_id', 'Photo') !!}
                            {!! Form::file('photo_id', ['class' => 'sm-form-control']) !!}
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

						<div class="col_one_sixth">
                            {!! Form::submit('Create', ['class' => 'button button-3d button-rounded button-aqua']) !!}
						</div>

					{!! Form::close() !!}
            
            </div>

        </div>

    </section><!-- #content end -->

@endsection