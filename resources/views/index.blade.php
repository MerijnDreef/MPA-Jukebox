<!DOCTYPE html>

<title>Jukebox</title>

<body>
@auth
    <h3>{{ auth()->User()->name }}</h3>
    <a href="/logout">Logout</a>
    <a href="/playlists">Playlist</a>
@endauth
@guest
    <a href="/login">Log in</a>
    <a href="/register">register</a>
@endguest

<h1>It's the main page</h1>
<a href="/queue">Queue</a>
<a href="/songs">Songs</a>

<p>Genres</p>
@foreach($genres as $genre) 
    <ul>
        <li><a href="genreSpecific/{{$genre->id}}">{{ $genre->name }}</a></li>
    </ul>
@endforeach
</body>
