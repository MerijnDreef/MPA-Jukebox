<!DOCTYPE html>

<title>Songs</title>

<body>
@auth
<p>{{ auth()->User()->name }}</p>
<a href="/logout">Logout</a>
@endauth
@guest
<a href="/login">Log in</a>
<a href="/register">register</a>
@endguest
<a href="/">Take me back</a>
<h1>All songs</h1>
<a href="/queue">Queue</a>

 @foreach($songs as $song) 
    <ul>
        <li>{{ $song->name }}</li>
      
        <li>
            @if(Request::url() == route('songs'))
                <form action="/songInfo/{{ $song->id }}" method="post">
                    @csrf
                    <button>info</button>
                </form>
                <form action="/songs/{{ $song->id }}" method="post">
                    @csrf
                    <button>Add song</button>
                </form>
            @elseif(Request::url() == (route('playlists').'/'.request()->route('playlistId').'/addSongs'))    
            <form action="/playlists/{{request()->route('playlistId')}}/addSongs/songInfoPlaylist/{{ $song->id }}" method="post">
                    @csrf
                    <button>info (playlist)</button>
                </form>
                <form action="/playlists/{{request()->route('playlistId')}}/addSongs/{{$song->id}}" method="POST">
                    @csrf
                    <button>Add this song</button>
                </form>
            @endif
        </li>
    </ul>
@endforeach
</body>
