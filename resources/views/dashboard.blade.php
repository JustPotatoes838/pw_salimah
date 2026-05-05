<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h2>HALAMAN USER 👤</h2>

    <p>Selamat datang, {{ auth()->user()->name }}</p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>