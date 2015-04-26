@extends('layouts.default')

@section('content')

    <h3>Sign In!</h3>

    <div class="row">
        <div class="col-md-6">

            {{ Form::open(['route' => 'login_path']) }}

            <!-- Email Form Input -->
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <!-- Password Form Input -->
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <!--Sign In Input-->
            <div class="form-group">
                {{ Form::submit('Sign In!', ['class' => 'btn-lg btn-primary']) }}
                {{ link_to('/password/remind', 'Reset Your Password', ['class' => 'btn-lg btn-primary']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>
@stop