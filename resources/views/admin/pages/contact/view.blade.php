@extends('admin.layouts.master')
@section('admin-css')
    <link href=
          'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
    <style>
        .ui-datepicker {
            width: 20em;
        }
        h1{
            color:green;
        }
    </style>
@endsection
@section('main-content-inner')
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                <div class="row">
                    <!-- Textual inputs start -->
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row form-group justify-content-between">
                                    <div>
                                        <h4 class="header-title contact-add-title">Request a contact/sample</h4>
                                    </div>
                                    <div>
                                        <a class="btn btn-primary" href="{{route('admin-contact')}}">
                                            <i class="ti-list"></i><span>List</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="services" class="col-form-label">Name: {{$contact->name}}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="services" class="col-form-label">Email: {{$contact->email}}</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label for="services" class="col-form-label">Position: {{$contact->subject}}</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="services" class="col-form-label">Message: {{$contact->message}}</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


