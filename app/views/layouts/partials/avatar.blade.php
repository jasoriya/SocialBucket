<!--<img class="media-object" src="{{ $user->present()->gravatar(isset($size) ? $size : 100) }}" alt="{{ $user->username }}">-->
<a href="{{ route('profile_path', $user->username) }}">
    <img class="media-object img-circle avatar" src="{{ $user->present()->gravatar(isset($size) ? $size : 34) }}" alt="{{ $user->username }}">
</a>