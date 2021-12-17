<!DOCTYPE html>

<title>Register</title>

<body>
<a href="/">Take me back</a>
<h1>Time to register</h1>

<p>some text right here, also show me how to register</p>
<form method="POST" action="/register">
    {{ csrf_field() }}
    <label for="name">name</labe><input name="name" id="name" type="text">
    <label name="email">email</label><input name="email" id="email" type="email">
    <label for="password">password</label><input name="password" id="password" type="password">
    <input type="submit" id="submit" value="Log in">
</form>
</body>
