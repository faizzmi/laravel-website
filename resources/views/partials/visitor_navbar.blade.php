<header class="shadow bg-white">
    <nav class="flex h-20 justify-between items-center w-[92%] mx-auto">
        <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
        <div>
            <h1 class="md:mx-auto font-bold text-xl">Faiz Azmi</h1>
        </div>
        <div class="nav-links md:static absolute bg-white md:min-h-fit min-h-[40vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="uppercase hover:text-gray-500" href="#">About</a>
                </li>
                <li>
                    <a class="uppercase hover:text-gray-500" href="#">Projects</a>
                </li>
                <li>
                    <a class="uppercase hover:text-gray-500" href="#">Awards</a>
                </li>
                <li>
                    <a class="uppercase hover:text-gray-500" href="#">Contact</a>
                </li>
            </ul>
        </div>
        <div>
            <button class="bg-[#5E452A] text-white px-5 py-2 rounded-full hover:bg-[#CAC6C0]">Resume</button>
            
        </div>
    </nav>

</header>

    <script>
        const navLinks = document.querySelector('.nav-links');
        let menuOpen = false;

        function onToggleMenu() {
            menuOpen = !menuOpen;
            if (menuOpen) {
                navLinks.classList.add('top-[11.8%]');
            } else {
                navLinks.classList.remove('top-[11.8%]');
            }
        }
    </script>