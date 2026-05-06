<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Landing Page')</title>

    @vite('resources/css/app.css')

    <script defer src="https://unpkg.com/alpinejs"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav x-data="{open:false}" class="fixed w-full z-50 bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <h1 class="font-bold text-xl">LOGO</h1>

        <!-- desktop -->
        <div class="hidden md:flex gap-6">
            <a href="#home" class="hover:text-blue-500">Home</a>
            <a href="#about" class="hover:text-blue-500">About</a>
            <a href="#clients" class="hover:text-blue-500">Clients</a>
            <a href="#contact" class="hover:text-blue-500">Contact</a>
        </div>

        <!-- hamburger -->
        <button @click="open = !open" class="md:hidden">
            ☰
        </button>
    </div>

    <!-- mobile menu -->
    <div x-show="open" x-transition class="md:hidden px-4 pb-4">
        <a href="#home" class="block py-2">Home</a>
        <a href="#about" class="block py-2">About</a>
        <a href="#clients" class="block py-2">Clients</a>
        <a href="#contact" class="block py-2">Contact</a>
    </div>
</nav>


<!-- HERO / HEADER SLIDER -->
<section id="home" class="h-screen relative overflow-hidden">
    <div x-data="slider()" x-init="start()" class="h-full">

        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="active === index"
                 x-transition:enter="transition ease-out duration-700"
                 x-transition:leave="transition ease-in duration-500"
                 class="absolute inset-0 bg-cover bg-center flex items-center justify-center text-white"
                 :style="'background-image: url(' + slide + ')'">

                <div class="bg-black/50 p-6 rounded-xl text-center">
                    <h1 class="text-4xl font-bold mb-2">Landing Page</h1>
                    <p>Hero slider full screen</p>
                </div>
            </div>
        </template>

    </div>
</section>


<!-- CONTENT -->
<main>
    @yield('content')
</main>


<!-- CLIENT LOGO -->
<section id="clients" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto text-center">
        <h2 class="text-2xl font-bold mb-10">Our Clients</h2>

        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 items-center">
            @for($i=0;$i<5;$i++)
                <div class="p-4 grayscale hover:grayscale-0 transition">
                    <img src="https://via.placeholder.com/150" class="mx-auto">
                </div>
            @endfor
        </div>
    </div>
</section>


<!-- BACK TO TOP -->
<button x-data @click="window.scrollTo({top:0, behavior:'smooth'})"
    class="fixed bottom-5 right-5 bg-blue-500 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600">
    ↑
</button>


<!-- FOOTER -->
<footer class="py-6 text-center text-sm text-gray-500">
    © {{ date('Y') }} Your App
</footer>


<script>
function slider(){
    return {
        active: 0,
        slides: [
            'https://source.unsplash.com/1600x900/?technology',
            'https://source.unsplash.com/1600x900/?code',
            'https://source.unsplash.com/1600x900/?server'
        ],
        start(){
            setInterval(()=>{
                this.active = (this.active + 1) % this.slides.length
            }, 4000)
        }
    }
}
</script>

</body>
</html>