<!DOCTYPE html>

<title>Jukebox</title>
<link rel="stylesheet" href="css/app.css">

<body>
<a href="/login">Log in</a>
<a href="/register">register</a>
<h1>Hey Hey</h1>

<p>some text right here, also show me some genre's here</p>
@foreach($genres as $genre) 
    <ul>
        <li><a href="genreSpecific">{{ $genre->genre_name }}</a></li>
    </ul>
@endforeach

<p>reminder, songs duration is an integer, fix when solution found</p>
</body>
