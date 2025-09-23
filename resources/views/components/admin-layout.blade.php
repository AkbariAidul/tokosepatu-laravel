<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Admin</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" @if(session('success')) data-success-message="{{ session('success') }}" @endif>
        <div class="min-h-screen bg-gray-100 flex">
            <aside class="w-64 bg-gray-900 text-gray-300 flex-shrink-0">
                <div class="p-4 text-xl font-bold text-white border-b border-gray-700">
                    Toko Sepatu
                </div>
                <nav class="mt-4 flex flex-col justify-between h-[calc(100vh-100px)]">
                    <div>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2.5 px-4 rounded transition duration-200 whitespace-nowrap {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('admin.produk.index') }}" class="flex items-center mt-1 py-2.5 px-4 rounded transition duration-200 whitespace-nowrap {{ request()->routeIs('admin.produk.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" /></svg>
                            Produk
                        </a>
                        <a href="{{ route('admin.kategori.index') }}" class="flex items-center mt-1 py-2.5 px-4 rounded transition duration-200 whitespace-nowrap {{ request()->routeIs('admin.kategori.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" /><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" /></svg>
                            Kategori
                        </a>
                        <a href="{{ route('admin.pesanan.index') }}" class="flex items-center mt-1 py-2.5 px-4 rounded transition duration-200 whitespace-nowrap {{ request()->routeIs('admin.pesanan.*') ? 'bg-gray-700 text-white' : 'hover:bg-gray-700 hover:text-white' }}">
                            <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" /></svg>
                            Pesanan
                        </a>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="flex items-center py-2.5 px-4 rounded transition duration-200 whitespace-nowrap hover:bg-gray-700 hover:text-white">
                                <svg class="w-5 h-5 mr-3 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </nav>
            </aside>

            <div class="flex-1 flex flex-col">
                <header class="bg-white shadow-md">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                        <div>
                            @if (isset($header))
                                {{ $header }}
                            @endif
                        </div>
                        <div class="text-sm text-gray-500">
                            Logged in as: <strong>{{ Auth::user()->name }}</strong>
                        </div>
                    </header>
                </header>

                <main class="flex-1 overflow-y-auto p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

        {{-- Semua script diletakkan di sini, sebelum </body> --}}
        @if (session('success'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: @json(session('success')), // <-- INI PERBAIKANNYA
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        </script>
        @endif

        <script>
    // Script untuk notifikasi sukses
    const successMessage = document.body.dataset.successMessage;
    if (successMessage) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: successMessage,
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    }

    // Script untuk konfirmasi hapus
    document.addEventListener('submit', function(event) {
        if (event.target.classList.contains('delete-form')) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan bisa mengembalikan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
        }
    });
</script>
    </body>
</html>