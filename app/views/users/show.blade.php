@extends('layouts.default')

@section('content')

    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-3">
            <div class="media">
                <div class="pull-left">
                    @include('users.partials.avatar', ['size' => 100])
                </div>


                <div class="media-body">
                    </br>
                    <h2 class="media-heading">{{ $user->username }}</h2>
                    <ul class="list-inline text-muted">
                        <li>{{ $user->present()->statusCount }}</li>
                        <li>{{ $user->present()->followerCount }}</li>
                    </ul>

                    @foreach($user->followers as $follower)
                        @include('users.partials.avatar', ['size' => 25, 'user' => $follower])
                    @endforeach
                </div>
            </div>

        </div>

        <div class="col-md-6">
            @unless ($user->is($currentUser))
                @include('users.partials.follow-form')
            @endif


            @if ($user->is($currentUser))
                    @include ('statuses.partials.publish-status-form')
            @endif

                @include ('statuses.partials.statuses', ['statuses' => $user->statuses])
        </div>
    </div>

@stop