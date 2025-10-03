
<!DOCTYPE html>
<html lang="it">
<head>
    @include('admin.head')
</head>
<body>
    <div id="wrapper">
        @include('admin.sidebar')

        <div id="content-wrapper">
            @include('admin.topbar')

            <main class="container-fluid py-4">
                @yield('content')
            </main>

           
        </div>
        @include('admin.footer')
    </div> 

    @include('admin.scripts')
</body>
</html>
