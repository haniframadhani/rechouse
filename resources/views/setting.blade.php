<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pengaturan | {{ config('app.name') }}</title>
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
    <div class="container mx-auto sm:px-1 md:px-2 lg:px-3 xl:px-4 mb-5">
        <h1 class="font-bold capitalize text-3xl mb-5 text-center">ubah password</h1>
        @if (Session::has('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 w-6/12 mx-auto" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <form action="{{ route('changePassword') }}" method="post" class="w-6/12 mx-auto">
            @csrf
            <div class="mb-5">
                <label for="current-password"
                    class="block mb-2 text-sm font-medium text-gray-900 capitalize @error('current_password') text-red-700
                @enderror">password
                    saat ini</label>
                <div class="flex">
                    <input type="password" id="current-password" name='current_password'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none rounded-s-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama')
                  bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                  @enderror"
                        required />
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-s-0 border-gray-300 rounded-e-md cursor-pointer">
                        <div id="toggle-current">
                            <div id="eye-current" class="block">
                                {!! file_get_contents(public_path('/storage/icons/eye.svg')) !!}
                            </div>
                            <div id="eye-hide-current" class="hidden">
                                {!! file_get_contents(public_path('/storage/icons/eye-off.svg')) !!}
                            </div>
                        </div>
                    </span>
                </div>
                @error('current_password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="new-password"
                    class="block mb-2 text-sm font-medium text-gray-900 capitalize @error('new_password') text-red-700
                @enderror">password
                    baru</label>
                <div class="flex">
                    <input type="password" id="new-password" name='new_password'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none rounded-s-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama')
                  bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                  @enderror"
                        required />
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-s-0 border-gray-300 rounded-e-md cursor-pointer">
                        <div id="toggle-new">
                            <div id="eye-new" class="block">
                                {!! file_get_contents(public_path('/storage/icons/eye.svg')) !!}
                            </div>
                            <div id="eye-hide-new" class="hidden">
                                {!! file_get_contents(public_path('/storage/icons/eye-off.svg')) !!}
                            </div>
                        </div>
                    </span>
                </div>
                @error('new_password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="re-new-password"
                    class="block mb-2 text-sm font-medium text-gray-900 capitalize @error('re_new_password') text-red-700
                @enderror">konfirmasi
                    password
                    baru</label>
                <div class="flex">
                    <input type="password" id="re-new-password" name='re_new_password'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-none rounded-s-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama')
                  bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                  @enderror"
                        required />
                    <span
                        class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-s-0 border-gray-300 rounded-e-md cursor-pointer">
                        <div id="toggle-re-new">
                            <div id="eye-re-new" class="block">
                                {!! file_get_contents(public_path('/storage/icons/eye.svg')) !!}
                            </div>
                            <div id="eye-hide-re-new" class="hidden">
                                {!! file_get_contents(public_path('/storage/icons/eye-off.svg')) !!}
                            </div>
                        </div>
                    </span>
                </div>
                @error('re_new_password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="px-3 py-2 text-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg focus:outline-none">simpan</button>
            <a href="{{ route('dashboard.index') }}"
                class="px-3 py-2 text-sm text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-800 font-medium rounded-lg">batal</a>
        </form>
    </div>

    <script>
        const toggle_current = document.querySelector('#toggle-current');
        const current_password = document.querySelector('#current-password');
        const eye_current = document.querySelector('#eye-current');
        const eye_hide_current = document.querySelector('#eye-hide-current');
        toggle_current.addEventListener("click", () => {
            const type = current_password.getAttribute("type") === "password" ? "text" : "password";
            current_password.setAttribute("type", type);
            if (eye_current.classList.contains('block') && eye_hide_current.classList.contains('hidden')) {
                eye_current.classList.remove('block');
                eye_current.classList.add('hidden');
                eye_hide_current.classList.remove('hidden');
                eye_hide_current.classList.add('block');
            } else {
                eye_current.classList.remove('hidden');
                eye_current.classList.add('block');
                eye_hide_current.classList.remove('block');
                eye_hide_current.classList.add('hidden');
            }
        })
        const toggle_new = document.querySelector('#toggle-new');
        const new_password = document.querySelector('#new-password');
        const eye_new = document.querySelector('#eye-new');
        const eye_hide_new = document.querySelector('#eye-hide-new');
        toggle_new.addEventListener("click", () => {
            const type = new_password.getAttribute("type") === "password" ? "text" : "password";
            new_password.setAttribute("type", type);
            if (eye_new.classList.contains('block') && eye_hide_new.classList.contains('hidden')) {
                eye_new.classList.remove('block');
                eye_new.classList.add('hidden');
                eye_hide_new.classList.remove('hidden');
                eye_hide_new.classList.add('block');
            } else {
                eye_new.classList.remove('hidden');
                eye_new.classList.add('block');
                eye_hide_new.classList.remove('block');
                eye_hide_new.classList.add('hidden');
            }
        })
        const toggle_re_new = document.querySelector('#toggle-re-new');
        const re_new_password = document.querySelector('#re-new-password');
        const eye_re_new = document.querySelector('#eye-re-new');
        const eye_hide_re_new = document.querySelector('#eye-hide-re-new');
        toggle_re_new.addEventListener("click", () => {
            const type = re_new_password.getAttribute("type") === "password" ? "text" : "password";
            re_new_password.setAttribute("type", type);
            if (eye_re_new.classList.contains('block') && eye_hide_re_new.classList.contains('hidden')) {
                eye_re_new.classList.remove('block');
                eye_re_new.classList.add('hidden');
                eye_hide_re_new.classList.remove('hidden');
                eye_hide_re_new.classList.add('block');
            } else {
                eye_re_new.classList.remove('hidden');
                eye_re_new.classList.add('block');
                eye_hide_re_new.classList.remove('block');
                eye_hide_re_new.classList.add('hidden');
            }
        })
    </script>
</body>

</html>
