<!DOCTYPE html>

<title>Jukebox</title>

<body>
@auth
    <h3>{{ auth()->User()->name }}</h3>
    <a href="/logout">Logout</a>
@endauth
@guest
    <a href="/login">Log in</a>
    <a href="/register">register</a>
@endguest
<h1>It's the main page</h1>

<a href="/songs">Songs</a>
<a href="/playlist">Playlist</a>
<p>some text right here, also show me some genre's here</p>
@foreach($genres as $genre) 
    <ul>
        <li><a href="genreSpecific/{{$genre->id}}">{{ $genre->name }}</a></li>
    </ul>
@endforeach

<p>reminder, songs duration is an integer, find a thing that converts it to minutes and seconds</p>
</body>
