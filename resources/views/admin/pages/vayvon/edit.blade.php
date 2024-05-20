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
                                <form id="vayvon-form" name="vayvon-form" action="{{ route('admin-vayvon-update', ['id'=> $vayvon->id]) }}" enctype="multipart/form-data" method="POST">
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
                                            <h4 class="header-title vayvon-add-title">Edit vayvons</h4>
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
                                            <input type="text" class="form-control" name="code" placeholder="Mã khoản vay" value="{{$vayvon->code}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Số điện thoại</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="{{$vayvon->phone}}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Họ tên khách hàng</label>
                                            <input type="text" class="form-control" name="user_name" placeholder="Họ tên" value="{{$vayvon->user_name}}">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Số lượng khoản vay</label>
                                            <input type="text" class="form-control" name="amount_loan" placeholder="Số lượng" value="{{$vayvon->amount_loan}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Số tiền</label>
                                            <input type="text" class="form-control" name="amount_money" placeholder="Số tiền" value="{{$vayvon->amount_money}}">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Lãi suất</label>
                                            <input type="text" class="form-control" name="interest_rate" placeholder="Lãi suất" value="{{$vayvon->interest_rate}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Miễn giảm</label>
                                            <input type="text" class="form-control" name="except" placeholder="Miễn giảm" value="{{$vayvon->except}}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Phí dịch vụ</label>
                                            <input type="text" class="form-control" name="service_charge" placeholder="Phí dịch vụ" value="{{$vayvon->service_charge}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Số tiền phải trả</label>
                                            <input type="text" class="form-control" name="money_pay" placeholder="Số tiền phải trả" value="{{$vayvon->money_pay}}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Ngày vay</label>
                                            <input type="date" class="form-control" name="loan_date" placeholder="Số lượng" value="{{$vayvon->loan_date}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="services" class="col-form-label">Ngày trả</label>
                                            <input type="date" class="form-control" name="pay_date" placeholder="Số tiền" value="{{$vayvon->pay_date}}">
                                        </div>
                                    </div>
                                    <div class="row form-group form-check ">
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" name="is_pay" {{$vayvon->is_pay ? 'checked' : ''}} type="checkbox" id="inlineCheckbox1" value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">Thanh toán</label>
                                        </div>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" name="status" {{$vayvon->status ? 'checked' : ''}} type="checkbox" id="inlineCheckbox2" value="option2">
                                            <label class="form-check-label"  for="inlineCheckbox2">Hiển thị</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <label for="services" class="col-form-label">STT </label>
                                            <input type="text" class="form-control" name="stt" placeholder="STT" value="{{$vayvon->stt}}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="services" class="col-form-label">Ghi chú</label>
                                            <textarea class="form-control" name="note" type="text" id="note">
                                                {{$vayvon->note}}
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
        var editor = new RichTextEditor("#note");

        $(document).ready(function() {
            $('.action-message').delay(5000).fadeOut();
        });
    </script>
@endsection


