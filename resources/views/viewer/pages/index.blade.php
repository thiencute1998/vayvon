@extends('viewer.layouts.master')
@section("main-content")
    <div id="Content">
        <div class="content_wrapper clearfix">
            <!-- .sections_group -->
            <div class="sections_group">
                <div class="entry-content" itemprop="mainContentOfPage">
{{--                    <div class="section mcb-section   " style="padding-top:0px; padding-bottom:0px; background-color:">--}}
{{--                        <div class="section_wrapper mcb-section-inner">--}}
{{--                            <div class="wrap mcb-wrap one  valign-top clearfix" style="">--}}
{{--                                <div class="mcb-wrap-inner">--}}
{{--                                    <div class="column mcb-column one column_column  column-margin-30px">--}}
{{--                                        <div class="column_attr clearfix align_center animate"--}}
{{--                                             data-anim-type="fadeInDown" style=" padding:0px 20px 10px 20px;"><a--}}
{{--                                                href="#nextSec" class="scroll"><i class="icon-down-open-big"></i></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="section mcb-section   " style="padding-top:0px; padding-bottom:0px; background-color:">
                        <div class="section_wrapper mcb-section-inner" style="background: none !important;">
                            <div class="wrap mcb-wrap one  valign-top clearfix" style="">
                                <div class="mcb-wrap-inner">
                                    <div class="column mcb-column one column_column  column-margin-30px">
                                        <div class="column_attr clearfix align_center animate"
                                             data-anim-type="fadeInDown" style=" padding:0px 20px 10px 20px;">
                                            <div id="carouselExampleControls" class="carousel">

                                                <div class="carousel-inner">
                                                    <!-- YouTube Video -->
                                                    @foreach($slides as $key=> $slide)
                                                    <div class="carousel-item @if($key == 0) active @endif">
                                                        <div class="carousel-container">
                                                            <div class="carousel-row">
                                                                <div class="carousel-col">
                                                                    <h3>{{$slide->name}}</h3>
                                                                    <div class="carousel-content">
                                                                        {!! $slide->content !!}
                                                                    </div>
                                                                </div>
                                                                <div class="carousel-col">
                                                                    <img class="carousel-img" alt="Second slide"
                                                                         src="{{asset('upload/admin/Slide/image/' . $slide->image)}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <a id="carouselPrev" class="carousel-control-prev"
                                                   href="#carouselExampleControls" role="button">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a id="carouselNext" class="carousel-control-next"
                                                   href="#carouselExampleControls" role="button">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section mcb-section   " id="nextSec"
                         style="padding-top:0px; padding-bottom:10px; background-color:#cdd9e0">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="wrap mcb-wrap one  column-margin-0px valign-top clearfix"
                                 style="padding:30px 20px 20px 20px; background-color:#ffffff">
                                <div class="mcb-wrap-inner">
                                    @foreach($products as $product)
                                        <div class="column mcb-column one-third column_sliding_box ">
                                            <div class="sliding_box">
                                                <div class="animate" data-anim-type="zoomIn"><a
                                                        href="{{route('slug', ['slug'=> $product->slug])}}">
                                                        <div class="photo_wrapper"><img class="scale-with-grid"
                                                                                        src="{{asset('upload/admin/Product/image/' . $product->image)}}"
                                                                                        alt="white-masterbatch"
                                                                                        width="3700"
                                                                                        height="3700"/></div>
                                                        <div class="desc_wrapper"><h4>{{$product->name}}</h4></div>
                                                    </a></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="wrap mcb-wrap one  valign-middle clearfix"
                                 style="padding:`20px; background-color:#ffffff">
                                <div class="mcb-wrap-inner">
                                    <div class="column mcb-column one column_fancy_heading h2title">
                                        <div class="fancy_heading fancy_heading_icon">
                                            <div class="animate" data-anim-type="bounceInLeft"></div>
                                        </div>
                                    </div>
                                    <div class="column mcb-column one column_portfolio_slider "></div>
                                </div>
                            </div>
                            <div class="wrap mcb-wrap one  valign-top clearfix"
                                 style="padding:30px 30px 0 30px; background-color:#0E2C48; background-image:url({{asset('assets/viewer/style/images/back-img-truck.jpg')}}); background-repeat:no-repeat; background-position:center top; background-attachment:; background-size:; -webkit-background-size:">
                                <div class="mcb-wrap-inner">
                                    <div class="column mcb-column one column_column  column-margin-">
                                        <div class="column_attr clearfix" style=" padding:20px 0 20px 0;"><h5
                                                style="color:#ffffff; font-size:36px; font-weight:500; line-height: 35px; margin-bottom:0;text-align:center;">
                                                PRODUCT APPLICATIONS</h5>
                                            <br><br>
                                            <div class="column mcb-column one-third">
                                                <span class="home-app"><a
                                                        href="#">Calcium Carbonate Filler Masterbatch</a></span>
                                                <ul class="ul-app">
                                                    <li>Injection molding - chairs, pails, caps, household products</li>
                                                    <li>Blow molding - bottles</li>
                                                    <li>Extrusion – carry/shopping bags, films</li>
                                                    <li>PP sheets, boards, corrugated</li>
                                                    <li>PP woven: Bags</li>
                                                    <li>PP nonwoven: shopping reusable bags, table cover, face mask,
                                                        clothes.
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="column mcb-column one-third">
                                                <span class="home-app"><a
                                                        href="#">White Masterbatch</a></span>
                                                <ul class="ul-app">
                                                    <li>Injection molding - chairs, pails, caps, household products</li>
                                                    <li>Blow molding - bottles</li>
                                                    <li>Extrusion – carry/shopping bags, films</li>
                                                    <li>PP sheets, boards, corrugated</li>
                                                    <li>PP woven bags</li>
                                                    <li>PP nonwoven: shopping reusable bags, table cover, face mask,
                                                        clothes.
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="column mcb-column one-third">
                                                <span class="home-app"><a
                                                        href="#">Black Masterbatch</a></span>
                                                <ul class="ul-app">
                                                    <li>Automotive industry / General injected products</li>
                                                    <li>Grain/Silage Bags</li>
                                                    <li>Mulch / Wrap Films</li>
                                                    <li>Agriculture (geomembrane and drip tape)</li>
                                                    <li>Water / Irrigation pipes</li>
                                                    <li>Wire and Cable</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section mcb-section   " style="padding-top:0px; padding-bottom:0px; background-color:">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="wrap mcb-wrap one  valign-top clearfix" style="">
                                <div class="mcb-wrap-inner">
                                    <div class="column mcb-column one column_clients_slider ">
                                        <div class="clients_slider">
                                            <div class="clients_slider_header"><h4 class="title">Product
                                                    Certificates</h4><a class="button button_js slider_prev"
                                                                        href="#"><span class="button_icon"><i
                                                            class="icon-left-open-big"></i></span></a><a
                                                    class="button button_js slider_next" href="#"><span
                                                        class="button_icon"><i
                                                            class="icon-right-open-big"></i></span></a></div>
                                            <ul class="clients clients_slider_ul">
                                                @foreach($certificates as $certificate)
                                                    <li>
                                                    <div class="client_wrapper">
                                                        <a href="{{$certificate->link}}">
                                                            <img width="122" height="75"
                                                                 src="{{asset('upload/admin/Certificate/image/' . $certificate->image)}}"
                                                                 class="scale-with-grid wp-post-image"
                                                                 alt="" decoding="async"
                                                                 loading="lazy"
                                                                 sizes="(max-width: 122px) 100vw, 122px"/>
                                                        </a>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .four-columns - sidebar -->
        </div>
    </div>
@endsection
