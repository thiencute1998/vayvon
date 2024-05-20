@extends('viewer.layouts.master')
@section("main-content")
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
                                                    {!! $contactWebsite->map !!}
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
                                                {!! $contactWebsite->contact !!}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="column mcb-column two-third column_column  column-margin-">
                                        <div class="column_attr clearfix" style=" padding:30px 20px 20px 20px;">
                                            <div class="wpcf7 no-js" id="wpcf7-f229-p186-o1" lang="en-US" dir="ltr">
                                                <div class="screen-reader-response"><p role="status" aria-live="polite"
                                                                                       aria-atomic="true"></p>
                                                    <ul></ul>
                                                </div>
                                                <form action="{{route('send-contact')}}" method="post" id="send-contact"
                                                      class="wpcf7-form init" aria-label="Contact form"
                                                      novalidate="novalidate" data-status="init">
                                                    <div class="column one-second">
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap"
                                                                 data-name="your-name">
                                                                <input size="40"
                                                                  class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required c-name"
                                                                  aria-required="true"
                                                                  aria-invalid="false"
                                                                  placeholder="Name"
                                                                  value="" type="text"
                                                                  name="name"/>
                                                            </span>
                                                            <span class="wpcf7-not-valid-tip v-name" aria-hidden="true">The field is required.</span>
                                                        </p>
                                                    </div>
                                                    <div class="column one-second">
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap" data-name="your-email">
                                                                <input
                                                                    size="40"
                                                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email c-email"
                                                                    aria-required="true" aria-invalid="false"
                                                                    placeholder="E-mail" value="" type="email"
                                                                    name="email"/>
                                                            </span>
                                                            <span class="wpcf7-not-valid-tip v-name" aria-hidden="true">The field is required.</span>
                                                        </p>
                                                    </div>
                                                    <div class="column one">
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap"
                                                                 data-name="your-subject">
                                                                <input size="40"
                                                                     class="wpcf7-form-control wpcf7-text c-subject"
                                                                     aria-invalid="false"
                                                                     placeholder="Subject"
                                                                     value="" type="text"
                                                                     name="subject"/>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="column one">
                                                        <p>
                                                            <span class="wpcf7-form-control-wrap"
                                                                 data-name="your-message">
                                                                <textarea cols="40" rows="6"
                                                                    class="wpcf7-form-control wpcf7-textarea c-message"
                                                                    aria-invalid="false"
                                                                    placeholder="Message"
                                                                    name="message"></textarea>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <div class="column one">
                                                        <p><input class="wpcf7-form-control has-spinner wpcf7-submit"
                                                                  type="submit" value="SEND"/>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#send-contact").submit(function(e){
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

                if (check) {
                    let formData = new FormData($(this)[0]);
                    //append some non-form data also
                    // formData.append('other_data',$("#someInputData").val());
                    $.ajax({
                        type: "POST",
                        url: "{{route('send-contact')}}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: "json",
                        success: function(data, textStatus, jqXHR) {
                            //process data
                            alert("Thank you for your message. It has been sent. We will get back to you as soon as possible.");
                            $('.c-name').val('');
                            $('.c-email').val('');
                            $('.c-subject').val('')
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
