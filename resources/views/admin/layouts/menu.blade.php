<!-- sidebar menu area start -->
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <h4><a href="{{route('admin-index')}}" class="text-white">Admin</a></h4>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="{{Request::path() == 'admin' ? 'active' : ''}}">
                        <a href="{{route('admin-index')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Trang chủ Admin</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/vay-von') ? 'active' : ''}}">
                        <a href="{{route('admin-vayvon')}}" aria-expanded="true"><i class="ti-list"></i><span>Quản lý vay vốn</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/configs') ? 'active' : ''}}">
                        <a href="{{route('configs')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Config</span></a>
                    </li>
{{--                    <li class="{{str_contains(Request::path(), 'admin/product') ? 'active' : ''}}">--}}
{{--                        <a href="{{route('admin-product')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Products</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="{{str_contains(Request::path(), 'admin/application') ? 'active' : ''}}">--}}
{{--                        <a href="{{route('admin-application')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Applications</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="{{str_contains(Request::path(), 'admin/quote') ? 'active' : ''}}">--}}
{{--                        <a href="{{route('admin-quote')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Request a Quote/Sample</span></a>--}}
{{--                    </li>--}}
                    <li class="{{str_contains(Request::path(), 'admin/about') ? 'active' : ''}}">
                        <a href="{{route('admin-about')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>About</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/contact') ? 'active' : ''}}">
                        <a href="{{route('admin-contact')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Contact</span></a>
                    </li>
{{--                    <li class="{{str_contains(Request::path(), 'admin/slide') ? 'active' : ''}}">--}}
{{--                        <a href="{{route('admin-slide')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Slide</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="{{str_contains(Request::path(), 'admin/certificate') ? 'active' : ''}}">--}}
{{--                        <a href="{{route('admin-certificate')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Product Certificate</span></a>--}}
{{--                    </li>--}}
                    <li class="{{str_contains(Request::path(), 'admin/logos') ? 'active' : ''}}">
                        <a href="{{route('logos')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Logo</span></a>
                    </li>
                    <li class="{{str_contains(Request::path(), 'admin/user') ? 'active' : ''}}">
                        <a href="{{route('users')}}" aria-expanded="true"><i class="ti-dashboard"></i><span>Users</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<style>
    .metismenu li a{ padding: 10px 15px !important;}
</style>
<!-- sidebar menu area end -->
