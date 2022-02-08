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
<h1>Edit playlist</h1>

<h1>Change the name</h1>
    <form action="" method="POST">
        @csrf
        <input type="text" name="name">
        <input type="submit" value="Update">
    </form>
     
</body>
