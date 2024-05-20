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
        .remove-product-detail{
            cursor: pointer;
            color: darkred;
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
                                <form id="product-form" name="product-form" action="{{ route('admin-product-store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @if (session('add-success'))
                                        <h5 class="action-message mb-2 text-success">{{ session('add-success') }}</h5>
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
                                            <h4 class="header-title product-add-title">Add products</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-product')}}">
                                                <i class="ti-list"></i><span>List</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-8">
                                            <label for="services" class="col-form-label">Name(*)</label>
                                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <label for="services" class="col-form-label">Product details</label>
                                        </div>
                                    </div>

                                    <div class="row form-group product-detail">
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Name(*)</label>
                                            <input type="text" class="form-control" name="detail_name[]" placeholder="Name" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="services" class="col-form-label">Image</label>
                                            <input type="file" name="detail_image[]" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="services" class="col-form-label">Link</label>
                                            <input type="text" class="form-control" name="detail_link[]" placeholder="Link">
                                        </div>
                                        <div class="remove-product-detail" title="Remove">
                                            <span><i class="ti-trash"></i></span>
                                        </div>
                                    </div>

                                    <div class="row form-group block-product-detail">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary ti-plus add-product-detail">Add new product detail</button>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder="Title" >
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Keywords</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="keywords" placeholder="Keywords"  ></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Description</label>
                                            <textarea rows="3" cols="200" type="text" class="form-control" name="description" placeholder="Description"  ></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Add</button>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();
            $("input[name='name']").keypress(function(evt) {
                var name = $("input[name='name']").val();
                $("input[name='title']").val(name);
            });
            $('.add-product-detail').on('click', function() {
                $('.block-product-detail').before(
                    '<div class="row form-group product-detail">' +
                    '<div class="col-md-4">' +
                    '<label for="services" class="col-form-label">Name(*)</label>' +
                '<input type="text" class="form-control" name="detail_name[]" placeholder="Name" required>' +
                '</div>' +
                '<div class="col-md-2">' +
                   '<label for="services" class="col-form-label">Image</label>' +
                    '<input type="file" name="detail_image[]" class="form-control">' +
                '</div>' +
                '<div class="col-md-4">' +
                    '<label for="services" class="col-form-label">Link</label>' +
                    '<input type="text" class="form-control" name="detail_link[]" placeholder="Link">' +
                '</div>' +
                '<div class="remove-product-detail" title="Remove">' +
                    '<span><i class="ti-trash"></i></span>' +
                '</div>' +
            '</div>'
                );
            })

            $('body').on('click', '.remove-product-detail', function() {
                $(this).closest('.product-detail').remove();
            })
        });
    </script>
@endsection


