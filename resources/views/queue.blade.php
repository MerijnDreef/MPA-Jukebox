<!DOCTYPE html>

<title>Playlist</title>

<body>
<!-- @session -->


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
<a href="/songs">Songs</a>

<!-- @foreach($queueList as $song)
    <p>loop the songs that belong to the list</p>
   
   <ul>
        <li>{{ $song }}</li>
     
    </ul>
@endforeach -->

@auth
    <p>Like put something here to make the list</p>
    <form>
        <input name="submit" id="submit" value="Make playlist">
    </form>
@endauth
<p>reminder, you have to add all the songs durations in 1 full list duration</p>
</body>
