@extends('layouts.default')

@section('content')

<div class="row">
     <div class="col-md-6">

        <h1>Register!</h1>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <h3> Uh Oh!</h3>

                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

        <!-- The method in Form::open() protects against Cross Site Request Forgery ! -->
                {{ Form::open(['route' => 'register_path']) }}

                <!--Username Form Input -->
                <div class="form-group">
                    {{ Form::label('username', 'Username:') }}
                    {{ Form::text('username', null, ['class' => 'form-control']) }}
                </div>

                <!-- Email Form Input -->
                <div class="form-group">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>

                <!-- Password Form Input -->
                <div class="form-group">
                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>

                <!-- Password Confirmation Form Input -->
                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Password Confirmation:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Sign Up!', ['class' => 'btn-lg btn-primary']) }}
                </div>

                {{ Form::close() }}
    </div>
</div>



@stop