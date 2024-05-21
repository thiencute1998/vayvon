@extends('admin.layouts.master')
@section('admin-css')
    <link href=
          'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
    <style type="text/css">
        .vayvon-remove{
            cursor: pointer;
            color: darkred;
        }
        .td-img{
            max-width: 325px;
            max-height: 158px;
            overflow: hidden;
            margin: auto;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
@section('main-content-inner')
    <div class="page-title-area collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row align-items-center" style="padding: 1.6rem 0;">
            <div class="col-md-12 col-sm-10">
                <div class="search-box pull-left w-100">
                    <form action="{{ route('admin-vayvon') }}" method="GET" >
                        <div class="row form-group justify-content-between">
                            <div class="col-md-4">
                                <span>Họ tên </span>
                                <input type="text" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
                            </div>
{{--                            <div class="col-md-3">--}}
{{--                                <span>Created at </span>--}}
{{--                                <input type="text" id="my-date" name="created_at" class="form-control" placeholder="created at">--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3">--}}
{{--                                <span>Status </span>--}}
{{--                                <select class="form-control" name="status">--}}
{{--                                    <option value="">--Select all--</option>--}}
{{--                                    <option value="1">Active</option>--}}
{{--                                    <option value="0">Inactive</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="col-md-1">
                                <span> &acute;<i class="ti-search"></i></span>
                                <button type="submit" class="btn btn-primary button-search">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 clearfix">

            </div>
        </div>
    </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- basic table start -->
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row form-group justify-content-between">
                            <div >
                                @if (session('import-success'))
                                    <h5 class="work-message mb-2 text-success">{{ session('import-success') }}</h5>
                                @endif
                                @if (session('import-success'))
                                    <h5 class="work-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">Danh sách vay vốn</h4>
                            </div>
                            <div>
                                <a class="btn btn-danger trash-all">
                                    <i class="ti-trash"></i><span>Xóa tất cả</span>
                                </a>
                                <a class="btn btn-success" href="{{route('admin-vayvon-import')}}" data-toggle="modal" data-target="#fileImportModal">
                                    <i class="ti-import"></i><span>Import file</span>
                                </a>
                                <a class="btn btn-primary" href="{{route('admin-vayvon-create')}}">
                                    <i class="ti-plus"></i><span>Thêm mới</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th><input type="checkbox" id="checkAll"></th>
                                        <th class="text-center" scope="col" style="width: 5%">STT</th>
                                        <th scope="col" >Số điện thoại</th>
                                        <th scope="col">Họ tên</th>
                                        <th>Số tiền</th>
                                        <th>Thanh toán</th>
                                        <th>Hiển thị</th>
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vayvons as $vayvon)
                                        <tr>
                                            <td><input type="checkbox" class="rowCheckbox" data-id="{{$vayvon->id}}"></td>
                                            <td class="text-left">
                                                <input style="width: 50px" type="text" value="{{$vayvon->stt}}">
                                            </td>
                                            <td class="text-left">
                                                {{$vayvon->phone}}
                                            </td>
                                            <td>
                                                {{$vayvon->user_name}}
                                            </td>
                                            <td class="text-center">
                                                {{number_format($vayvon->amount_money)}}
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" {{$vayvon->is_pay ? 'checked' : ''}} >
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" {{$vayvon->status ? 'checked' : ''}} >
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('admin-vayvon-edit', ['id'=> $vayvon->id]) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="vayvon-remove" href="{{ route('admin-vayvon-delete', ['id'=> $vayvon->id]) }}"
                                                   onclick="return confirm('Bạn có muốn xóa item này?')"
                                                >
                                                    <i class="ti-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row" style="justify-content: flex-end;">
                            {{ $vayvons->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
        </div>
        <div class="modal fade" id="fileImportModal" tabindex="-1" aria-labelledby="fileImportModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fileImportModalLabel">Import File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin-vayvon-import')}}" id="fileUploadForm" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="fileInput">Choose file</label>
                                <input type="file" class="form-control-file" id="fileInput" name="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
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
        $(document).ready(function(){
            $('.work-message').delay(5000).fadeOut();
            $( "#my-date" ).datepicker({
            });

            $("#checkAll").change(function() {
                $(".rowCheckbox").prop('checked', $(this).prop('checked'));
            });

            // If all checkboxes are checked, check the "checkAll" checkbox
            // If any checkbox is unchecked, uncheck the "checkAll" checkbox
            $(".rowCheckbox").change(function() {
                if ($(".rowCheckbox:checked").length === $(".rowCheckbox").length) {
                    $("#checkAll").prop('checked', true);
                } else {
                    $("#checkAll").prop('checked', false);
                }
            });

            $('.trash-all').on('click', function() {
                let allChecked = $('.rowCheckbox:checkbox:checked');
                console.log(allChecked.length);
                if (allChecked.length) {
                    let ids = [];
                    allChecked.each((key, value)=> {
                        ids.push($(value).data('id'));
                    })

                    $.ajax({
                        url: '{{ route("admin-vayvon-delete-all") }}',
                        type: 'DELETE',
                        data: {
                            ids: ids,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            alert(response.message)
                            location.reload();
                            // location.reload();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    alert('Chọn ít nhất 1 item');
                }

            });
        })
    </script>
@endsection
