<!DOCTYPE html>

<title>Playlist</title>

<body>
<!-- @session -->

{{ $values }}
@auth
    <h3>{{ auth()->User()->name }}</h3>
    <a href="/logout">Logout</a>
@endauth
@guest
    <a href="/login">Log in</a>
    <a href="/register">register</a>
@endguest
<a href="/">Take me back</a>
<h1>Well it looks like you are making a playlist</h1>

@foreach($songs as $song)
    <p>loop the songs that belong to the list</p>
   
   <ul>
        <li>{{ $song->name }}</li>
        <li>{{ $song->artist_name }}</li>
        <li>{{ gmdate("i:s", $song->duration) }}</li>
        <li><a href='/queue/{{$song->id}}'>submit</a></li>
    </ul>
@endforeach

@auth
    <p>Like put something here to make the list</p>
    <form>
        <input name="submit" id="submit" value="Make playlist">
    </form>
@endauth
<p>reminder, you have to add all the songs durations in 1 full list duration</p>
</body>
