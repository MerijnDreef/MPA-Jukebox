<!DOCTYPE html>

<title>Playlist</title>

<body>
@auth
    <h3>{{ auth()->User()->name }}</h3>
    <a href="/logout">Logout</a>
@endauth
@guest
    <a href="/login">Log in</a>
    <a href="/register">register</a>
@endguest

<br>
<a href="/">Take me back</a>

@foreach($song as $songInfo)
<ul>
        <li>{{ $songInfo->name }}</li>
        <li>{{ $songInfo->artist_name }}</li>
        <li>{{ $songInfo->duration }}</li>
    </ul>
@endforeach

</body>