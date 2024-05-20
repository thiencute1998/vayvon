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
                                <form id="slide-form" name="slide-form" action="{{ route('admin-slide-update', ['id'=> $slide->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="action-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row form-group justify-content-between">
                                        <div>
                                            <h4 class="header-title slide-edit-title">Edit slides</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-slide')}}">
                                                <i class="ti-list"></i><span>List</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-8">
                                            <label for="services" class="col-form-label">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$slide->name}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="application-content" class="col-form-label">Content</label>
                                            <textarea class="form-control" name="content" type="text" id="content">
                                                {{$slide->content}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script src=
            "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" defer>
    </script>
    <link rel="stylesheet" href="{{ asset('richtexteditor/rte_theme_default.css') }}" />
    <script type="text/javascript" src="{{ asset('richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src='{{ asset('richtexteditor/plugins/all_plugins.js') }}'></script>
    <script type="text/javascript">
        var editor = new RichTextEditor("#content");
    </script>
@endsection


