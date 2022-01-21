<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mia Share - Test Assignment</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

    </head>
    <body class="antialiased">

        <div class="flex flex-col min-h-screen">
            <div class="px-8 py-3 text-center md:flex justify-between items-center bg-green-700  text-gray-300 ">
                <h1 class="md:mb-0 font-bold uppercase text-xl">Mia Share</h1>
                @if (Route::has('login'))
                    <ul class="md:flex gap-4">
                        @auth
                            <li class="mt-4 mb-4 md:mt-0 md:mb-0"><a href="{{ url('/dashboard') }}" class="text-gray-900 bg-gray-200 py-1 px-4 rounded-lg hover:bg-gray-200 hover:text-gray-500 cursor-pointer focus:outline-none">Dashboard</a></li>
                        @else
                            <li class="mt-4 mb-4 md:mt-0 md:mb-0"><a href="{{ route('login') }}" class="text-gray-900 bg-gray-200 py-1 px-4 rounded-lg hover:bg-gray-200 hover:text-gray-500 cursor-pointer focus:outline-none">Log in</a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="text-gray-900 bg-gray-200 py-1 px-4 rounded-lg hover:bg-gray-200 hover:text-gray-500 cursor-pointer focus:outline-none">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                @endif
            </div>
            
            <div class="lg:flex flex-1 justify-center bg-gray-200">
                <div class="overflow-hidden">
                    <div class="bg-gray-200 transform">
                        <div class="transform py-16">
                            <h1 class="text-xl">Welcome to <span class="text-gray-700 text-xl font-bold uppercase">Mia Share</span></h1>
                            <p class="italic mt-4 text-md">Create a to-do list Laravel application (version 7.x/8.x) with the following functionality:</p>
                            
                            <li>User authentication and authorization</li>
                            <li>Two roles: user and administrator</li>
                            <li>Administrator has full permissions</li>
                            <li>User can only create and delete their own to-do items</li>
                            <li>Users can create a to-do list</li>
                            <li>Users can mark to-do items as done</li>
                            <li>Users can delete to-do items</li>
                            <li>Administrators can see all users to-do items, including deleted to-do items</li>

                        </div>
                    </div>
                </div>
            </div>
            <x-footer/>
        </div>
    </body>
</html>
