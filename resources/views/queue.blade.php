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
<a href="/songs">Add your Songs</a>
<p>loop the songs that belong to the list</p>

@if(session()->has('queue'))
hey hey
    @foreach(session()->get('queue') as $list)
        @foreach($songs as $song)
            @if($list == $song->id)
            <ul>
                <li>{{ $song->name }}</li>
                <form action="/queue/delete/{{$song->id}}" method="POST">
                    @csrf
                    <button>Delete</button>
                </form>
            </ul>
            @endif
        @endforeach
    @endforeach
@endif

@auth
    <p>Like put something here to make the list</p>
    <form action="" method="POST">
        @csrf
        <label for="name">Fill in the name of the playlist </label><input name="name">
        <input name="submit" type="submit" value="Make playlist">
    </form>
@endauth
<p>reminder, you have to add all the songs durations in 1 full list duration</p>
</body>
