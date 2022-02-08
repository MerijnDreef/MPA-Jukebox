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
<h1>Specific playlist my boy</h1>

@foreach($savedList as $data)
<h1>{{ $data->name }}</h1>
<h3>Total duration: {{ $totalDuration['duration'] }}</h3>

        <a href="{{$data->id}}/saveList">edit</a>
        <form action="delete/{{$data->id}}" method="POST">
            @csrf
            <button>Delete Playlist</button>
        </form>
        <br>
        <a href="{{$data->id}}/addSongs">Add a song</a>
        @foreach($data->savedListsSongs as $savedListSong)
        <ul>
            <li>{{ $savedListSong->songs->name }}</li>
            <li>{{ $savedListSong->songs->artist_name }}</li>
            <li>{{ $savedListSong->songs->duration }}</li>
        </ul>
        <form action="/playlists/delete/{{$data->id}}/{{$savedListSong->songs->id}}" method="POST">
            @csrf
           <button>Delete Song</button>
        </form>
    @endforeach
@endforeach
</body>
