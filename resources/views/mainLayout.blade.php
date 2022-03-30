<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <header>
        <div
            class="grid rounded-2xl justify-evenly bg-gray-50 dark:bg-gray-300 m-3 mt-10 grid-cols-6">
            <div class="col-span-1 bg-red-50 p-3">
                <div class="flex  flex-col items-center ">
                    <a href=""> <button class="tr-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-14 w-14 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="text-lg font-medium">Salir</span>
                        </button></a>
                </div>
            </div>
            <div class="col-span-1 bg-red-50 p-3">
                <div class="flex  flex-col items-center ">
                    <a href=""> <button class="tr-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-14 w-14 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="text-lg font-medium">Salir</span>
                        </button></a>
                </div>
            </div>
            <div class="col-span-1 bg-red-50 p-3">
                <div class="flex  flex-col items-center ">
                    <a href=""> <button class="tr-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-14 w-14 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="text-lg font-medium">Salir</span>
                        </button></a>
                </div>
            </div>
            <div class="col-span-1 bg-red-50 p-3">
                <div class="flex  flex-col items-center ">
                    <a href=""> <button class="tr-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-14 w-14 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="text-lg font-medium">Salir</span>
                        </button></a>
                </div>
            </div>
            <div class="col-span-1 bg-red-50 p-3">
                <div class="flex  flex-col items-center ">
                    <a href=""> <button class="tr-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-14 w-14 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="text-lg font-medium">Salir</span>
                        </button></a>
                </div>
            </div>
            <div class="col-span-1 bg-red-50 p-3">
                <div class="flex  flex-col items-center ">
                    <a href=""> <button class="tr-300">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-14 w-14 text-gray-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="text-lg font-medium">Salir</span>
                        </button></a>
                </div>
            </div>
        </div>
        {{---<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>--}}
    </header>
    <body>
        @yield('body')
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</html>
