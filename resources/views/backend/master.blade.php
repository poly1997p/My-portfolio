<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    @include('backend.includes.style')
</head>

<body>

    <div class="app d-flex">

        {{-- Sidebar --}}
        @include('backend.includes.sidebar')

        <div class="main flex-grow-1 d-flex flex-column" style="min-height:100vh; background:#f8f9fc;">

            {{-- Topbar --}}
            @include('backend.includes.topbar')

            {{-- Main Content --}}
            <main class="flex-grow-1 p-3">
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('backend.includes.footer')

        </div>

    </div>

    @include('backend.includes.script')

    @stack('scripts')
</body>

</html>
