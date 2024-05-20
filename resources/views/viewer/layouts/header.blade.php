<div id="Header_wrapper" >
    <!-- #Header -->
    <header id="Header">
        <div id="Action_bar">
            <div class="container">
                <div class="column one">
                    <ul class="social">
                        <li class="linkedin"><a  href="{{$config->linked_in}}" title="LinkedIn"><img src="{{asset('assets/viewer/style/images/linked-in.png')}}" style="width: 90px; margin-top: -13px;"></a></li></ul><ul class="contact_details">
                        <li class="phone"><i class="fa fa-phone"></i><a href="tel:{{$config->phone}}">{{$config->phone}}</a></li><li class="mail"><i class="fa fa-envelope-o"></i><a href="{{$config->email}}">{{$config->email}}</a></li>				</ul>
                </div>
            </div>
        </div>
        <!-- .header_placeholder 4sticky  -->
        <div class="header_placeholder"></div>
        <div class="wpml-ls-statics-shortcode_actions wpml-ls wpml-ls-legacy-list-horizontal">
        </div>
        <div id="Top_bar" class="loading">
            <div class="container">
                <div class="column one">

                    <div class="top_bar_left header-height clearfix">
                        <!-- .logo -->
                        <div class="logo">
                            <a id="logo" href="{{route('index')}}" title="Starpol Trading">
                                <img class="logo-main scale-with-grid" src="{{asset('assets/viewer/style/images/Romaplas_logo.png')}}" alt="Logo-01" />
                                <img class="logo-sticky scale-with-grid" src="{{asset('assets/viewer/style/images/Romaplas_logo.png')}}" alt="Logo-01" />
                                <img class="logo-mobile scale-with-grid" src="{{asset('assets/viewer/style/images/Romaplas_logo.png')}}" alt="Logo-01" /></a>
                        </div>
                        <div class="menu_wrapper">

                            <nav id="menu" class="menu-main-menu-ingles-container"><ul id="menu-main-menu-ingles" class="menu"><li id="menu-item-384" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home"><a href="{{route('index')}}"><span>Home</span></a></li>
                                    <li id="menu-item-385" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="#"><span>Products and Applications</span></a>
                                        <ul class="sub-menu">
                                            @foreach($menuProducts as $menuProduct)
                                            <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{route('slug',['slug'=> $menuProduct->slug])}}"><span>{{$menuProduct->name}}</span></a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li id="menu-item-400" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{route('quote')}}"><span>Quote/Samples</span></a></li>
                                    <li id="menu-item-192" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{route('about')}}"><span>About</span></a></li>
                                    <li id="menu-item-194" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="{{route('contact')}}"><span>Contact</span></a></li>
                                </ul></nav><a class="responsive-menu-toggle " href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        </div>
                        <div class="logo-euro" style="float:right!important;">
                            <a id="logo-euro" href="#" title="Starpol Trading"><img class="logo-main-euro scale-with-grid" src="" alt="logo-starpol" style="width: 130px!important; height: 47px!important; padding:10px; background:#fff; margin-top:-23px;"></a>				</div>
                        <div class="secondary_menu_wrapper">
                            <!-- #secondary-menu -->
                        </div>
                        <div class="banner_wrapper">
                        </div>
                        <div class="search_wrapper">
                            <!-- #searchform -->
                            <form method="get" id="searchform" action="#">
                                <i class="icon_search icon-search"></i>
                                <a href="#" class="icon_close"><i class="icon-cancel"></i></a>
                                <input type="text" class="field" name="s" id="s" placeholder="Enter your search" />
                                <input type="submit" class="submit" value="" style="display:none;" />
                                <input type='hidden' name='lang' value='en' /></form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Route::currentRouteName() == 'index')
{{--        <video autoplay muted loop id="myVideo" style="width:100%;">--}}
{{--            <source src="" type="video/mp4">--}}
{{--            Your browser does not support HTML5 video.--}}
{{--        </video>--}}
            <div>
                <img src="{{asset('assets/viewer/style/images/Slide.jpg')}}" style="width: 100%; ">
            </div>
        @endif
    </header>
</div>
