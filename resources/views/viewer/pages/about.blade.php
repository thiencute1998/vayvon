@extends('viewer.layouts.master')
@section("main-content")
    <div id="Content">
        <div class="content_wrapper clearfix">
            <!-- .sections_group -->
            <div class="sections_group">
                <div class="entry-content" itemprop="mainContentOfPage">
                    <div class="section mcb-section   " style="padding-top:0px; padding-bottom:0px; background-color:">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="wrap mcb-wrap one  valign-top clearfix"
                                 style="padding:40px 20px 20px 20px; background-color:#ffffff">
                                <div class="mcb-wrap-inner">
                                    @if($contactWebsite)
                                        {!! $contactWebsite->about !!}
                                    @endif
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
