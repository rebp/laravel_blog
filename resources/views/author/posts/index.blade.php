@extends('layouts.author-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">

                @if(Session::has('created_post'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('created_post') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

                @if(Session::has('deleted_post'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('deleted_post') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif

                @if(count($posts) > 0)
                    <h1>My Posts</h1>

                    <table class="table table-bordered table-striped">     
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>                            
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category ? $post->category->name : 'uncategorized' }}</td>                                
                                    <td><a href="{{ route('author.posts.edit', $post->id) }}">Edit Post</a></td>
                                    <td><a href="{{ route('home.post', $post->slug) }}">View Post</a></td>
                                    <td><a href="{{ route('admin.comments.post', $post->id) }}">View Comments</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1>No Posts</h1>
                @endif

            </div>

        </div>
	</section>
	
    
@endsection