<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-48 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-blue-500">
        <a href="" class="flex items-center ps-2.5 mb-5">
            <span
                class="self-center text-xl font-semibold whitespace-nowrap text-gray-50">{{ config('app.name') }}</span>
        </a>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="flex items-center p-2 text-gray-50 rounded-lg hover:bg-blue-800 group capitalize">
                    {!! file_get_contents(public_path('storage/icons/grid.svg')) !!}
                    <span class="ms-3">dasbor</span>
                </a>
            </li>
            <li>
                <a href="{{ route('registrations.index') }}"
                    class="flex items-center p-2 text-gray-50 rounded-lg hover:bg-blue-800 group capitalize">
                    {!! file_get_contents(public_path('storage/icons/calendar.svg')) !!}
                    <span class="flex-1 ms-3 whitespace-nowrap">pemesanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('history.index') }}"
                    class="flex items-center p-2 text-gray-50 rounded-lg hover:bg-blue-800 group capitalize">
                    {!! file_get_contents(public_path('storage/icons/clock.svg')) !!}
                    <span class="flex-1 ms-3 whitespace-nowrap">riwayat</span>
                </a>
            </li>
            <li>
                <a href="{{ route('setting') }}"
                    class="flex items-center p-2 text-gray-50 rounded-lg hover:bg-blue-800 group capitalize">
                    {!! file_get_contents(public_path('storage/icons/settings.svg')) !!}
                    <span class="flex-1 ms-3 whitespace-nowrap">pengaturan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}"
                    class="flex items-center p-2 text-gray-50 rounded-lg hover:bg-blue-800 group capitalize">
                    {!! file_get_contents(public_path('storage/icons/log-out.svg')) !!}
                    <span class="flex-1 ms-3 whitespace-nowrap">keluar</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
