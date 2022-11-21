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

@foreach($song as $songInfo)
<ul>
        <li>{{ $songInfo->name }}</li>
        <li>{{ $songInfo->artist_name }}</li>
        <li>{{ $songInfo->duration }}</li>
    </ul>

    @if(Request::url() == route('songsInfo').'/'.request()->route('song_id'))
        <form action="/songs/{{ $song->id }}" method="post">
            @csrf
            <button>Add song</button>
        </form>
    @elseif(Request::url() == (route('playlists').'/'.request()->route('playlistId').'/addSongs/songInfoPlaylist.'/'.request()->route('songId'))
        <form action="/playlists/{{request()->route('playlistId')}}/addSongs/{{$song->id}}" method="POST">
            @csrf
            <button>Add this song</button>
        </form>
    @endif
@endforeach



</body>