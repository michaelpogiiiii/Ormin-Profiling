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
            <a href="{{url('puertoprofile')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                <div class="side-menu__title"> Registered Profiles </div>
            </a>
        </li>
        <li>
            <a  href="javascript:;"  class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user-minus"></i> </div>
                <div class="side-menu__title"> Pending Org. List </div>

                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ url('puerto_disapproved') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="thumbs-down"></i> </div>
                        <div class="side-menu__title"> Disapproved </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('puerto_waitlist') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="clock"></i> </div>
                        <div class="side-menu__title"> Waitlist </div>
                    </a>
                </li>
            </ul>
       
        </li>
        <li>
            <a  href="{{ url('puerto_approved') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="thumbs-up"></i> </div>
                <div class="side-menu__title"> Approved Org. List </div>
            </a>
            </li>
            <li>
            <a  href="{{ url('puerto_expired') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user-x"></i> </div>
                <div class="side-menu__title"> Expired Org. List </div>
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
                    <a href="{{url('puerto-past-event')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Past Events </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('puerto-incoming-event')}}" class="side-menu">
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
                    <a href="{{url('puerto-accomplishment-report')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file"></i> </div>
                        <div class="side-menu__title"> Accomplishment Report </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('puerto-monitoring-report')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file"></i> </div>
                        <div class="side-menu__title"> Monitoring Report </div>
                    </a>
                </li>
            </ul>
        </li>
        
    </ul>
</nav>
<!-- END: Side Menu -->