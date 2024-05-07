<!-- BEGIN: Side Menu -->
<nav class="side-nav">

    <ul>
    <img class="w-52" style="margin-left: 70px" src="goyddbgfinalogo.png" alt="alternative">
        <h1 style="font-size: 30px;font-family: sans-serif; color: white;margin-left: 60px;margin-bottom: 30px; margin-top: 15px;font-weigth: bolder">GO-YDD</h1>
        
      
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
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Registered Profiles </div>
            </a>
        </li>
       
        </li>
        <li>
            <a  href="javascript:;"  class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user-minus"></i> </div>
                <div class="side-menu__title"> Pending Org. List </div>

                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ url('disapproved') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="thumbs-down"></i> </div>
                        <div class="side-menu__title"> Disapproved </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('waitlist') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="clock"></i> </div>
                        <div class="side-menu__title"> Waitlist </div>
                    </a>
                </li>
            </ul>
       
        </li>
        <li>
            <a  href="{{ url('approved') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="thumbs-up"></i> </div>
                <div class="side-menu__title"> Approved Org. List </div>
            </a>
            </li>
            <li>
            <a  href="{{ url('expired') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user-x"></i> </div>
                <div class="side-menu__title"> Expired Org. List </div>
            </a>
            </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
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
                        <div class="side-menu__icon"> <i data-lucide="folder"></i> </div>
                        <div class="side-menu__title"> Accomplishment Report </div>
                    </a>
                </li>
                <li>
                    <a href="{{ url('monitoring-report') }}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="folder"></i> </div>
                        <div class="side-menu__title"> Monitoring Report </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ url('municipality-users') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title"> Users </div>
            </a>
        </li>

    </ul>
</nav>
<!-- END: Side Menu -->
