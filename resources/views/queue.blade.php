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

<a href="/">Take me back</a>
<h1>Make your playlist</h1>
<a href="/songs">Add your Songs</a>

@if(session()->has('queue'))
    @foreach($totalDurationQueue as $duration)
        <h2>Queue Duration: {{ $duration }}</h2>
        @foreach(session()->get('queue') as $list)  
            @foreach($songs as $song)
                <ul>
                    <li>Name: {{ $song->name }}</li>
                    <li>Genre: {{ $song->genre->name }}</li>
                    <li> {{ $song->duration }}</li>
                    <li>Artist: {{ $song->artist_name }}</li>
                    <form action="/queue/delete/{{$song->id}}" method="POST">
                        @csrf
                        <button>Remove</button>
                    </form>
                </ul>
            @endforeach
        @endforeach
    @endforeach
@endif

@auth
    <form action="" method="POST">
        @csrf
        <label for="name">Fill in the name of the playlist </label><input name="name">
        <input name="submit" type="submit" value="Make playlist">
    </form>
@endauth
</body>
