<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>

<body>
    @include('components.sidebar')
    <div class="p-4 sm:ml-48">
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-green-100 text-green-800 p-5 rounded-md col-span-2">
                pesanan berikutnya
                @if ($dashboard['berikut'] != null)
                    <span class="text-2xl font-bold flex">
                        {{ \Carbon\Carbon::parse($dashboard['berikut']['waktu_booking'])->isoFormat('dddd, D MMMM YYYY HH:mm') }}
                    </span>
                    {{ $dashboard['berikut']['nama'] }}
                @else
                    <span class="text-2xl font-bold flex">
                        belum ada pesanan
                    </span>
                @endif
            </div>
            <div class="bg-yellow-100 text-yellow-800 p-5 rounded-md"><span
                    class="text-2xl font-bold flex">{{ $dashboard['menunggu'] }}</span>
                pesanan menunggu konfirmasi</div>
            <div class="bg-blue-100 text-blue-800 p-5 rounded-md"><span
                    class="text-2xl font-bold flex">{{ $dashboard['terkonfirmasi'] }}</span>
                pesanan
                terkonfirmasi</div>
        </div>
    </div>
</body>

</html>
