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
<h1>Well it looks like you are making a playlist</h1>

@foreach($savedLists as $savedList)
   <ul>
        <li>{{ $savedList->name }}</li>
        <li><a href='/playlists/{{$savedList->id}}'>Go here</a></li>
    </ul>
@endforeach

</body>
