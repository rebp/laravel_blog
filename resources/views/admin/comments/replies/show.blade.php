@extends('layouts.admin-dashboard')

@section('content')

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">

                @if(Session::has('deleted_reply'))
                    <div class="style-msg successmsg">
                        <div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('deleted_reply') }}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                @endif
            
                <h1>All Replies</h1>

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
                            <th>Reply</th>
                            <th>In Response To</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($replies as $reply)
                            <tr>
                                <td>{{ $reply->author }}</td>
                                <td>{{ $reply->content }}</td>
                                <td>{{ $reply->comment->author }}</td>
                                <td><a href="{{ route('home.post', $reply->comment->post->slug) }}">View Post</a></td>
                                <td class="center">
                                    {!! Form::open((['action' => ['CommentRepliesController@destroy', $reply->id], 'method' => 'delete'])) !!}

                                            {!! Form::submit('X', ['class' => 'button button-red']) !!}

                                    {!! Form::close() !!}                                
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            
            </div>

        </div>

    </section><!-- #content end -->

    
@endsection