@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">TOA - Tales of Ascension</div>

                <div class="panel-body">
                    <h1>Welcome on Tales of Ascension, an experimental browsergame based on <a href="https://laravel.com/">Laravel</a>.</h1>
                    
                    @if(!Auth::user())
                        <p>Please register to be able to play. No need for a real e-mail address.</p>
                    @else
                        <p>Hello {{ Auth::user()->name }}</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
