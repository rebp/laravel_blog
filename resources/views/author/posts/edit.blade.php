@extends('layouts.author-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">

                @if(Session::has('updated_post'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('updated_post') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif
            
                <h1>Edit Post</h1>

				<div class="col_one_third">
					<img src="{{ $post->photo ? $post->photo->file : url('images/blog/standard/17.jpg') }}" alt="">
				</div>

				<div class="col_two_third col_last">
                    {!! Form::model($post, ['action' => ['AuthorPostsController@update', $post->id], 'method' => 'patch', 'files' => true]) !!}

						<div class="col_full">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'sm-form-control']) !!}
                            @if ($errors->has('title'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="col_full">
                            {!! Form::label('category_id', 'Category') !!}
                            {!! Form::select('category_id', $categories, null, ['class' => 'sm-form-control']) !!}
						</div>

						<div class="col_full">
                            {!! Form::label('photo_id', 'Image') !!}
                            {!! Form::file('photo_id', null, ['class' => 'sm-form-control']) !!}
						</div>

						<div class="col_full">
                            {!! Form::label('content', 'Content') !!}
                            {!! Form::textarea('content', null,  ['class' => 'sm-form-control']) !!}
                            @if ($errors->has('content'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="col_half">
                            {!! Form::submit('Save', ['class' => 'button button-3d button-rounded button-aqua']) !!}
						</div>

					{!! Form::close() !!}
                    <div class="col_half col_last">
                        {!! Form::open((['action' => ['AuthorPostsController@destroy', $post->id], 'method' => 'delete'])) !!}

                            {!! Form::submit('Delete', ['class' => 'button button-3d button-rounded button-red']) !!}

                        {!! Form::close() !!}	
                    </div>

				</div>

            
            </div>

        </div>

    </section><!-- #content end -->
    
@endsection