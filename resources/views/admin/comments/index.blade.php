@extends('layouts.admin-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">

                @if(count($comments) > 0)
                    <h1>All Comments</h1>

                    <table class="table table-bordered table-striped">
                        <colgroup>
                            <col class="col-xs-2">
                            <col class="col-xs-5">
                            <col class="col-xs-2">
                            <col class="col-xs-1">
                            <col class="col-xs-1">
                            <col class="col-xs-1">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>In Response To</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->author }}</td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->post->user->name }}</td>
                                <td><a href="{{ route('home.post', $comment->post->slug) }}">View Post</a></td>
                                <td><a href="{{ route('admin.replies.show', $comment->id) }}">View Replies</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1>No Comments</h1>
                @endif
            
            </div>

        </div>

    </section><!-- #content end -->
    
@endsection