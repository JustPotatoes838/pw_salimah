<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-md w-80">

        <h2 class="text-2xl font-bold mb-6 text-center">Sign In 🔐</h2>

        <!-- ERROR -->
        @if(session('error'))
            <p class="text-red-500 text-sm mb-4 text-center">
                {{ session('error') }}
            </p>
        @endif

        <form method="POST" action="/login">
            @csrf

            <input 
                type="email" 
                name="email" 
                placeholder="Email"
                class="w-full mb-3 p-2 border rounded-lg"
                required
            >

            <input 
                type="password" 
                name="password" 
                placeholder="Password"
                class="w-full mb-4 p-2 border rounded-lg"
                required
            >

            <button 
                type="submit"
                class="w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600"
            >
                Login
            </button>
        </form>

    </div>

</body>
</html>