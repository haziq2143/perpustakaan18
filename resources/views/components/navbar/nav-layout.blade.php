<nav class="bg-primary">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-accent">Your School</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" id="burger"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border rounded-lg  md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0  ">
                @if (Auth::user()->role == 'admin')
                    <x-navbar.nav-link href="/admin">Home</x-navbar.nav-link>
                    <x-navbar.nav-link href="/loans">Loan</x-navbar.nav-link>
                    <x-navbar.nav-link href="/returns">Return</x-navbar.nav-link>
                @endif
                <x-navbar.nav-link href="/books">Books</x-navbar.nav-link>
                <x-navbar.nav-link href="/profile">Profile</x-navbar.nav-link>
                @auth
                    <x-navbar.nav-link href="/logout">Logout</x-navbar.nav-link>
                @endauth
            </ul>
        </div>
    </div>
</nav>
