@extends('layouts.author-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">
            
                <h1>Create Post</h1>

                {!! Form::open(['action' => 'AuthorPostsController@store', 'method' => 'post', 'files' => true]) !!}

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
                        {!! Form::select('category_id', ['' => 'Choose Category'] + $categories, null, ['class' => 'sm-form-control']) !!}
                            @if ($errors->has('category_id'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
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

                    <div class="col_full">
                        {!! Form::submit('Create Post', ['class' => 'button button-3d nomargin']) !!}
                    </div>

                {!! Form::close() !!}
            
            </div>

        </div>

    </section><!-- #content end -->
    
@endsection