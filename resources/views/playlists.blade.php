<!DOCTYPE html>

<title>Playlist</title>

<body>
@auth
    <h3>{{ auth()->User()->name }}</h3>
    <a href="/logout">Logout</a>
@endauth
<br>
<a href="/">Take me back</a>
<h1>Choose a playlist</h1>

@foreach($savedLists as $savedList)
   <ul>
        <li>{{ $savedList->name }}</li>
        <li><a href='/playlists/{{$savedList->id}}'>Go here</a></li>
    </ul>
@endforeach

</body>
