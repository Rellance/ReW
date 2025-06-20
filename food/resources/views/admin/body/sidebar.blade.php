<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{route('admin.dashboard')}}" class="waves-effect">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                @if (Auth::guard('admin')->user()->can('category.menu'))
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if (Auth::guard('admin')->user()->can('category.all'))

                        <li>
                            <a href="{{route('all.category')}}">
                                <span data-key="t-calendar">All Category</span>
                            </a>
                        </li>
                        @endif
                        @if (Auth::guard('admin')->user()->can('category.add'))
                        <li>
                            <a href="{{ route('add.category') }}">
                                <span data-key="t-chat">Add Category</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">City</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('all.city')}}">
                                <span data-key="t-calendar">All City</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.all.product')}}">
                                <span data-key="t-calendar">All Product</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.add.product') }}">
                                <span data-key="t-chat">Add Product</span>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Restaurant</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('pending.restaurant')}}">
                                <span data-key="t-calendar">Pending Restaurant</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('approve.restaurant')}}">
                                <span data-key="t-chat">Approve Restaurant</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.all.product')}}">
                                <span data-key="t-calendar">All Product</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.add.product') }}">
                                <span data-key="t-chat">Add Product</span>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Banner</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('all.banner')}}">
                                <span data-key="t-calendar">All Banner</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Manage Order</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{route('pending.order')}}">
                                <span data-key="t-calendar">Pending Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('confirm.order')}}">
                                <span data-key="t-calendar">Confirm Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('processing.order')}}">
                                <span data-key="t-calendar">Processing Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('delivered.order')}}">
                                <span data-key="t-calendar">Delivered Orders</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="menu-title mt-2" data-key="t-components">Elements</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Manage Reports</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.all.reports') }}">All Reports</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-ui-elements">Manage Review</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.pending.review') }}" data-key="t-lightbox">Pending Reviews</a></li>
                        <li><a href="{{ route('admin.approved.review') }}" data-key="t-range-slider">Approved Reviews</a></li>   
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-ui-elements">Role & Permission </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.permission') }}" data-key="t-lightbox">All Permission</a></li>
                        <li><a href="{{ route('all.roles') }}" data-key="t-lightbox">All Roles</a></li>
                        <li><a href="{{ route('add.roles.permission') }}" data-key="t-lightbox">Role In Permission</a></li>
                        <li><a href="{{ route('all.roles.permission') }}" data-key="t-lightbox">All Role In Permmision</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-ui-elements">Manage Admins</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.admin') }}" data-key="t-lightbox">All Admins</a></li>
                        <li><a href="{{ route('add.admin') }}" data-key="t-range-slider">Add Admin</a></li>   
                    </ul>
                </li>
            </ul>

            <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
                <div class="card-body">
                    <img src="assets/images/giftbox.png" alt="">
                    <div class="mt-4">
                        <p class="font-size-13">HELLO</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sidebar -->
    </div>
</div>