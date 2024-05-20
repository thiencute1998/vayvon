@extends('admin.layouts.master')
@section('admin-css')
    <link href=
          'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
    <style type="text/css">
        .certificate-remove{
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
@endsection
@section('main-content-inner')
    <div class="page-title-area collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row align-items-center" style="padding: 1.6rem 0;">
            <div class="col-md-12 col-sm-10">
                <div class="search-box pull-left w-100">
                    <form action="{{ route('admin-certificate') }}" method="GET" >
                        <div class="row form-group justify-content-between">
                            <div class="col-md-4">
                                <span>Name </span>
                                <input type="text" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
                            </div>
                            <div class="col-md-3">
                                <span>Created at </span>
                                <input type="text" id="my-date" name="created_at" class="form-control" placeholder="created at">
                            </div>
                            <div class="col-md-3">
                                <span>Status </span>
                                <select class="form-control" name="status">
                                    <option value="">--Select all--</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <span> &acute;<i class="ti-search"></i></span>
                                <button type="submit" class="btn btn-primary button-search">Search</button>
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
                                @if (session('delete-success'))
                                    <h5 class="work-message mb-2 text-success">{{ session('delete-success') }}</h5>
                                @endif
                                <h4 class="header-title">List of certificates</h4>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="{{route('admin-certificate-create')}}">
                                    <i class="ti-plus"></i><span>Add certificates</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col" style="width: 40%">Image</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Created at</th>
                                        <th>Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($certificates as $certificate)
                                        <tr>
                                            <td >
                                                @if($certificate->image)
                                                    <img class="work-img" width="122" height="75"
                                                         src="{{asset('upload/admin/Certificate/image/' . $certificate->image)}}" alt="">
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{$certificate->link}}">{{$certificate->link}}</a>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                {{$certificate->created_at}}
                                            </td>
                                            <td style="vertical-align: middle;">
                                                @if($certificate->status==1)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a class="certificate-remove" href="{{ route('admin-certificate-delete', ['id'=> $certificate->id]) }}"
                                                   onclick="return confirm('Do you want to delete this certificate?' )"
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
                            {{ $certificates->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
        </div>
    </div>
@endsection
