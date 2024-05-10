<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tambah | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>

<body>
    <div class="container mx-auto sm:px-1 md:px-2 lg:px-3 xl:px-4 mb-5">
        <form action="{{ route('registrations.store') }}" method="post">
            @csrf
            <div class="grid gap-6 mb-6">
                <div>
                    <label for="nama"
                        class="block mb-2 text-sm font-medium text-gray-900 capitalize @error('nama') text-red-700
                @enderror">nama</label>
                    <input type="text" id="nama" name="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama')
                      bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                    @enderror"
                        placeholder="John" value="{{ old('nama') }}" autocomplete="off" />
                    @error('nama')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="no_hp"
                        class="block mb-2 text-sm font-medium text-gray-900 capitalize @error('no_hp') text-red-700
                @enderror">no
                        hp</label>
                    <input type="tel" id="no_hp" name="no_hp"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('no_hp')
                      bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                    @enderror"
                        placeholder="084893116728" value="{{ old('no_hp') }}" autocomplete="off" />
                    @error('no_hp')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="waktu_booking"
                        class="block mb-2 text-sm font-medium text-gray-900 capitalize @error('waktu_booking') text-red-700
                @enderror">waktu
                        booking</label>
                    <input type="datetime-local" id="waktu_booking" name="waktu_booking"
                        min="{{ now()->addDay()->format('Y-m-d') }}T00:00"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 @error('waktu_booking')
                      bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                    @enderror"value="{{ old('waktu_booking') }}" />
                    @error('waktu_booking')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="px-3 py-2 text-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg focus:outline-none">simpan</button>
            <a href="{{ route('registrations.index') }}"
                class="px-3 py-2 text-sm text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-800 font-medium rounded-lg">batal</a>
        </form>
    </div>
</body>

</html>
