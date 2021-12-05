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
                        <li><a href="{{ route('superAdmin.profile') }}"> Profile</a></li>
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
                    <a href="{{ route('superAdmin.dashboard') }}" class="waves-effect"><i class="ti-home"></i><span> Dashboard </span></a>
                </li>             

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/slider/*') ? 'active subdrop': ''}}"><i class="fa fa-sliders"></i> <span> Slider </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('superAdmin.slider.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/slider/index') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> All Slider </span></a></li>
                        <li><a href="{{route('superAdmin.slider.create')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/slider/create') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Create New Slider </span></a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/payment/*') ? 'active subdrop': ''}}"><i class="fa fa-credit-card"></i> <span> Payment Method </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('superAdmin.payment.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/payment/index') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> All Payment Method </span></a></li>
                        <li><a href="{{route('superAdmin.payment.create')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/payment/create') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Create New Method </span></a></li>
                    </ul>
                </li>
                {{-- routes for users manage  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/*') ? 'active subdrop': ''}}"><i class="fa fa-users"></i> <span> Manage User's </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('superAdmin.manageUser.administrator')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/administrator') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Administrator </span></a></li>
                        <li><a href="{{route('superAdmin.manageUser.volunteer')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/volunteer') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Volunteer </span></a></li>
                        <li><a href="{{route('superAdmin.manageUser.receptionist')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/receptionist') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Receptionist </span></a></li>
                        <li><a href="{{route('superAdmin.manageUser.pathologist')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/pathologist') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Pathologist </span></a></li>
                        <li><a href="{{route('superAdmin.manageUser.user')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-user/user') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> User </span></a></li>
                    </ul>
                </li>
                {{-- routes for centers manage  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-center/*') ? 'active subdrop': ''}}"><i class="fa fa-briefcase"></i> <span> Manage Center's </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('superAdmin.manageCenter.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-center/index') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Center List </span></a></li>
                    </ul>
                </li>
                {{-- routes for price manage  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-price/*') ? 'active subdrop': ''}}"><i class="fa fa-money"></i> <span> Manage Prices </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('superAdmin.managePrice.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/manage-price/index') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Price List </span></a></li>
                    </ul>
                </li>
                {{-- routes for pcr test  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/pcr/*') ? 'active subdrop': ''}}"><i class="fa fa-thermometer"></i> <span> PCR Test </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('superAdmin.pcr.normal.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/pcr/normal') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Registered </span></a></li>
                        <li><a href="{{route('superAdmin.pcr.premium.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/pcr/premium') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Premium </span></a></li>
                    </ul>
                </li>
                {{-- routes for vaccination  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/vaccination/*') ? 'active subdrop': ''}}"><i class="fa fa-thermometer"></i> <span> Vaccination </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('superAdmin.vaccination.normal.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/vaccination/normal') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Registered </span></a></li>
                        <li><a href="{{route('superAdmin.vaccination.premium.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/vaccination/premium') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Premium </span></a></li>
                    </ul>
                </li>
                {{-- routes for booster  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/booster/*') ? 'active subdrop': ''}}"><i class="fa fa-thermometer"></i> <span> Booster </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('superAdmin.booster.normal.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/booster/normal') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Registered </span></a></li>
                        <li><a href="{{route('superAdmin.booster.premium.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/booster/premium') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Premium </span></a></li>
                    </ul>
                </li>

                {{-- routes for setting manage  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/*') ? 'active subdrop': ''}}"><i class="fa fa-gears"></i> <span> Setting's </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
            
                    <ul class="list-unstyled">
                        {{-- routes for Landing-page manage  --}}
                        <li><a href="{{route('superAdmin.setting.space.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/space') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Space </span></a></li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/*') ? 'active': ''}}"><i class="fa fa-globe"></i> <span> Landing Page </span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{route('superAdmin.setting.landingPage.banner')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/banner') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Banner </span></a></li>
                                <li><a href="{{route('superAdmin.setting.landingPage.download')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/download') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Download </span></a></li>
                                <li><a href="{{route('superAdmin.setting.landingPage.service.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/service') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Service </span></a></li>
                                <li><a href="{{route('superAdmin.setting.landingPage.work.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/work') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> We Work </span></a></li>
                                <li><a href="{{route('superAdmin.setting.landingPage.testimonial')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/testimonial') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Testimonial </span></a></li>
                                <li><a href="{{route('superAdmin.setting.landingPage.footer')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/footer') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Footer </span></a></li>

                                <li>
                                    <a href="{{route('superAdmin.setting.landingPage.subscriber.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/setting/landing-page/subscriber') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Subscriber </span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- routes for Synchronize  --}}
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/slider/*') ? 'active subdrop': ''}}"><i class="fa fa-sliders"></i> <span> Synchronize Rule</span> <span class="pull-right"><i class="mdi mdi-plus"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('superAdmin.synchronize.index')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/synchronize/index') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> All Synchronize Rule </span></a></li>
                        <li><a href="{{route('superAdmin.synchronize.create')}}" class="waves-effect {{\Illuminate\Support\Facades\Request::is('super-admin/synchronize/create') ? 'active': ''}}"><i class="fa fa-arrow-circle-right"></i><span> Create Rule </span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
