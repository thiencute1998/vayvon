
<!DOCTYPE html>
<html class="no-js" lang="en-US" itemscope="itemscope" itemtype="https://schema.org/WebPage">
<!-- head -->
<head>
    <!-- meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/viewer/style/images/favicon.ico')}}" />
    <!-- wp_head() -->
    <title>Romaplas</title>

    <!-- script | dynamic -->
    <script id="mfn-dnmc-config-js">
        //<![CDATA[
        window.mfn = {mobile_init:1240,nicescroll:40,parallax:"translate3d",responsive:1,retina_disable:0};
        window.mfn_prettyphoto = {disable:false,disableMobile:false,title:false,style:"pp_default",width:0,height:0};
        window.mfn_sliders = {blog:0,clients:0,offer:0,portfolio:0,shop:0,slider:0,testimonials:0};
        //]]>
    </script>
    <meta name='robots' content='max-image-preview:large' />
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
{{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/viewer/style/6hkez.css')}}" media="all"/>--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/viewer/style/main.css')}}" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/viewer/style/font-awesome.css')}}" media="all"/>

    <script type='text/javascript' src="{{asset('assets/viewer/js/jquery.min.js?ver=3.6.4')}}" id='jquery-core-js'></script>
    <script type='text/javascript' src="{{asset('assets/viewer/js/jquery-migrate.min.js?ver=3.4.0')}}" id='jquery-migrate-js'></script>
    <script type='text/javascript' src="{{asset('assets/viewer/js/jquery.themepunch.tools.min.js?ver=5.2.6')}}" id='tp-tools-js'></script>
    <script type='text/javascript' src="{{asset('assets/viewer/js/jquery.themepunch.revolution.min.js?ver=5.2.6')}}" id='revmin-js'></script>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/viewer/style/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/viewer/style/slick-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/viewer/style/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/viewer/style/mobile.css')}}"/>
</head>
<!-- body -->
<body data-rsssl=1 class="home page-template page-template-page-video page-template-page-video-php page page-id-464  color-custom style-simple layout-full-width nice-scroll-on mobile-tb-left button-stroke no-content-padding header-modern sticky-header sticky-tb-color ab-show subheader-both-center menu-highlight menuo-right logo-overflow footer-copy-center tr-footer wpb-js-composer js-comp-ver-4.12 vc_responsive">
<!-- mfn_hook_top --><!-- mfn_hook_top -->
<!-- #Wrapper -->
<div id="Wrapper">
    <!-- #Header_bg -->
    @include("viewer.layouts.header")
    <!-- mfn_hook_content_before --><!-- mfn_hook_content_before -->
    <!-- #Content -->
    @yield("main-content")

    <!-- mfn_hook_content_after --><!-- mfn_hook_content_after -->
    <!-- #Footer -->
    @include("viewer.layouts.footer")
</div><!-- #Wrapper -->
<a id="back_to_top" class="button button_left button_js sticky scroll" href=""><span class="button_icon"><i class="fa fa-chevron-up"></i></span></a>


<script type='text/javascript' src="{{ asset('assets/viewer/js/index.js?ver=5.7.7') }}" id='contact-form-7-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/core.min.js?ver=1.13.2') }}" id='jquery-ui-core-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/mouse.min.js?ver=1.13.2') }}" id='jquery-ui-mouse-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/sortable.min.js?ver=1.13.2') }}" id='jquery-ui-sortable-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/tabs.min.js?ver=1.13.2') }}" id='jquery-ui-tabs-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/accordion.min.js?ver=1.13.2') }}" id='jquery-ui-accordion-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/plugins.js?ver=14.4') }}" id='jquery-plugins-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/menu.js?ver=14.4') }}" id='jquery-mfn-menu-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/animations.min.js?ver=14.4') }}" id='jquery-animations-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/jplayer.min.js?ver=14.4') }}" id='jquery-jplayer-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/translate3d.js?ver=14.4') }}" id='jquery-mfn-parallax-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/scripts.js?ver=14.4') }}" id='jquery-scripts-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/comment-reply.min.js?ver=6.2.2') }}" id='comment-reply-js'></script>
<script type='text/javascript' src="{{ asset('assets/viewer/js/sitepress.js?ver=6.2.2') }}" id='sitepress-js'></script>

<script>
    const carousel = document.getElementById('carouselExampleControls')
    const items = carousel.querySelectorAll('.carousel-item');
    let currentItem = 0;
    let isActive = true;
    function setCurrentItem(index) {
        currentItem = (index + items.length) % items.length;
    }
    function hideItem(direction) {
        isActive = false;
        items[currentItem].classList.add(direction);
        items[currentItem].addEventListener('animationend', function() {
            this.classList.remove('active', direction);
        });
    }
    function showItem(direction) {
        items[currentItem].classList.add('next', direction);
        items[currentItem].addEventListener('animationend', function() {
            this.classList.remove('next', direction);
            this.classList.add('active');
            isActive = true;
        });
    }
    document.getElementById('carouselPrev').addEventListener('click', function(e) {
        e.preventDefault()
        if (isActive) {
            hideItem('to-right');
            setCurrentItem(currentItem - 1);
            showItem('from-left');
        }
    });
    document.getElementById('carouselNext').addEventListener('click', function(e) {
        e.preventDefault()
        if (isActive) {
            hideItem('to-left');
            setCurrentItem(currentItem + 1);
            showItem('from-right');
        }
    });
</script>
</body>
</html>
