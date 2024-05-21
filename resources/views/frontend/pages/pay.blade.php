@extends('frontend.layouts.master')
@section('content')
    <section id="menu-contain" class="menu-sticky menu-inpage">
        <div class="container-jn d-flex align-items-center justify-content-center ">
            <!-- <a href="#menu" title="" class="menu-responsive">
                <div class="menu-mobile">
                    <span>
                        <span></span>
                    </span>
                </div>
            </a> -->
            <div class="logo-header">

            </div>
        </div>
    </section>
    <div class="cont-breadcrumb">
        <div class="breadCrumbs">
            <div class="wrap-content">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="https://linkappmnd.com/"><span>Trang chủ</span></a>
                    </li>
                    <li class="breadcrumb-item active"><a class="text-decoration-none"
                                                          href="https://linkappmnd.com/dang-nhap-thanh-toan"><span>Đăng nhập thanh toán</span></a>
                    </li>
                </ol>
                <script type="application/ld+json">{
                    "@context": "https://schema.org",
                    "@type": "BreadcrumbList",
                    "itemListElement": [
                        {
                            "@type": "ListItem",
                            "position": 1,
                            "name": "\u0110\u0103ng nh\u1eadp thanh to\u00e1n",
                            "item": "https:\/\/linkappmnd.com\/dang-nhap-thanh-toan"
                        }
                    ]
                }</script>
            </div>
        </div>
    </div>
    <div class="info-static margin-top-50 margin-bottom-50">
        <div class="container-jn">
            <h3 class="text-center">Đăng nhập</h3>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6 col-sm-8 col-12">
                    @if($errors->any())
                        <h4><strong class="txt-tientt">{{$errors->first()}}</strong></h4>
                    @endif
                    <form class="boxtimk" method="post" action="{{route('post-pay')}}">
                        @csrf
                        <input class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại" value="{{Session::get('data') ? Session::get('data')->phone : ''}}">
                        <button class="btn btn-danger btn-dn" type="submit" name="btn">Đăng nhập</button>
                    </form>
                    @if(Session::get('data'))
                        <?php $data = Session::get('data'); ?>
                        <p>Mã khoản vay: <strong class="txt-khoanvay">{{$data->code}}</strong></p>
                        <p>Họ tên khách: <strong class="txt-hoten">{{$data->user_name}}</strong></p>
                        <p>Số điện thoại: <strong>{{$data->phone}}</strong></p>
                        <p>Số lượng khoản vay: <strong>{{number_format($data->amount_loan)}}</strong></p>
                        <p>Số tiền vay: <strong class="txt-sotienvay">{{number_format($data->amount_money)}} VNĐ</strong></p>
                        <p>Lãi suất: {{$data->interest_rate}}<strong></strong></p>
                        <p>Phí dịch vụ: <strong>{{number_format($data->service_charge)}} VNĐ</strong></p>
                        <p>Miễn giảm: <strong class="txt-miengiam">{{number_format($data->except)}} VNĐ</strong></p>
                        <p>Số tiền cần thanh toán: <strong class="txt-tientt">{{number_format($data->money_pay)}} VNĐ</strong></p>
                        <p>Ngày vay: <strong class="txt-sotienvay">{{$data->loan_date}}</strong></p>
                        <p>Thời hạn thanh toán: <strong class="txt-tientt">{{$data->pay_date}}</strong></p>
                        <p>Tình trạng: <strong class="{{$data->is_pay ? 'txt-miengiam' : 'txt-tientt'}}">
                            {{$data->is_pay ? 'Đã thanh toán' : 'Chưa thanh toán'}} </strong>
                        </p>

                        <p>Ghi chú:</p>
                        <div><p>{!! $data->note !!}</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
