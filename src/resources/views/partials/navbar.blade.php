<nav
    class="flex items-center justify-between px-6 md:px-16 lg:px-24 xl:px-32 py-4 border-b border-gray-300 bg-white relative transition-all sticky  top-0">
    <a href="https://prebuiltui.com">
        <img class="h-9"
            src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/dummyLogo/dummyLogoColored.svg"
            alt="dummyLogoColored">
    </a>

    <button aria-label="Menu" id="menu-toggle" class="sm:hidden">
        <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="21" height="1.5" rx=".75" fill="#426287" />
            <rect x="8" y="6" width="13" height="1.5" rx=".75" fill="#426287" />
            <rect x="6" y="13" width="15" height="1.5" rx=".75" fill="#426287" />
        </svg>
    </button>

    <div id="mobile-menu"
        class="hidden absolute top-[60px] left-0 w-full bg-white shadow-md py-4 flex-col items-start gap-2 px-5 text-sm md:hidden">
        <a href="#" class="block">Home</a>
        <a href="#" class="block">About</a>
        <a href="#" class="block">Contact</a>
        <div id="mobile-guest-actions" class="mt-2 flex flex-col items-start gap-2">
            <a href="{{ route('login') }}"
                class="cursor-pointer px-6 py-2 border border-indigo-500 text-indigo-500 rounded-full hover:bg-indigo-50">
                Login
            </a>
            <a href="{{ route('register') }}"
                class="cursor-pointer px-6 py-2 bg-indigo-500 hover:bg-indigo-600 transition text-white rounded-full text-sm">
                Register
            </a>
        </div>

        <div id="mobile-auth-actions" class="hidden mt-3 w-full space-y-3 rounded-lg border border-gray-200 p-3">
            <div class="flex items-center gap-3">
                <div
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-500 text-sm font-semibold text-white">
                    <span id="mobile-account-initial">A</span>
                </div>
                <div>
                    <p id="mobile-account-name" class="font-semibold text-gray-800">Account</p>
                    <p id="mobile-account-email" class="text-xs text-gray-500"></p>
                </div>
            </div>

            <button id="mobile-logout-button" type="button"
                class="w-full rounded-full border border-red-200 px-4 py-2 text-left text-red-500 hover:bg-red-50">
                Logout
            </button>
        </div>
    </div>

    <div class="hidden sm:flex items-center gap-8">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>

        <div class="hidden lg:flex items-center text-sm gap-2 border border-gray-300 px-3 rounded-full">
            <input class="py-1.5 w-full bg-transparent outline-none placeholder-gray-500" type="text"
                placeholder="Search products" />
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.836 10.615 15 14.695" stroke="#7A7B7D" stroke-width="1.2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path clip-rule="evenodd"
                    d="M9.141 11.738c2.729-1.136 4.001-4.224 2.841-6.898S7.67.921 4.942 2.057C2.211 3.193.94 6.281 2.1 8.955s4.312 3.92 7.041 2.783"
                    stroke="#7A7B7D" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>

        <div class="relative cursor-pointer">
            <svg width="18" height="18" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M.583.583h2.333l1.564 7.81a1.17 1.17 0 0 0 1.166.94h5.67a1.17 1.17 0 0 0 1.167-.94l.933-4.893H3.5m2.333 8.75a.583.583 0 1 1-1.167 0 .583.583 0 0 1 1.167 0m6.417 0a.583.583 0 1 1-1.167 0 .583.583 0 0 1 1.167 0"
                    stroke="#615fff" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <button
                class="absolute -top-2 -right-3 text-xs text-white bg-indigo-500 w-[18px] h-[18px] rounded-full">3</button>
        </div>

        <div id="desktop-guest-actions" class="flex items-center gap-3">
                <a href="{{ route('login') }}"
                    class="px-6 py-2 border border-indigo-500 text-indigo-500 rounded-full hover:bg-indigo-50">
                    Login
                </a>

                <a href="{{ route('register') }}"
                    class="px-6 py-2 bg-indigo-500 text-white rounded-full hover:bg-indigo-600">
                    Register
                </a>
        </div>

        <div id="desktop-auth-actions" class="relative hidden">
            <div class="group">
                <button
                    type="button"
                    aria-label="Account"
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-500 text-white hover:bg-indigo-600">
                    <span id="desktop-account-initial" class="text-sm font-semibold uppercase">A</span>
                </button>

                <div
                    class="absolute right-0 mt-2 hidden w-56 rounded-lg border bg-white shadow-lg group-hover:block">
                    <div class="border-b px-4 py-3">
                        <p id="desktop-account-name" class="font-semibold text-gray-800">Account</p>
                        <p id="desktop-account-email" class="text-xs text-gray-500"></p>
                    </div>

                    <button id="desktop-logout-button" type="button"
                        class="w-full px-4 py-2 text-left text-red-500 hover:bg-red-50">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        const menu = document.getElementById("mobile-menu");
        if (menu.classList.contains("hidden")) {
            menu.classList.remove("hidden");
            menu.classList.add("flex");
        } else {
            menu.classList.add("hidden");
        }
    });
</script>
