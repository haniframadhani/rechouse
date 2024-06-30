<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }} | studio foto pilihanmu di jogja</title>
  <link rel="preload" href="{{ URL::asset('css/app.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"></noscript>
  <link rel="shortcut icon" href="{{ URL::asset('/storage/favicons/favicon.ico') }}">
  <link rel="shortcut icon" href="{{ URL::asset('/storage/favicons/favicon.ico') }}" type="image/x-icon">
  <link rel="apple-touch-icon" href="{{ URL::asset('/storage/favicons/apple-touch-icon.png') }}">
  <link rel="icon" href="{{ URL::asset('/storage/favicons/favicon-16x16.png') }}">
  <link rel="icon" href="{{ URL::asset('/storage/favicons/favicon-32x32.png') }}">
  <link rel="icon" href="{{ URL::asset('/storage/favicons/android-chrome-192x192.png') }}">
  <link rel="icon" href="{{ URL::asset('/storage/favicons/android-chrome-512x512.png') }}">
</head>

<body class="bg-white_smoke-500 font-sans">
  <div class="container mx-auto sm:px-1 md:px-2 lg:px-3 xl:px-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 items-center mt-11 lg:mt-4">
      <div class="lg:col-span-1" data-aos="fade-down">
        <h1 class="text-5xl capitalize font-bold text-raisin_black-700">rechouse</h1>
        <p class="font-light text-xl mt-3 mb-8 text-raisin_black-600">Studio foto pilihanmu di Jogja</p>
        <a href="#booking" class="px-8 py-4 text-base focus:outline-none bg-aureolin-500 hover:bg-aureolin-600 focus:ring-2 focus:ring-aureolin-800 font-medium rounded-full text-raisin_black-500">booking sekarang</a>
      </div>
      <div class="flex flex-row gap-2 lg:gap-4 lg:col-span-2 mt-10 lg:mt-0" data-aos="fade-down">
        <div class="aspect-[9/16] lg:aspect-[9/14] overflow-hidden rounded-md">
          <img loading="lazy" src="{{ asset('/storage/img/img_hero_1.webp') }}" alt="" class="object-cover w-full h-full">
        </div>
        <div class="aspect-[9/16] lg:aspect-[9/14] overflow-hidden rounded-md">
          <img loading="lazy" src="{{ asset('/storage/img/img_hero_2.webp') }}" alt="" class="object-cover w-full h-full">
        </div>
      </div>
    </div>
    <article class="mt-14" id="self-photo">
      <h2 class="capitalize font-bold text-3xl text-raisin_black-700 mb-2">self photo</h2>
      <p class="text-raisin_black-600 text-base">Nikmati kebebasan berkreasi dengan paket self photo kami! Dilengkapi dengan studio pribadi dan peralatan profesional, abadikan momen spesialmu sendiri dengan hasil berkualitas tinggi.</p>
      <div class="flex gap-2 lg:gap-4 flex-col md:flex-row mt-4 mb-6">
        <div class="aspect-square overflow-hidden rounded-md" data-aos="fade-left">
          <img loading="lazy" src="{{ asset('/storage/img/img_self_1.webp') }}" alt="" class="object-cover w-full h-full">
        </div>
        <div class="aspect-square overflow-hidden rounded-md" data-aos="fade-left" data-aos-delay="50">
          <img loading="lazy" src="{{ asset('/storage/img/img_self_2.webp') }}" alt="" class="object-cover w-full h-full">
        </div>
        <div class="aspect-square overflow-hidden rounded-md" data-aos="fade-left" data-aos-delay="100">
          <img loading="lazy" src="{{ asset('/storage/img/img_self_3.webp') }}" alt="" class="object-cover w-full h-full">
        </div>
      </div>
      <a href="{{ asset('/storage/pdf/price_list.pdf') }}" download="pricelist_self_photo" class="px-8 py-4 text-base focus:outline-none border-2 border-aureolin-400 hover:border-aureolin-600 hover:bg-aureolin-600 focus:ring-2 focus:ring-aureolin-800 font-medium rounded-full text-raisin_black-500">pricelist</a>
    </article>
    <section class="mt-14" id="review">
      <h2 class="capitalize font-bold text-3xl text-raisin_black-700 mb-2">kata mereka tentang kami</h2>
      {{-- google review by sociablekit --}}
      <div class='sk-ww-google-reviews' data-embed-id='{{env('SOCIABLEKIT_ID')}}'></div>
      <script src='https://widgets.sociablekit.com/google-reviews/widget.js' async defer></script>
    </section>
    <section class="mt-14" id="booking">
      <h2 class="capitalize font-bold text-3xl text-raisin_black-700 mb-2">booking</h2>
      <form action="" method="post">
        @csrf
        <div class="grid gap-6 mb-6">
          <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 capitalize @error('nama') text-red-700
                @enderror">nama</label>
            <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama')
                      bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                    @enderror" placeholder="John" value="{{ old('nama') }}" autocomplete="off" />
            @error('nama')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 capitalize @error('no_hp') text-red-700
                @enderror">no
              hp</label>
            <input type="tel" id="no_hp" name="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('no_hp')
                      bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                    @enderror" placeholder="084893116728" value="{{ old('no_hp') }}" autocomplete="off" />
            @error('no_hp')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-2 text-sm text-red-800">*gunakan nomor whatsapp</p>
          </div>
          <div>
            <label for="waktu_booking" class="block mb-2 text-sm font-medium text-gray-900 capitalize @error('waktu_booking') text-red-700
                @enderror">waktu
              booking</label>
            <input type="datetime-local" id="waktu_booking" name="waktu_booking" min="{{ now()->addDay()->format('Y-m-d') }}T00:00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 @error('waktu_booking')
                      bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500
                    @enderror" value="{{ old('waktu_booking') }}" />
            @error('waktu_booking')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <button type="submit" class="px-8 py-4 text-base focus:outline-none bg-aureolin-500 hover:bg-aureolin-600 focus:ring-2 focus:ring-aureolin-800 font-medium rounded-full text-raisin_black-500">simpan</button>
      </form>
      <p class="mt-8 mb-6">masih ragu atau punya pertanyaan? hubungan kami di <a href="https://wa.me/{{env('NO_WA')}}" class="text-emerald-800 underline" target="_blank" rel="noopener noreferer">whatsapp</a> sekarang</p>
    </section>
    <footer class="full-bleed">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 lg:gap-6 bg-aureolin-500 px-6 pt-6 pb-14 justify-around">
        <div>
          <h3 class="text-raisin_black-700 font-medium text-sm mb-3">paket</h3>
          <ul class="text-xs text-raisin_black-600 flex flex-col gap-1">
            <li><a href="#self-photo">self photo</a></li>
          </ul>
        </div>
        <div>
          <h3 class="text-raisin_black-700 font-medium text-sm mb-3">alamat</h3>
          <a href="{{env('LINK_GMAP')}}" target="_blank" rel="noopener noreferer" class="text-raisin_black-600 text-xs">{{env('ALAMAT')}}</a>
        </div>
        <div>
          <h3 class="text-raisin_black-700 font-medium text-sm mb-3">kontak</h3>
          <ul class="text-xs text-raisin_black-600 flex flex-col gap-1">
            <li><a href="{{env('LINK_IG')}}" class="flex flex-row gap-1 items-center" target="_blank" rel="noopener noreferer">
                {!! file_get_contents(public_path('storage/icons/instagram.svg')) !!}
                instagram</a></li>
            <li><a href="https://wa.me/{{env('NO_WA')}}" class="flex flex-row gap-1 items-center" target="_blank" rel="noopener noreferer">
                {!! file_get_contents(public_path('storage/icons/whatsapp.svg')) !!}
                whatsapp</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" async defer></script>
  {{-- message with sweetalert --}}
  <script>
    @if(session('success'))
    Swal.fire({
      icon: "success",
      title: "BERHASIL",
      text: "{{ session('success') }}",
      showConfirmButton: false,
      timer: 2000
    });
    @elseif(session('error'))
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
