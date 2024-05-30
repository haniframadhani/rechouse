<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/storage/favicons/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ URL::asset('/storage/favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ URL::asset('/storage/favicons/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ URL::asset('/storage/favicons/favicon-16x16.png') }}">
    <link rel="icon" href="{{ URL::asset('/storage/favicons/favicon-32x32.png') }}">
    <link rel="icon" href="{{ URL::asset('/storage/favicons/android-chrome-192x192.png') }}">
    <link rel="icon" href="{{ URL::asset('/storage/favicons/android-chrome-512x512.png') }}">
</head>

<body>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-5xl font-bold text-gray-900">RecHouse</a>
        <div class="w-full bg-white rounded-lg md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl capitalize">
                    login
                </h1>
                @if (Session::has('error'))
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 capitalize">email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                            required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                            required>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white">Sign
                        in</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
