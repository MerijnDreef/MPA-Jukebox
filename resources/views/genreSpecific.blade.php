<!DOCTYPE html>

<title>genreSpecific</title>
<link rel="stylesheet" href="css/app.css">

<body>
<a href="/login">Log in</a>
<a href="/">Take me back</a>
<h1>Hey Hey</h1>

<p>some text right here, also all songs within genre, and possible show other genres if they want a different one</p>
 @foreach($genres as $genre) 
    <ul>
        <li>{{ $genre->genre_name }}</li>
    </ul>
@endforeach
</body>
