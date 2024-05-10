<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>riwayat | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>

<body>
    {{-- {{ dd($registrations->total()) }} --}}
    @include('components.sidebar')
    <div class="p-4 sm:ml-48">
        <h1 class="font-bold capitalize text-3xl mb-5">riwayat booking</h1>
        @if ($registrations->total() > 0)
            <div class="relative overflow-x-auto shadow-md sm:rounded mt-5">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-50 uppercase bg-blue-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                no hp
                            </th>
                            <th scope="col" class="px-6 py-3">
                                waktu booking
                            </th>
                            <th scope="col" class="px-6 py-3">
                                status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr class="bg-white border-b hover:bg-gray-50 ">
                                <td scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                    {{ $registration->nama }}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                    {{ $registration->no_hp }}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($registration->waktu_booking)->isoFormat('dddd, D MMMM YYYY HH:mm') }}
                                </td>
                                <td class="px-6 py-4 text-gray-900 whitespace-nowrap">
                                    @if ($registration->status == 'menunggu konfirmasi')
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $registration->status }}</span>
                                    @elseif ($registration->status == 'selesai')
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $registration->status }}</span>
                                    @elseif ($registration->status == 'batal')
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded ">{{ $registration->status }}</span>
                                    @elseif ($registration->status == 'terkonfirmasi')
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded">{{ $registration->status }}</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form onsubmit="return confirm('Hapus &#34;{{ $registration->nama }}&#34;');"
                                        action="{{ route('history.destroy', $registration->id) }}" method="POST">
                                        <div class="">
                                            <a class="px-3 py-2 text-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg focus:outline-none"
                                                role="button"
                                                href="{{ route('history.edit', $registration->id) }}">edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-2 text-sm focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-2 focus:ring-red-300 font-medium rounded-lg">hapus</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {!! $registrations->links('pagination::tailwind') !!}
            </div>
        @else
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 mt-5" role="alert">
                <span class="font-medium">belum</span> ada pesanan
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>

</html>
