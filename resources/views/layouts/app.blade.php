<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head> 
    

    <?php 
        /*class="min-h-screen bg-gray-100" */
    ?>
    <body class="relative font-sans antialiased h-screen w-screen bg-cover" style="background-image: url('/img/backgroundapp.jpeg'); background-attachment: fixed;">
            <div class="absolute inset-0 bg-black opacity-65" style="position: fixed;"></div>
            <div class="" >
            <!--overlay-->
            
            
            <div class="absolute inset-0">
                @include('layouts.head')
                @include('layouts.navigation')
                <!-- Page Heading 
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
                -->
                <!-- Page Content -->
                    <main class="" style="margin-top: 130px;">
                                {{ $slot }}
                    </main>
            </div>
        </div>
        
    </body>
</html>
