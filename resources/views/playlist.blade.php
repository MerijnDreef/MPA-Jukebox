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

@foreach($savedList as $data)
        {{ dd($data) }}
        @foreach($data->savedListsSongs as $savedListSong)
        {{ dd($savedListSong) }}
        <ul>
            <li>{{ $savedListSong->song->name }}</li>
            <li>{{ $savedListSong->song->artist_name }}</li>
            <li>{{ gmdate("i:s", $savedListSong->song->duration) }}</li>
        </ul>
    @endforeach
@endforeach

@auth
    <p>Like put something here to make the list</p>
    <form>
        <input name="submit" id="submit" value="Make playlist">
    </form>
@endauth
<p>reminder, you have to add all the songs durations in 1 full list duration</p>
</body>
