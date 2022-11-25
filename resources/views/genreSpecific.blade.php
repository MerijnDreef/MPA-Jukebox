<!DOCTYPE html>

<title>genreSpecific</title>

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
@foreach($genres as $genre)
    <h1>{{ $genre->name }}</h1>
@endforeach

@foreach($songs as $song) 
    <ul>
        <li>{{ $song->name }}</li> 
        <form action="/songInfo/{{ $song->id }}" method="post">
            @csrf
            <button>info</button>
        </form>
        <form action="/songs/{{ $song->id }}" method="post">
            @csrf
            <button>Add song</button>
        </form>
    </ul>
@endforeach
</body>
