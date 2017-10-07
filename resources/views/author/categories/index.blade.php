@extends('layouts.author-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">
            
                <h1>Categories</h1>

                @if(Session::has('created_category'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('created_category') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

                @if(Session::has('edited_category'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('edited_category') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

                @if(Session::has('deleted_category'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('deleted_category') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

				<div class="col_half">
					{!! Form::open(['action' => 'AuthorCategoriesController@store', 'method' => 'post']) !!}

						<div class="col_full">
                            {!! Form::label('name', 'Category') !!}
                            {!! Form::text('name', null, ['class' => 'sm-form-control']) !!}
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
						</div>

						<div class="col_full">
                            {!! Form::submit('Create Category', ['class' => 'button button-3d button-rounded button-aqua']) !!}
						</div>

					{!! Form::close() !!}
				</div>

				<div class="col_half col_last">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Category</th>
								<th></th>
								<th>Created</th>
								<th>Updated</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td><a href="{{ route('author.categories.edit', $category->id) }}">Edit</a></td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>{{ $category->updated_at->diffForHumans() }}</td>							
                                </tr>
                            @endforeach
						</tbody>
					</table>
				</div>

            
            </div>

        </div>

    </section><!-- #content end -->
    
@endsection