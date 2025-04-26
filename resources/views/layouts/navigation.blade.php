<!-- resources/views/layouts/navigation.blade.php -->
<nav x-data="{ open: false, activeSection: 'home' }" 
     x-init="
        checkSectionInView = function() {
            const sections = document.querySelectorAll('section[id]');
            const scrollPosition = window.scrollY;
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.offsetHeight;
                
                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    activeSection = section.id;
                }
            });
        };
        
        window.addEventListener('scroll', checkSectionInView);
        checkSectionInView();
        
        window.addEventListener('section-in-view', (e) => {
            activeSection = e.detail.id;
        });
     "
     class="bg-white border-b border-gray-100 shadow fixed top-0 left-0 right-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="#home" class="scroll-smooth" @click.prevent="document.getElementById('home').scrollIntoView({behavior: 'smooth'})">
                        <svg viewBox="0 0 50 50" width="30" height="30" class="fill-current text-blue-600">
                            <rect width="50" height="50" fill="currentColor" rx="10" />
                            <text x="25" y="33" font-size="24" font-weight="bold" text-anchor="middle" fill="white" font-family="Arial, sans-serif">GM</text>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="#about-me" 
                       @click.prevent="document.getElementById('about-me').scrollIntoView({behavior: 'smooth'})"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out"
                       :class="activeSection === 'about-me' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                        About Me
                    </a>
                    <a href="#about-company" 
                       @click.prevent="document.getElementById('about-company').scrollIntoView({behavior: 'smooth'})"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out"
                       :class="activeSection === 'about-company' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                        About Company
                    </a>
                    <a href="#company-detail" 
                       @click.prevent="document.getElementById('company-detail').scrollIntoView({behavior: 'smooth'})"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out"
                       :class="activeSection === 'company-detail' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                        Company Detail
                    </a>
                    <a href="#portfolio" 
                       @click.prevent="document.getElementById('portfolio').scrollIntoView({behavior: 'smooth'})"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out"
                       :class="activeSection === 'portfolio' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                        Portfolio
                    </a>
                    <a href="#contact" 
                       @click.prevent="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})"
                       class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 transition duration-150 ease-in-out"
                       :class="activeSection === 'contact' ? 'border-blue-500 text-gray-900' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                        Contact Me
                    </a>
                    
                    @guest
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 transition duration-150 ease-in-out">
                            Admin
                        </a>
                    @else
                        <a href="{{ route('admin.dashboard') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 transition duration-150 ease-in-out">
                            Dashboard
                        </a>
                    @endguest
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="#about-me" 
               @click="open = false; document.getElementById('about-me').scrollIntoView({behavior: 'smooth'})"
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out"
               :class="activeSection === 'about-me' ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300'">
                About Me
            </a>
            <a href="#about-company" 
               @click="open = false; document.getElementById('about-company').scrollIntoView({behavior: 'smooth'})"
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out"
               :class="activeSection === 'about-company' ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300'">
                About Company
            </a>
            <a href="#company-detail" 
               @click="open = false; document.getElementById('company-detail').scrollIntoView({behavior: 'smooth'})"
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out"
               :class="activeSection === 'company-detail' ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300'">
                Company Detail
            </a>
            <a href="#portfolio" 
               @click="open = false; document.getElementById('portfolio').scrollIntoView({behavior: 'smooth'})"
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out"
               :class="activeSection === 'portfolio' ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300'">
                Portfolio
            </a>
            <a href="#contact" 
               @click="open = false; document.getElementById('contact').scrollIntoView({behavior: 'smooth'})"
               class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium transition duration-150 ease-in-out"
               :class="activeSection === 'contact' ? 'border-blue-500 text-blue-700 bg-blue-50' : 'border-transparent text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300'">
                Contact Me
            </a>
            
            @guest
                <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                    Admin
                </a>
            @else
                <a href="{{ route('admin.dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 transition duration-150 ease-in-out">
                    Dashboard
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full text-left pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-red-600 hover:text-red-800 hover:bg-red-50 hover:border-red-300 transition duration-150 ease-in-out">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>