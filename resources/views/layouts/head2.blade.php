<nav x-data="{ open: false }" class="" id="head" style="position:fixed; top:0; left:0;width:100%; z-index:25; transition: background-color 0.3s ease; background-color: transparent;">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6  lg:px-8 border-b border-red-500">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('accountprofile') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                </div>
            </div>            
        </div>
    </div>
</nav>

<script>
    document.addEventListener("scroll", function () {
        const navbar = document.getElementById("head");
        if (window.scrollY > 50) {
            navbar.style.backgroundColor = "rgba(0, 0, 0, 0.9)"; // Navbar changes color when scrolled
        } else {
            navbar.style.backgroundColor = "transparent"; // Navbar becomes transparent
        }
    });
</script>
