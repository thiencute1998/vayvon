@extends('admin.layouts.master')
@section('admin-css')
    <link href=
          'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
    <style type="text/css">
        .quote-remove{
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
                    <form action="{{ route('admin-quote') }}" method="GET" >
                        <div class="row form-group">
                            <div class="col-md-4">
                                <span>Name </span>
                                <input type="text" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
                            </div>
                            <div class="col-md-4">
                                <span>Created at </span>
                                <input type="text" id="my-date" name="created_at" class="form-control" placeholder="created at">
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
                                <h4 class="header-title">List of request a quote/sample</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($quotes as $quote)
                                        <tr>
                                            <td class="text-left">
                                                {{$quote->name}}
                                            </td>
                                            <td>
                                                {{$quote->email}}
                                            </td>
                                            <td>
                                                {{$quote->phone}}
                                            </td>
                                            <td>
                                                {{$quote->created_at}}
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <a href="{{ route('admin-quote-view', ['id'=> $quote->id]) }}" title="Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a class="quote-remove" href="{{ route('admin-quote-delete', ['id'=> $quote->id]) }}"
                                                   onclick="return confirm('Do you want to delete this quote?' )"
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
                            {{ $quotes->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- basic table end -->
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
        })
    </script>
@endsection
