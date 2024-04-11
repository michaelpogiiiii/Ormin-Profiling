<!-- BEGIN: Side Menu -->
<nav class="side-nav">

    <ul>
        <x-app-layout></x-app-layout>
        <li>
            <a href="/home" class="side-menu side-menu">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                    <div class="side-menu__sub-icon transform rotate-180"></div>
                </div>
            </a>
        </li>
        <li>
            <a href="{{ url('adminprofile') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                <div class="side-menu__title"> Registered Profiles </div>
            </a>
        </li>
        <li>
            <a href="{{ url('adminprofile') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                <div class="side-menu__title"> Pending Registration </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                <div class="side-menu__title">
                    Events
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ url('all-past-event') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Past Events </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('all-upcoming-event') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Upcoming Events </div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="edit"></i> </div>
                <div class="side-menu__title">
                    Report
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ url('accomplishment-report') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file"></i> </div>
                        <div class="side-menu__title"> Accomplishment Report </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('monitoring-report') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file"></i> </div>
                        <div class="side-menu__title"> Monitoring Report </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ url('municipality-users') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                <div class="side-menu__title"> Users </div>
            </a>
        </li>

    </ul>
</nav>
<!-- END: Side Menu -->
