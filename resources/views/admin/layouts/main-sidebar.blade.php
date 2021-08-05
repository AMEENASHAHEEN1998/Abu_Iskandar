<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}" >
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ trans('admin/dashboard.dashboard') }}</span>
                            </div>

                        </a>

                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> {{ trans('admin/dashboard.site_name') }}</li>
                    <!-- menu item Elements-->

                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.category') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">

                            <li><a href="{{ route('admin.categories.index') }}">{{ trans('admin/dashboard.all_category') }}</a></li>


                            <li><a href="">{{ trans('admin/dashboard.dashboard') }}</a></li>


                            <li><a href="">{{ trans('admin/dashboard.dashboard') }}</a></li>


                        </ul>
                    </li>

                        <!-- menu title -->
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"></li>
                        <!-- menu item calendar-->
                        <li>

                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                                <div class="pull-left"><i class="ti-calendar"></i><span
                                        class="right-nav-text">{{ trans('admin/dashboard.dashboard') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>

                            <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="">{{ trans('admin/dashboard.dashboard') }} </a> </li>

                                    <li> <a href=""> {{ trans('admin/dashboard.dashboard') }}</a> </li>

                            </ul>


                        </li>

                        <!-- menu title -->
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> {{ trans('admin/dashboard.dashboard') }}</li>
                        <!-- menu item calendar-->
                        <li>

                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#join_reporters">
                                <div class="pull-left"><i class="fa fa-paper-plane-o" aria-hidden="true"></i><span
                                        class="right-nav-text">{{ trans('admin/dashboard.dashboard') }}</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>


                        </li>


                            <ul id="join_reporters" class="collapse" data-parent="#sidebarnav">
                                <li> <a href=""> {{ trans('admin/dashboard.dashboard') }}</a> </li>

                            </ul>


                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> {{ trans('admin/dashboard.dashboard') }}</li>


                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elementsuser">
                            <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.dashboard') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>


                        <ul id="elementsuser" class="collapse" data-parent="#sidebarnav">

                            <li><a  href="">{{ trans('admin.dashboard.dashboard') }}</a></li>


                            <li><a  href=""> {{ trans('admin/dashboard.dashboard') }}</a></li>


                        </ul>
                    </li>

                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#site">
                            <div class="pull-left"><i class="fa fa-globe" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.dashboard') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="site" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="">{{ trans('admin/dashboard.dashboard') }}</a></li>

                        </ul>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#logout">
                            <div class="pull-left"><i class=" ti-unlock"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.dashboard') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="logout" class="collapse" data-parent="#sidebarnav">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                     class="bx bx-log-out"></i>logout</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form></li>


                        </ul>
                    </li>



                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
