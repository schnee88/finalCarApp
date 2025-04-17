<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    @vite('resources/css/app.css') {{-- Include Tailwind via Vite --}}
</head>
<body class="min-h-screen bg-white dark:bg-gray-900 text-gray-900 dark:text-white flex flex-col items-center justify-center p-6">

    <div class="w-full max-w-4xl flex flex-col items-center space-y-6">
        
        <div class="max-w-sm w-full mb-4">
            <img src="https://media.istockphoto.com/id/1273534607/vector/car-icon-auto-vehicle-isolated-transport-icons-automobile-silhouette-front-view-sedan-car.jpg?s=612x612&w=0&k=20&c=hpl9DfPNZ4EquzqsiVPmq1828pkFv0KkdkesxKdLk2Y=" 
                 alt="Custom Logo" class="w-full h-auto" width="95" height="95" />
        </div>

        <div class="text-center max-w-md w-full space-y-4">
            <h1 class="text-3xl font-semibold">Welcome to Car App</h1>
            <p class="text-gray-500 dark:text-gray-400">Sign in or create an account to get started</p>

            <div class="flex flex-wrap justify-center gap-4 mt-4">
                <a href="{{ route('login') }}" 
                   class="px-6 py-2 border rounded-md text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-600 hover:border-gray-500 transition">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" 
                       class="px-6 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800 transition">
                        Register
                    </a>
                @endif
            </div>
        </div>

        <div class="mt-10 text-sm text-gray-400">
            &copy; {{ date('Y') }} RR_Corp. All rights reserved.
        </div>
    </div>

</body>
</html>
