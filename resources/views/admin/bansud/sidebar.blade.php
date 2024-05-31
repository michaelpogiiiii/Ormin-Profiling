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
            <a href="{{url('bansudprofile')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                <div class="side-menu__title"> Registered Profiles </div>
            </a>
        </li>
       
        <li>
            <a  href="{{ url('bansud_approved') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="plus"></i> </div>
                <div class="side-menu__title"> Add Organization</div>
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
                    <a href="{{url('bansud-past-event')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Past Events </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('bansud-todays-event')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Current Events </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('bansud-incoming-event')}}" class="side-menu">
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
                    <a href="{{url('bansud-accomplishment-report')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file"></i> </div>
                        <div class="side-menu__title"> Accomplishment Report </div>
                    </a>
                </li>
                <li>
                    <a href="{{url('bansud-monitoring-report')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="file"></i> </div>
                        <div class="side-menu__title"> Monitoring Report </div>
                    </a>
                </li>
            </ul>
        </li>
        
    </ul>
</nav>
<!-- END: Side Menu -->