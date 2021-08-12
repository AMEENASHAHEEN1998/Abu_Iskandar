<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.dashboard') }}</span>
                            </div>

                        </a>

                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        {{ trans('admin/dashboard.site_name') }}</li>
                    <!-- menu item Elements-->

                    <li>

                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fa fa-diamond" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.category') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">

                            <li><a
                                    href="{{ route('admin.categories.index') }}">{{ trans('admin/dashboard.primary_category') }}</a>
                            </li>


                            <li><a
                                    href="{{ route('admin.subcategories.index') }}">{{ trans('admin/dashboard.sub_category') }}</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="fa fa-cubes" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.product') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('admin.products.create') }}">{{ trans('admin/dashboard.add_product') }} </a> </li>

                            <li> <a href="{{ route('admin.products.index') }}"> {{ trans('admin/dashboard.show_products') }}</a> </li>

                        </ul>


                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#join_reporters">
                            <div class="pull-left"><i class="fa fa-paper-plane-o" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.orders') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>





                        <ul id="join_reporters" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('admin.driverrequest.index') }}">
                                    {{ trans('admin/dashboard.all_order') }}</a> </li>
                            <li> <a href="{{ route('admin.driverrequest.create') }}">
                                    {{ trans('admin/dashboard.add_order') }}</a> </li>
                            <li> <a href="{{ route('admin.orderwait') }}">
                                    {{ trans('admin/dashboard.pending_orders') }}</a> </li>
                            <li> <a href="{{ route('admin.orderdeliver') }}">
                                    {{ trans('admin/dashboard.orders_delivered') }}</a> </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elementsuser">
                            <div class="pull-left"><i class="fa fa-gift" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.offers') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>


                        <ul id="elementsuser" class="collapse" data-parent="#sidebarnav">

                            <li><a
                                    href="{{ route('admin.offer.index') }}">{{ trans('admin/dashboard.all_offer') }}</a>
                            </li>
                            <li><a
                                    href="{{ route('admin.offer.create') }}">{{ trans('admin/dashboard.add_offer') }}</a>
                            </li>
                            <li><a href="{{ route('admin.activeoffer') }}">
                                    {{ trans('admin/dashboard.show_offers') }}</a></li>
                            <li><a href="{{ route('admin.noactiveoffer') }}">
                                    {{ trans('admin/dashboard.old_offers') }}</a></li>


                        </ul>
                    </li>



                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#site">
                            <div class="pull-left"><i class="fa fa-file-text-o" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.articles') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="site" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('admin.article.create')}}">{{ trans('admin/dashboard.add_articles') }}</a></li>
                            <li><a href="{{route('admin.article.index')}}">{{ trans('admin/dashboard.show_articles') }}</a></li>

                        </ul>
                    </li>





                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#jobs">
                            <div class="pull-left"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.jobs') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="jobs" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">{{ trans('admin/dashboard.add_job') }}</a></li>
                            <li><a href="">{{ trans('admin/dashboard.show_job') }}</a></li>
                            <li><a href="">{{ trans('admin/dashboard.old_job') }}</a></li>

                        </ul>
                    </li>





                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#request_job">
                            <div class="pull-left"><i class="fa fa-paper-plane-o" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.request_job') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="request_job" class="collapse" data-parent="#sidebarnav">
                            <li><a href="">{{ trans('admin/dashboard.show_request_job') }}</a></li>
                            <li><a href="">{{ trans('admin/dashboard.accepted_request') }}</a></li>
                            <li><a href="">{{ trans('admin/dashboard.rejected_request') }}</a></li>

                        </ul>
                    </li>






                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#staff">
                            <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.staff') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="staff" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{route('admin.employee.index')}}">{{ trans('admin/dashboard.show_members') }}</a></li>
                            <li><a  href="{{route('admin.employee.create')}}">{{ trans('admin/dashboard.add_member') }}</a></li>

                        </ul>
                    </li>



                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#distributors">
                            <div class="pull-left"><i class="fa fa-users" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.distributors') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="distributors" class="collapse" data-parent="#sidebarnav">
                            <li><a  href="{{route('admin.distributor.index')}}">{{ trans('admin/dashboard.distributors') }}</a></li>
                            <li><a  href="{{route('admin.distributor.create')}}">{{ trans('admin/dashboard.add_distributors') }}</a></li>

                            <li><a  href="{{route('admin.distributortype.index')}}">{{ trans('admin/dashboard.category_distributors') }}</a></li>
                            <li><a  href="{{route('admin.distributortype.create')}}">{{ trans('admin/dashboard.distributortype') }}</a></li>
                            {{-- <li><a  href="{{route('admin.distributor.show')}}">{{ trans('admin/dashboard.show_distributors') }}</a></li> --}}

                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#info">
                            <div class="pull-left"><i class="fa fa-info" aria-hidden="true"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.information_company') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="info" class="collapse" data-parent="#sidebarnav" >
                            <li><a href="">{{ trans('admin/dashboard.information_company') }}</a></li>

                        
                            <li><a  href="{{ route('admin.information.index') }}">{{ trans('admin/dashboard.information_company') }}</a></li>
                            <li><a  href="{{ route('admin.information.create') }}">{{ trans('admin/dashboard.add_information_company') }}</a></li>

                        </ul>
                        
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#logout">
                            <div class="pull-left"><i class=" ti-unlock"></i><span
                                    class="right-nav-text">{{ trans('admin/dashboard.logout') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="logout" class="collapse" data-parent="#sidebarnav">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                        class="bx bx-log-out"></i>{{ trans('admin/dashboard.logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>


                        </ul>
                    </li>



                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
