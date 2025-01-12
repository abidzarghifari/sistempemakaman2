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
                @include('layouts.head2')
                <nav x-data="{ open: false }" class="pb-5" id="navbar" style="position:fixed; top:65px; left:0;width:100%; z-index:990; transition: background-color 0.3s ease; background-color: transparent;">
                    <!-- Primary Navigation Menu -->
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between pt-5">
                            <div class="flex">
                                <!-- Navigation Links -->
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link :href="route('pencatatantamu')" :active="request()->routeIs('pencatatantamu')">
                                        {{ __('Pencatatan Tamu') }}
                                    </x-nav-link>
                                </div>
                                @if (Route::has('login'))
                                        @auth
                                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                                <x-nav-link :href="route('accountprofile')" :active="request()->routeIs('accountprofile')">
                                                    {{ __('Masuk Pengurus') }}
                                                </x-nav-link>
                                            </div>
                                        @else
                                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                                                    {{ __('Masuk Pengurus') }}
                                                </x-nav-link>
                                            </div>      
                                        @endauth
                                @endif
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    <x-nav-link>                                 
                                        {{ __('Contact Us') }}
                                    </x-nav-link>
                                </div>
                            </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          

                            <!-- Hamburger -->
                            <div class="-me-2 flex items-center sm:hidden">
                                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Responsive Navigation Menu -->
                    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                        <div class="pt-2 pb-3 space-y-1">
                            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                                {{ __('About') }}
                            </x-responsive-nav-link>
                        </div>
                        <div class="pt-2 pb-3 space-y-1">
                            <x-responsive-nav-link>
                                {{ __('Contact Us') }}
                            </x-responsive-nav-link>
                        </div>
                    </div>
                </nav>
                <audio autoplay loop>
                    <source src="{{ asset('audio/gugur-bunga-orchestra-instrumental-by-at-l-instrumentalia_SWeaa49Y.mp3') }}" type="audio/mp3">
                </audio>
                <main class="" style="margin-top: 130px;">
                        <div class="h-14"></div>
                        <div class="h-full flex flex-col sm:justify-center items-center  sm:pt-0">
                            <div class="w-full sm:max-w-6xl px-6 py-8 text-white shadow-black shadow-2xl bg-black/10 overflow-hidden sm:rounded-lg" style="backdrop-filter:blur(5px);">
                                <h1 class="text-2xl"><strong>Penghormatan</strong></h1>
                                <br>
                                <div class="tracking-wide normal-case text-pretty indent-14 text-lg">
                                    <p>Kami berdiri di bawah bayang-bayang keberanian dan pengorbanan para pahlawan yang telah memberikan segalanya demi kemerdekaan, keadilan, dan perdamaian. Mereka adalah sosok-sosok mulia yang tak gentar menghadapi segala rintangan, mengorbankan nyawa demi tegaknya nilai-nilai yang kita junjung tinggi hari ini. Pengorbanan mereka menjadi pelita yang menerangi jalan bangsa ini, dan jasa mereka akan selalu hidup di hati setiap generasi. Dengan penuh rasa hormat, kami mengenang perjuangan mereka, dan berjanji untuk menjaga apa yang telah mereka wariskan kepada kita.</p>
                                    <p>Kini, kita berdiri tegak di atas pondasi yang mereka bangun dengan penuh pengorbanan. Tanpa keberanian mereka untuk melawan penindasan, tanpa ketulusan mereka untuk memberikan segalanya, kita tidak akan menikmati kemerdekaan dan kedamaian seperti hari ini. Perjuangan mereka bukan hanya untuk masa lalu, tetapi juga untuk masa depan yang lebih baik bagi generasi selanjutnya.</p>
                                    <p>Sebagai pewaris perjuangan mereka, tugas kita adalah menjaga dan menghormati warisan tersebut dengan terus berkontribusi demi kemajuan bangsa. Dengan rasa hormat yang mendalam, mari kita jadikan semangat para pahlawan sebagai inspirasi dalam kehidupan kita. Mereka tidak pernah pergi, karena nama dan jasa mereka akan terus hidup dalam hati dan ingatan kita sepanjang masa.</p>
                                </div>        
                            </div>
                        </div>                    
                </main>
            </div>
        </div>
        
    </body>
</html>

<script>
    document.addEventListener("scroll", function () {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
            navbar.style.backgroundColor = "rgba(0, 0, 0, 0.9)"; // Navbar changes color when scrolled
        } else {
            navbar.style.backgroundColor = "transparent"; // Navbar becomes transparent
        }
    });
</script>
<script>
            document.querySelector('audio').volume = 0.25; // Volume 50%
</script>