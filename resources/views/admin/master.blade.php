<!DOCTYPE html>
<html lang="it">
<head>
    @include('admin.head')
</head>
<body class="min-vh-100 d-flex flex-column">

    {{-- Wrapper principale --}}
    <div class="d-flex flex-grow-1">

        {{-- Sidebar laterale --}}  
      <nav class="bg-dark text-white p-3" style="width: 250px;">
            @include('admin.sidebar')
        </nav>

        {{-- Contenuto principale --}}
        <div class="d-flex flex-column flex-grow-1">

            {{-- Topbar --}}
            <header class="bg-light border-bottom p-3">
                @include('admin.topbar')
            </header>

            {{-- Contenuto dinamico --}}
            <main class="container-fluid py-4 flex-grow-1">
                @yield('content')
            </main>

            {{-- Footer --}}
            <footer class="bg-light text-center py-3 mt-auto border-top">
                @include('admin.footer')
            </footer>
        </div>
    </div>

    {{-- Script JS --}}
    @include('admin.scripts')
</body>
</html>
