@extends('layouts.author-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">

                @if(Session::has('updated_profile'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('updated_profile') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif
            
                <h1>Profile</h1>

				<div class="col_one_third">
					<img  src="{{ $user->photo ? $user->photo->file : url('images/team/2.jpg') }}" alt="">
				</div>

				<div class="col_two_third col_last">
                    {!! Form::model($user, ['action' => ['AuthorProfileController@update', $user->id], 'method' => 'patch', 'files' => true, 'class' => 'nobottommargin']) !!}

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
                            {!! Form::label('about_me', 'About Me') !!}
                            {!! Form::textarea('about_me', null,  ['class' => 'sm-form-control']) !!}
                            @if ($errors->has('about_me'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('about_me') }}</strong>
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
						</div>

						<div class="col_one_sixth">
                            {!! Form::submit('Save Changes', ['class' => 'button button-3d button-rounded button-aqua']) !!}
						</div>

					{!! Form::close() !!}

				</div>

            
            </div>

        </div>

    </section><!-- #content end -->

@endsection