@extends('layouts.admin-dashboard')

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

                <h1>All Posts</h1>

                <table class="table table-bordered table-striped">     
                    <thead>
                        <tr>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ $post->title }}</td>
                                <td><a href="#">Edit Post</a></td>
                                <td><a href="#">View Post</a></td>
                                <td><a href="#">View Comments</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
	</section>
	
    
@endsection