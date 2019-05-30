<!-- BEGIN SIDEBAR-->
<div id="sidebar">
    <div class="sidebar-back"></div>
    <div class="sidebar-content">
        <div class="nav-brand">
            <a class="main-brand" href="../../html/dashboards/dashboard.html">
                <h3 class="text-light text-white"><span>Wedding<strong>Diary</strong> </span></h3>
            </a>
        </div>

        <!-- BEGIN MAIN MENU -->
        <ul class="main-menu">
            <!-- Menu Add Wedding -->
            <li class="pointer {{Route::getCurrentRoute()->uri == 'couples' ? 'active' : ''}}">
                <a href="{{route('showCouples')}}" >
                    <i class="fa fa-home fa-lg"></i><span class="title">Couples</span>
                </a>
            </li><!--end /menu-item -->
            
        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

    </div>
</div><!--end #sidebar-->
<!-- END SIDEBAR -->