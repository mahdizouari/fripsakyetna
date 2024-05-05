<nav x-data="{ open: false }" class="">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
        <div class="profile-box ml-15">
        <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="profile-info">
                <div class="info">
                    <div class="image">
                    @if(Auth::user()->profile_photo_path)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" />
                    @else
                        @if(in_array(Auth::user()->name, ['yessin', 'Yessin', 'yassin', 'Yassin']))
                            <img src="yessin.png" alt="{{ Auth::user()->name }}" />
                        @elseif(in_array(Auth::user()->name, ['Akram', 'akram']))
                            <img src="akram.png" alt="{{ Auth::user()->name }}" />
                        @else
                            <img src="assets/images/profile/profile-image.png" alt="{{ Auth::user()->name }}" />
                        @endif
                    @endif



                    </div>
                    <div>
                        <h6 class="fw-500">{{ Auth::user()->name }}</h6>
                        <p>Admin</p>
                    </div>
                </div>
            </div>
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
            <li>
                <div class="author-info flex items-center !p-1">
                    <div class="image">
                        @if(Auth::user()->profile_photo_path)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="{{ Auth::user()->name }}" />
                        @else
                            @if(in_array(Auth::user()->name, ['yessin','Yessin','yassin','Yassin']))
                                <img src="yessin.png" alt="{{ Auth::user()->name }}" />
                            @elseif(in_array(Auth::user()->name, ['Akram','akram']))
                                <img src="akram.png" alt="{{ Auth::user()->name }}" />
                            @else
                                <img src="assets/images/profile/profile-image.png" alt="{{ Auth::user()->name }}" />
                            @endif
                        @endif

                    </div>
                    <div class="content">
                        <h4 class="text-sm">{{ Auth::user()->name }}</h4>
                        <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs" href="#">{{ Auth::user()->email }}</a>
                    </div>
                </div>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ url('profile') }}">
                    <i class="lni lni-user"></i> View Profile
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ url('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="lni lni-exit"></i> Sign Out
                    </a>
                </form>
            </li>
        </ul>
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
