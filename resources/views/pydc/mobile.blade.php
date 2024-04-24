<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone - HTML Admin Template" class="w-6" src="admin/dist/images/logo.svg">
        </a>
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="bar-chart-2"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    <div class="scrollable">
        <a href="javascript:;" class="mobile-menu-toggler"> <i data-lucide="x-circle"
                class="w-8 h-8 text-white transform -rotate-90"></i> </a>
               
        <ul class="scrollable__content py-2">
        <img class="w-51" style="margin-left: 70px" src="goyddbgfinalogo.png" alt="alternative">
        <h1 style="font-size: 30px;font-style: DM-sans; color: white;margin-left: 70px;margin-bottom: 30px;font-weigth: bolder">GO_YDD</h1>
            <li>
                <a href="/home" class="menu menu--active">
                    <div class="menu__icon"> <i data-lucide="home"></i> </div>
                    <div class="menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="{{ url('adminprofile') }}" class="menu">
                    <div class="menu__icon"> <i data-lucide="user"></i> </div>
                    <div class="menu__title"> Registered Profiles </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                    <div class="menu__title"> Events <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{ url('all-past-event') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Past Events </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('all-upcoming-event') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                            <div class="menu__title"> Upcoming Events </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                    <div class="menu__title"> Report <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="{{ url('accomplishment-report') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="file"></i> </div>
                            <div class="menu__title"> Accomplishment Report </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('monitoring-report') }}" class="menu">
                            <div class="menu__icon"> <i data-lucide="file"></i> </div>
                            <div class="menu__title"> Monitoring Report </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('municipality-users') }}" class="menu">
                    <div class="menu__icon"> <i data-lucide="user"></i> </div>
                    <div class="menu__title"> Users </div>
                </a>
            </li>
        </ul>

            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400; ">
                {{ __('Manage Account') }}
            </div>
            


            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                    {{ __('API Tokens') }}
                </x-dropdown-link>
            @endif

            <div class="border-t border-gray-200" ></div>

            <!-- Authentication -->

                      
        <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" 
        href="https://pydcprofiling.online/user/profile"> Profile </a>
      
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                    class="btn btn-light text-dark mt-2 text-center">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </>
    </div>
</div>
<!-- END: Mobile Menu -->
