@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">                

                    @if(Auth::check())
                        <div class="panel-heading">Dashboard</div>
                    @else
                         <div class="panel-heading">Public</div>
                    @endif

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::check())
                        {{ Auth::user()->role->name }}
                    @else
                         You are not logged in!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
