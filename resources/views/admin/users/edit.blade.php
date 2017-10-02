@extends('layouts.admin-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">
            
                <h1>Edit User</h1>

				<div class="col_one_third">
					<img  src="{{ $user->photo ? $user->photo->file : url('images/team/2.jpg') }}" alt="Standard Post with Image">
				</div>

				<div class="col_two_third col_last">
                    {!! Form::model($user, ['action' => ['AdminUsersController@update', $user->id], 'method' => 'patch', 'files' => true, 'class' => 'nobottommargin']) !!}

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
                            {!! Form::select('role_id', $roles, null, ['class' => 'sm-form-control']) !!}
						</div>

						<div class="col_full">
                            @if($user->isActive())
                                {!! Form::label('is_active', 'Status') !!}

                                {!! Form::select('is_active', [
                                    1 => 'Active',
                                    0 => 'Not Active'
                                ], null, ['class' => 'sm-form-control']) !!}   
                            @else
                                {!! Form::label('is_active', 'Status') !!}

                                {!! Form::select('is_active', [
                                    0 => 'Not Active',
                                    1 => 'Active'
                                ], null, ['class' => 'sm-form-control']) !!}  
                            @endif
 
						</div>

						<div class="col_full">
                            {!! Form::label('photo_id', 'Photo') !!}
                            {!! Form::file('photo_id', ['class' => 'sm-form-control']) !!}
						</div>

						<div class="col_full">	
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class' => 'sm-form-control']) !!}     
						</div>

						<div class="col_one_sixth">
                            {!! Form::submit('Save', ['class' => 'button button-3d button-rounded button-aqua']) !!}
						</div>

					{!! Form::close() !!}
                        {!! Form::open((['action' => ['AdminUsersController@destroy', $user->id], 'method' => 'delete'])) !!}

                            {!! Form::submit('Delete', ['class' => 'button button-3d button-rounded button-red']) !!}

                        {!! Form::close() !!}	
				</div>

            
            </div>

        </div>

    </section><!-- #content end -->

@endsection