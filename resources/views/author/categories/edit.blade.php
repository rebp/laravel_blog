@extends('layouts.author-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">
            
                <h1>Edit Category</h1>

				<div class="col_half">
					{!! Form::model($category, ['action' => ['AuthorCategoriesController@update', $category->id], 'method' => 'patch']) !!}

						<div class="col_full">
                            {!! Form::label('name', 'Category') !!}
                            {!! Form::text('name', null, ['class' => 'sm-form-control']) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="col_half">
                            {!! Form::submit('Save', ['class' => 'button button-3d button-rounded button-aqua']) !!}
						</div>                        
					{!! Form::close() !!}
                    {!! Form::open((['action' => ['AuthorCategoriesController@destroy', $category->id], 'method' => 'delete'])) !!}

                        <div class="col_half col_last">

                            {!! Form::submit('Delete', ['class' => 'button button-3d button-rounded button-red']) !!}

                        </div>

                    {!! Form::close() !!}	
				</div>

				<div class="col_half col_last">

				</div>

            
            </div>

        </div>

    </section><!-- #content end -->
    
@endsection