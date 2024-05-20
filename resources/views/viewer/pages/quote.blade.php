@extends('viewer.layouts.master')
@section("main-content")
    <style type="text/css">
        .wpcf7-not-valid-tip{
            display: none;
        }
    </style>
    <div id="Content">
        <div class="content_wrapper clearfix">
            <!-- .sections_group -->
            <div class="sections_group">
                <div class="entry-content" itemprop="mainContentOfPage">
                    <div class="section mcb-section full-width no-margin-h no-margin-v  "
                         style="padding-top:0px; padding-bottom:0px; background-color:">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="wrap mcb-wrap one  valign-top clearfix" style="">
                                <div class="mcb-wrap-inner">
                                    <div class="column mcb-column one column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid no_border">
                                            <div class="image_wrapper">
                                                @if($contactWebsite)
                                                    {!! $contactWebsite->quoteimg !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section mcb-section   "
                         style="padding-top:20px; padding-bottom:20px; background-color:">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="wrap mcb-wrap one  valign-top clearfix" style="background-color:#ffffff">
                                <div class="mcb-wrap-inner">
                                    <div class="column mcb-column one-third column_column  column-margin-">
                                        <div class="column_attr clearfix" style=" padding:30px 15% 0 20px;">
                                            @if($contactWebsite)
                                                {!! $contactWebsite->quote !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="column mcb-column two-third column_column  column-margin-">
                                        <div class="column_attr clearfix" style=" padding:30px 20px 20px 20px;">
                                            <div class="wpcf7 js" id="wpcf7-f416-p398-o1" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response"><p role="status" aria-live="polite"
                                                                                       aria-atomic="true"></p>
                                                    <ul></ul>
                                                </div>
                                                <form action="{{route('request-quote')}}" method="post" id="request-a-quote"
                                                      class="wpcf7-form init" aria-label="Contact form"
                                                      novalidate="novalidate" data-status="init">
                                                    <div class="column one-second">
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap"
                                                                 data-name="your-name">
                                                                <input size="40"
                                                                  class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required c-name"
                                                                  placeholder="Name"
                                                                  type="text"
                                                                  name="name">
                                                            <span class="wpcf7-not-valid-tip v-name" aria-hidden="true">The field is required.</span>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="column one-second">
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap" data-name="your-email">
                                                                <input
                                                                    size="40"
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email c-email"
                                                                    placeholder="E-mail"  type="email"
                                                                    name="email">
                                                            <span class="wpcf7-not-valid-tip v-email" aria-hidden="true">The field is required.</span>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="column one-second">
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap"
                                                                 data-name="tel-666">
                                                                <input size="40"
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel c-phone"
                                                                    placeholder="Phone"
                                                                    type="tel"
                                                                    required="true"
                                                                    name="phone">
                                                            <span class="wpcf7-not-valid-tip v-phone" aria-hidden="true">The field is required.</span>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="column one-second">
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap"
                                                                 data-name="position">
                                                                <input size="40"
                                                                     class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required c-position"
                                                                     aria-required="true"
                                                                     aria-invalid="false"
                                                                     placeholder="Position / Title"
                                                                     type="text"
                                                                     name="position">
                                                            <span class="wpcf7-not-valid-tip v-position" aria-hidden="true">The field is required.</span>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="column one-second">
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap"
                                                                 data-name="your-subject">
                                                                <input size="40"
                                                                     class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required c-business"
                                                                     aria-required="true"
                                                                     aria-invalid="false"
                                                                     placeholder="Business / Organization"
                                                                     type="text"
                                                                     name="business">
                                                            <span class="wpcf7-not-valid-tip v-business" aria-hidden="true">The field is required.</span>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="column one-second" style="margin-top:10px;">
                                                        <p><span>Interested in:</span><span
                                                                class="wpcf7-form-control-wrap"
                                                                data-name="checkbox-793"><span
                                                                    class="wpcf7-form-control wpcf7-checkbox"><span
                                                                        class="wpcf7-list-item first"><input
                                                                            type="checkbox"
                                                                            class="c-interest"
                                                                            name="interest_in[]"
                                                                            value="Request a Quote"><span
                                                                            class="wpcf7-list-item-label">Request a Quote</span></span><span
                                                                        class="wpcf7-list-item last"><input
                                                                            type="checkbox"
                                                                            class="c-interest"
                                                                            name="interest_in[]"
                                                                            value="Sample"><span
                                                                            class="wpcf7-list-item-label">Sample</span></span></span></span>
                                                        </p>
                                                    </div>
                                                    <div class="column one">
                                                        <p><span>Product:</span><span class="wpcf7-form-control-wrap"
                                                                                      data-name="checkbox-794"><span
                                                                    class="wpcf7-form-control wpcf7-checkbox">
                                                                    @foreach($products as $product)
                                                                    <span class="wpcf7-list-item first">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="c-product"
                                                                            name="products[]"
                                                                            value="{{$product->id}}">
                                                                        <span
                                                                            class="wpcf7-list-item-label">{{$product->name}}
                                                                        </span>
                                                                    </span>
                                                                    @endforeach
                                                                </span></span>
                                                        </p>
                                                    </div>
                                                    <div class="column one">
                                                        <p><span class="wpcf7-form-control-wrap"
                                                                 data-name="your-message"><textarea cols="40" rows="6"
                                                                                                    class="wpcf7-form-control wpcf7-textarea c-message"
                                                                                                    aria-invalid="false"
                                                                                                    placeholder="Message"
                                                                                                    name="message"></textarea></span>
                                                        </p>
                                                    </div>
                                                    <div class="column one">
                                                        <p><input class="wpcf7-form-control has-spinner wpcf7-submit" disabled="disabled"
                                                                  type="submit" value="SEND"><span
                                                                class="wpcf7-spinner"></span>
                                                        </p>
                                                    </div>
                                                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                                                </form>
                                            </div>
                                        </div>
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
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            let vm = this;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#request-a-quote").submit(function(e){
                e.preventDefault();
                $('.wpcf7-not-valid-tip').css('display','none')
                let check = true;

                if (!$('.c-name').val()) {
                    $('.v-name').css('display','block');
                    check = false;
                }
                if (!$('.c-email').val()) {
                    $('.v-email').css('display','block');
                    check = false;
                }
                if (!$('.c-phone').val()) {
                    $('.v-phone').css('display','block');
                    check = false;
                }
                if (!$('.c-position').val()) {
                    $('.v-position').css('display','block');
                    check = false;
                }
                if (!$('.c-business').val()) {
                    $('.v-business').css('display','block');
                    check = false;
                }

                if (check) {
                    let formData = new FormData($(this)[0]);
                    //append some non-form data also
                    // formData.append('other_data',$("#someInputData").val());
                    $.ajax({
                        type: "POST",
                        url: "{{route('request-quote')}}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        success: function(data, textStatus, jqXHR) {
                            //process data
                            alert("Thank you for your message. It has been sent. We will get back to you as soon as possible.");
                            $('.c-name').val('');
                            $('.c-email').val('');
                            $('.c-phone').val('')
                            $('.c-position').val('')
                            $('.c-business').val('')
                            $('.c-interest').prop('checked', false);
                            $('.c-product').prop('checked', false);
                            $('.c-message').val('')
                        },
                        error: function(data, textStatus, jqXHR) {
                            //process error msg
                            alert("Something is wrong!!!")
                        },
                    });

                }
            });
        });
    </script>
@endsection
