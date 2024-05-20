@extends('admin.layouts.master')
@section('admin-css')
    <style>

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
                                <form id="user-form" name="user-form" action="{{ route('configs-update') }}" method="POST">
                                    @csrf
                                    @if (session('edit-success'))
                                        <h5 class="config-message mb-2 text-success">{{ session('edit-success') }}</h5>
                                    @endif
                                    <h4 class="header-title user-add-title">Config</h4>
{{--                                    <div class="form-group">--}}
{{--                                        <label class="col-form-label">Website name</label>--}}
{{--                                        <input class="form-control" name="name" type="text" value="{{ $config->name }}" required>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="col-form-label">Description</label>--}}
{{--                                        <textarea class="form-control" name="description" type="text">--}}
{{--                                            {{ $config->description }}--}}
{{--                                        </textarea>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="col-form-label">Keyword search</label>--}}
{{--                                        <input class="form-control" name="keyword" type="text" value="{{ $config->keyword }}">--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <label class="col-form-label">Email</label>
                                        <input class="form-control" name="email" type="text" value="{{ $config->email }}" >
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Phone</label>
                                        <input class="form-control" name="phone" type="text" value="{{ $config->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Linked In</label>
                                        <input class="form-control" name="linked_in" type="text" value="{{ $config->linked_in }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery341.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.config-message').delay(5000).fadeOut();
        })
    </script>
@endsection
