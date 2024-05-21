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
        .remove-vayvon-detail{
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
                                <form id="vayvon-form" name="vayvon-form" action="{{ route('admin-vayvon-store') }}" enctype="multipart/form-data" method="POST">
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
                                            <h4 class="header-title vayvon-add-title">Thêm vay vốn</h4>
                                        </div>
                                        <div>
                                            <a class="btn btn-primary" href="{{route('admin-vayvon')}}">
                                                <i class="ti-list"></i><span>List</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Mã khoản vay</label>
                                            <input type="text" class="form-control" name="code" placeholder="Mã khoản vay">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Họ tên khách hàng</label>
                                            <input type="text" class="form-control" name="user_name" placeholder="Họ tên">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Số lượng khoản vay</label>
                                            <input type="text" class="form-control" name="amount_loan" value="2500000" placeholder="Số lượng">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Số tiền</label>
                                            <input type="text" class="form-control" name="amount_money" value="2500000" placeholder="Số tiền">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Lãi suất</label>
                                            <input type="text" class="form-control" name="interest_rate" placeholder="Lãi suất">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Miễn giảm</label>
                                            <input type="text" class="form-control" name="except" placeholder="Miễn giảm">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Phí dịch vụ</label>
                                            <input type="text" class="form-control" name="service_charge" placeholder="Phí dịch vụ">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Số tiền phải trả</label>
                                            <input type="text" class="form-control" name="money_pay" value="2500000" placeholder="Số tiền phải trả">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Ngày vay</label>
                                            <input type="date" class="form-control" name="loan_date" placeholder="Số lượng">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Ngày trả</label>
                                            <input type="date" class="form-control" name="pay_date" placeholder="Số tiền">
                                        </div>
                                    </div>
                                    <div class="row form-group form-check ">
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" name="is_pay" for="inlineCheckbox1">Thanh toán</label>
                                        </div>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="checkbox" checked id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label" name="status" for="inlineCheckbox2">Hiển thị</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label for="services" class="col-form-label">STT </label>
                                            <input type="text" class="form-control" me="nastt" value="1" placeholder="STT" style="margin-left: 5px; width: 68px;">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Ghi chú</label>
                                            <textarea class="form-control" name="note" type="text" id="note">
                                            </textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Thêm</button>
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
        var editor = new RichTextEditor("#note");
        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();
            $("input[name='name']").keypress(function(evt) {
                var name = $("input[name='name']").val();
                $("input[name='title']").val(name);
            });

            $('body').on('click', '.remove-vayvon-detail', function() {
                $(this).closest('.vayvon-detail').remove();
            })
        });
    </script>
@endsection


