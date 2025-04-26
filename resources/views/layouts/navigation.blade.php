<!-- resources/views/layouts/navigation.blade.php -->
<nav x-data="{ open: false }" 
     x-bind="navigation"
     class="bg-white border-b border-gray-100 shadow fixed top-0 left-0 right-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="#home" class="scroll-smooth">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="#about-me" x-bind:class="{'text-blue-600 border-blue-500': activeSection === 'about-me'}">
                        {{ __('About Me') }}
                    </x-nav-link>
                    <x-nav-link href="#about-company" x-bind:class="{'text-blue-600 border-blue-500': activeSection === 'about-company'}">
                        {{ __('About Company') }}
                    </x-nav-link>
                    <x-nav-link href="#company-detail" x-bind:class="{'text-blue-600 border-blue-500': activeSection === 'company-detail'}">
                        {{ __('Company Detail') }}
                    </x-nav-link>
                    <x-nav-link href="#portfolio" x-bind:class="{'text-blue-600 border-blue-500': activeSection === 'portfolio'}">
                        {{ __('Portfolio') }}
                    </x-nav-link>
                    <x-nav-link href="#contact" x-bind:class="{'text-blue-600 border-blue-500': activeSection === 'contact'}">
                        {{ __('Contact Me') }}
                    </x-nav-link>
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Admin') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
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
            <x-responsive-nav-link href="#about-me" @click="open = false" x-bind:class="{'text-blue-600 bg-blue-50 border-blue-500': activeSection === 'about-me'}">
                {{ __('About Me') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#about-company" @click="open = false" x-bind:class="{'text-blue-600 bg-blue-50 border-blue-500': activeSection === 'about-company'}">
                {{ __('About Company') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#company-detail" @click="open = false" x-bind:class="{'text-blue-600 bg-blue-50 border-blue-500': activeSection === 'company-detail'}">
                {{ __('Company Detail') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#portfolio" @click="open = false" x-bind:class="{'text-blue-600 bg-blue-50 border-blue-500': activeSection === 'portfolio'}">
                {{ __('Portfolio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#contact" @click="open = false" x-bind:class="{'text-blue-600 bg-blue-50 border-blue-500': activeSection === 'contact'}">
                {{ __('Contact Me') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Admin') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>