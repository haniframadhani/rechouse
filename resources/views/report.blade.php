<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laporan | {{ config('app.name') }}</title>
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
    @include('components.sidebar')
    <div class="p-4 sm:ml-48">
        <h1 class="font-bold capitalize text-3xl mb-5">laporan pelanggan</h1>

        <p>pilih rentang:</p>
        <div class="flex justify-start gap-2 mb-3">
            <input type="date" name="start" id="start" class="border rounded border-gray-700" value='{{\Carbon\Carbon::parse($range[0] > $range[1] ? $range[1] : $range[0])->isoFormat('YYYY-MM-DD')}}'>
            <span>-</span>
            <input type="date" name="end" id="end" class="border rounded border-gray-700" value='{{\Carbon\Carbon::parse($range[0] < $range[1] ? $range[1] : $range[0])->isoFormat('YYYY-MM-DD')}}'>
        </div>
        <a href="{{route('report', ['start'=>'2024-07-07', 'end'=>'2024-07-01'])}}" id="print" class="px-3 py-2 text-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg focus:outline-none">cetak</a>
        <p class="mt-3">{{$reports->count()}} pelanggan dalam {{\Carbon\Carbon::parse($range[0] > $range[1] ? $range[1] : $range[0])->isoFormat('D MMMM YYYY')}} - {{\Carbon\Carbon::parse($range[0] < $range[1] ? $range[1] : $range[0])->isoFormat('D MMMM YYYY')}}</p>
        @if ($reports->count() > 0)
        <div class="flex mt-5 items-center">
            <div class="relative w-1/2 h-96 mx-auto">
                {!! $chart->container() !!}
            </div>
            <div class="w-1/2 flex flex-col gap-2">
                <div class="flex items-center gap-2">
                    <div class="bg-blue-500 w-10 h-10 flex items-center justify-center">
                        <span class="text-white">{{$statusCounts['terkonfirmasi']}}</span>
                    </div>
                    <p>terkonfirmasi</p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="bg-yellow-500 w-10 h-10 flex items-center justify-center">
                        <span class="text-white">{{$statusCounts['menunggu konfirmasi']}}</span>
                    </div>
                    <p>menunggu konfirmasi</p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="bg-green-500 w-10 h-10 flex items-center justify-center">
                        <span class="text-white">{{$statusCounts['selesai']}}</span>
                    </div>
                    <p>selesai</p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="bg-red-500 w-10 h-10 flex items-center justify-center"> 
                        <span class="text-white">{{$statusCounts['batal']}}</span>
                    </div>
                    <p>batal</p>
                </div>
            </div>
        </div>
        @else
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 mt-5" role="alert">
                <span class="font-medium">tidak</span> ada pesanan dari {{\Carbon\Carbon::parse($range[0])->isoFormat('D MMMM YYYY')}} - {{\Carbon\Carbon::parse($range[1])->isoFormat('D MMMM YYYY')}}
            </div>
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" charset="utf-8"></script>
    {!! $chart->script() !!}
    <script>
        const startDateInput = document.getElementById('start');
        const endDateInput = document.getElementById('end');
        const anchor = document.getElementById('print');
        let url = anchor.href;
        let baseUrl = url.split('?')[0];
        startDateInput.addEventListener('change', e => {
            anchor.href = `${baseUrl}?start=${startDateInput.value}&end=${endDateInput.value}`;
            console.log(anchor);
        })
        endDateInput.addEventListener('change', e => {
            anchor.href = `${baseUrl}?start=${startDateInput.value}&end=${endDateInput.value}`;
            console.log(anchor);
        })             
    </script>

</body>

</html>