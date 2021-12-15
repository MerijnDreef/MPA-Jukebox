<!DOCTYPE html>

<title>Jukebox</title>

<body>
<a href="/login">Log in</a>
<a href="/register">register</a>
<h1>Hey Hey</h1>

<a href="/songs">Songs</a>
<p>some text right here, also show me some genre's here</p>
@foreach($genres as $genre) 
    <ul>
        <li><a href="genreSpecific/{{$genre->id}}">{{ $genre->name }}</a></li>
    </ul>
@endforeach

<p>reminder, songs duration is an integer, find a thing that converts it to minutes and seconds</p>
</body>
