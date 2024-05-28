<header class="lg:sticky top-0 z-50 shadow-xl bg-white">
    <nav class="flex h-20 justify-between items-center w-[92%] mx-auto">
        <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
        <div>
            <h1 class="md:mx-auto font-bold text-xl">Faiz Azmi</h1>
        </div>
        <div class="nav-links absolute bg-white md:static md:min-h-fit md:z-100 md:w-auto min-h-[40vh] left-0 top-[-100%]  w-full flex items-center px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="uppercase hover:text-gray-500" href="/">About</a>
                </li>
                <li>
                    <a class="uppercase hover:text-gray-500" href="/projects"s>Projects</a>
                </li>
                <li>
                    <a class="uppercase hover:text-gray-500" href="/awards">Awards</a>
                </li>
                <li>
                    <a class="uppercase hover:text-gray-500" href="#">Contact</a>
                </li>
            </ul>
        </div>
        <div>
            <a href="/resume" target="_blank" class="bg-[#5E452A] text-white px-5 py-2 rounded-full hover:bg-[#CAC6C0]">Resume</a>
        </div>
    </nav>
</header>
{{-- <div class="bg-stone-300 text-center marquee position: fixed">
    <span class="marquee-content">
        I am fast
    </span>
</div> --}}

<script>
    const navLinks = document.querySelector('.nav-links');
    function onToggleMenu(e){
        e.name = e.name === 'menu' ? 'close' : 'menu';
        navLinks.classList.toggle('top-[11.8%]' );
    }
</script>

<style>
    @keyframes moveHorizontally {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    .marquee {
        white-space: nowrap;
        overflow: hidden;
        position: relative;
    }

    .marquee-content {
        display: inline-block;
        padding-left: 100%;
        animation: moveHorizontally 10ms linear infinite;
    }
</style>