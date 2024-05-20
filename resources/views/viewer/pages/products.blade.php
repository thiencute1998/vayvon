@extends('viewer.layouts.master')
@section("main-content")
    <div id="Content">
        <div class="content_wrapper clearfix">
            <!-- .sections_group -->
            <div class="sections_group">
                <div class="entry-content" itemprop="mainContentOfPage">
                    <div class="section the_content has_content">
                        <div class="section_wrapper">
                            <div class="the_content_wrapper">
                                <div class="vc_row wpb_row vc_row-fluid vc_custom_1634885949754 vc_row-has-fill">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper"><p
                                                    style="font-size: 32px;color: #085895;text-align: center;font-family:Open Sans;font-weight:400;font-style:normal"
                                                    class="vc_custom_heading"> {{$product->name}} </p>
                                                <div class="vc_empty_space" style="height: 32px"><span
                                                        class="vc_empty_space_inner"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_row-fluid vc_custom_1634886019070 vc_row-has-fill">

                                    <ul class="product-list">
                                    @foreach($product->productDetails as $detail)
                                            <li>
                                                <div class="book-img">
                                                    <a @if($detail->link) href="{{$detail->link}}" @endif
                                                       class="tacpham-main-img"><img
                                                            src="{{asset('upload/admin/Product/image/' . $detail->image)}}"
                                                            title="{{$detail->name}}">
                                                    </a>
                                                </div>
                                                <div class="book-infor">
                                                    <div class="prodouct-name">
                                                        <a href="{{route('slug', ['slug'=> $product->slug])}}"
                                                           title="{{$detail->name}}">
                                                            <h4>{{$detail->name}}</h4> </a>
                                                    </div>

                                                </div>
                                            </li>
                                    @endforeach
                                    </ul>
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
<style>
    ul.product-list {list-style: none;}
    ul.product-list li{ width: 30%; float: left; margin-right: 10px; text-align: center; list-style: none; height: 222px; overflow: hidden;}

</style>
