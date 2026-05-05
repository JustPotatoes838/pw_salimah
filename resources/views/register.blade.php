<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-2xl shadow-md w-80">

    <h2 class="text-2xl font-bold mb-6 text-center">Sign Up 📝</h2>

    <!-- ERROR VALIDATION -->
    @if ($errors->any())
        <div class="text-red-500 text-sm mb-4">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <input type="text" name="name" placeholder="Name"
            class="w-full mb-3 p-2 border rounded-lg" required>

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 p-2 border rounded-lg" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-4 p-2 border rounded-lg" required>

        <button type="submit"
            class="w-full bg-green-500 text-white p-2 rounded-lg hover:bg-green-600">
            Register
        </button>
    </form>

    <p class="text-sm text-center mt-4">
        Sudah punya akun? 
        <a href="/login" class="text-blue-500">Login</a>
    </p>

</div>

</body>
</html>