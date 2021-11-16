<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="text-center">
                <img src="{{ asset(Auth::user()->image ?? get_static_option('user')) }}" alt="" class="img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name ?? '' }}</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('bdGovt.profile') }}"> Profile</a></li>
                        <li class="divider"></li>
                        <li><a class="logout-btn" href="javascript:void(0)"> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0"><i class="fa fa-dot-circle-o text-success"></i> Online</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ route('bdGovt.dashboard') }}" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>
                {{-- routes for users manage  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/*') ? 'active subdrop': ''}}"><i class="fa fa-users"></i> <span> Manage User's </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('bdGovt.manageUser.administrator')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/administrator') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Administrator </span></a></li>
                        <li><a href="{{route('bdGovt.manageUser.volunteer')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/volunteer') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Volunteer </span></a></li>
                        <li><a href="{{route('bdGovt.manageUser.receptionist')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/receptionist') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Receptionist </span></a></li>
                        <li><a href="{{route('bdGovt.manageUser.pathologist')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/pathologist') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Pathologist </span></a></li>
                        <li><a href="{{route('bdGovt.manageUser.user')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/user') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> User </span></a></li>
                    </ul>
                </li>
                {{-- routes for centers manage  --}}
                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-center/*') ? 'active subdrop': ''}}"><i class="fa fa-briefcase"></i> <span> Manage Center's </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('bdGovt.manageCenter.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-center/index') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Center List </span></a></li>
                    </ul>
                </li>
                {{-- routes for pcr test  --}}
                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/pcr/*') ? 'active subdrop': ''}}"><i class="fa fa-thermometer"></i> <span> PCR Test </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('bdGovt.pcr.normal.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/pcr/normal') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Registered </span></a></li>
                        <li><a href="{{route('bdGovt.pcr.premium.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/pcr/premium') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Premium </span></a></li>
                    </ul>
                </li>
                {{-- routes for vaccination  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/vaccination/*') ? 'active subdrop': ''}}"><i class="fa fa-thermometer"></i> <span> Vaccination </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('bdGovt.vaccination.normal.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/vaccination/normal') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Registered </span></a></li>
                        <li><a href="{{route('bdGovt.vaccination.premium.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/vaccination/premium') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Premium </span></a></li>
                    </ul>
                </li>
                 {{-- routes for booster  --}}
                 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/booster/*') ? 'active subdrop': ''}}"><i class="fa fa-thermometer"></i> <span> Booster </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('bdGovt.booster.normal.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/booster/normal') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Registered </span></a></li>
                        <li><a href="{{route('bdGovt.booster.premium.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/booster/premium') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Premium </span></a></li>
                    </ul>
                </li>

                {{-- routes for setting manage  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/*') ? 'active': ''}}"><i class="fa fa-gears"></i> <span> Setting's </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">                      
                        {{-- routes for Landing-page manage  --}}
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/*') ? 'active': ''}}"><i class="fa fa-globe"></i> <span> Landing Page </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{route('bdGovt.setting.landingPage.subscriber.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/subscriber') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Subscriber </span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
