@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to SocialBucket</h1>
        <p>Get ready to Socialize. Come on let the fun begin...</p>

        @if ( ! $currentUser)
            <p>
            {{ link_to_route('register_path', 'Sign Up!', null, ['class' => 'btn btn-lg btn-primary']) }}

           </p>
        @endif
    </div>


@stop