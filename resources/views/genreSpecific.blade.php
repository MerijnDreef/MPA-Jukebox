<!DOCTYPE html>

<title>genreSpecific</title>

<body>
@auth
<p>{{ auth()->User()->name }}</p>
<a href="/logout">Logout</a>
@endauth
@guest
<a href="/login">Log in</a>
<a href="/register">register</a>
@endguest
<a href="/">Take me back</a>
@foreach($genres as $genre)
<h1>{{ $genre->name }}</h1>
@endforeach
<p>some text right here, also all songs within genre, and possible show other genres if they want a different one</p>
 @foreach($songs as $song) 
    <ul>
        <li>{{ $song->name }}</li> 
        <li>{{ $song->artist_name }}</li>
        <li>{{ gmdate("i:s", $song->duration) }}</li>
    </ul>
@endforeach
</body>
