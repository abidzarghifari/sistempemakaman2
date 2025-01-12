 <nav x-data="{ open: false }" class="pb-5" id="navbar" style="position:fixed; top:65px; left:0;width:100%; z-index:20; transition: background-color 0.3s ease; background-color: transparent;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between pt-5">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('accountprofile')" :active="request()->routeIs('accountprofile')">
                        {{ __('Profil') }}
                    </x-nav-link>
                </div>

                
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('manajemenmakam')" :active="request()->routeIs('manajemenmakam')">
                        {{ __('Manajemen Makam') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('manajementamu')" :active="request()->routeIs('manajementamu')">
                        {{ __('Manajemen Tamu') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('manajemenkas')" :active="request()->routeIs('manajemenkas')">
                        {{ __('Manajemen Kas') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('manajemenpengurus')" :active="request()->routeIs('manajemenpengurus')">
                        {{ __('Manajemen Pengurus') }}
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
            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                {{ __('Profil') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('manajemenmakam')" :active="request()->routeIs('manajemenmakam')">
                {{ __('Manajemen Makam') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('manajementamu')" :active="request()->routeIs('manajementamu')">
                {{ __('Manajemen Tamu') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('manajemenkas')" :active="request()->routeIs('manajemenkas')">
                {{ __('Manajemen Kas') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('manajemenpengurus')" :active="request()->routeIs('manajemenpengurus')">
                {{ __('Manajemen Pengurus') }}
            </x-responsive-nav-link>
        </div>
        <!-- Responsive Settings Options 
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                 Authentication 
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div> -->
    </div>
</nav>

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
