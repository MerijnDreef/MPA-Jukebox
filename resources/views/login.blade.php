<!DOCTYPE html>

<title>Log in</title>

<body>
<a href="/">Take me back</a>
<h1>Time to login</h1>

<a href="/register">register</a>
<form method="POST" action="/login">
    {{ csrf_field() }}
    <label name="email">email</label><input name="email" id="email" type="email">
    <label for="password">password</label><input name="password" id="password" type="password">
    <input type="submit" id="submit" value="Log in">
    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif
</form>
</body>
