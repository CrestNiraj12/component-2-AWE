<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
        
        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src={{ asset("vendor/jquery/jquery.min.js") }}></script>
        
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="{{asset('js/int-alpine.js')}}" defer></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
        <script src="{{asset('js/charts-lines.js')}}" defer></script>
        <script src="{{asset('js/charts-pie.js')}}" defer></script>
        <script src="{{asset('js/charts-bars.js')}}" defer></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        @if(Session::has('success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            };
            toastr.success("{{ Session::get('success') }}");
    
        </script>
        @endif
    
        @if(Session::has('error'))
    
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            };
            toastr.error("{{ Session::get('error') }}");
    
        </script>
        @endif
    
        @if($errors->any())
            @foreach($errors->all() as $err)
            <script>
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                };
                toastr.error("{{ $err }}");
        
            </script>
            @endforeach
        @endif

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire("navigation-menu")

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
