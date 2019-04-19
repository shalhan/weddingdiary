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
            <!-- Menu Dashboard -->
            <li class="pointer {{Route::getCurrentRoute()->uri == 'dashboard' ? 'active' : ''}}">
                <a href="{{route('showDashboard')}}">
                    <i class="fa fa-home fa-fw"></i><span class="title">Dashboard</span>
                </a>
            </li><!--end /menu-item -->
            <!-- Menu Add Wedding -->
            <li class="pointer {{Route::getCurrentRoute()->uri == 'weddings' ? 'active' : ''}}">
                <a href="{{route('showWedding')}}" >
                    <i class="fa fa-laptop"></i><span class="title">Weddings</span>
                </a>
            </li><!--end /menu-item -->
            
        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

    </div>
</div><!--end #sidebar-->
<!-- END SIDEBAR -->