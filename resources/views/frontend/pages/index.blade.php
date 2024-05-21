@extends('frontend.layouts.master')
@section('content')
    <section id="menu-contain" class="menu-sticky ">
        <div class="container-jn d-flex align-items-center justify-content-center ">
            <!-- <a href="#menu" title="" class="menu-responsive">
                <div class="menu-mobile">
                    <span>
                        <span></span>
                    </span>
                </div>
            </a> -->
            <div class="logo-header">
                <a href="{{route('index')}}" title="{{$logoWeb ? $logoWeb->name : ""}}" rel="home">
                    <img width="60" height="75" src="{{asset("upload/admin/logo/". ($logoWeb ? $logoWeb->file_name : ""))}}" class="header_logo header-logo" alt="{{$logoWeb ? $logoWeb->name : ""}}"/>
                </a>
            </div>
            <div class="menu">
                <ul class="d-flex align-items-center justify-content-between">
                    <li><a class="transition " href="dang-nhap-thanh-toan" title="đăng nhập thanh toán">Đăng nhập thanh toán</a>
                    </li>
                </ul>
                <div id="google_language_translator"></div>
                <div class="btn-top-info">
                    <div class="search show-search">
                        <span><img src="assets/images/search.svg" alt="Tìm kiếm sản phẩm"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <div class="slideshow">

    <div class="home-slider owl-carousel owl-theme owl-carousel-loop in-home" data-animateOut="fadeOut" data-animateIn="fadeIn" data-dot="0" data-nav='1' data-loop='1' data-play='1' data-lg-items='1' data-md-items='1' data-sm-items='1' data-xs-items="1" data-margin='0'>


    </div>

</div> -->

    <section class="canhgiua">

        <section class="HowDoIt_section">

            <h2 class="HowDoIt_title">Hỗ trợ tư vấn ngân hàng tốt nhất - Phù hợp với nhu cầu khách hàng</h2>

            <div class="HowDoIt_items">

                <div class="HowDoIt_item">

                    <img style="width: 80px;" src="https://linkappmnd.com/upload/photo/chuyen-gia.png" alt="linkappmnd">

                    <p class="HowDoIt_itemText">Chuyên gia tư vấn Miễn phí - Chuyên nghiệp</p>

                </div>

                <div class="HowDoIt_item">

                    <img style="width: 80px;" src="https://linkappmnd.com/upload/photo/quy-trinh.png" alt="linkappmnd">

                    <p class="HowDoIt_itemText">Quy trình đơn giản &amp; Tiết kiệm thời gian khách hàng</p>

                </div>

                <div class="HowDoIt_item">

                    <img style="width: 80px;" src="https://linkappmnd.com/upload/photo/tu-van.png" alt="linkappmnd">

                    <p class="HowDoIt_itemText">Đăng ký nhận tư vấn miễn phí</p>

                </div>

            </div>

        </section>

    </section>

    <section class="canhgiua">
        <section class="height-tieuchi">
            <div class="container-jn">
                <div class="row">
{{--                    <div class="col-md-5 col-lg-5 col-xs-12">--}}
{{--                        <div class="">--}}

{{--                            <div class="tieuchi-box">--}}
{{--                                <div class="tieuchi-img">--}}
{{--                                    <img id="view-img-" src="upload/photo/banner-new-8751.jpg" alt=""/>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-12 col-lg-12 col-xs-12 item30">
                        <div class="dkb-box">
                            @if($contactWebsite)
                                {!! $contactWebsite->about !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section id="news-contain">
        <div class="container-jn">
            <div class="news-page">
                <div class="d-flex flex-wrap justify-content-start">
                </div>
            </div>
        </div>
    </section>
@endsection
