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
                <a href="{{route('index')}}" title="{{$logoWeb ? $logoWeb->name : ""}}" rel="home">
                    <img width="60" height="75" src="{{asset("upload/admin/logo/". ($logoWeb ? $logoWeb->file_name : ""))}}" class="header_logo header-logo" alt="{{$logoWeb ? $logoWeb->name : ""}}"/>
                </a>
            </div>
            <div class="menu">
                <ul class="d-flex align-items-center justify-content-between">
                    <li><a class="transition active" href="dang-nhap-thanh-toan" title="đăng nhập thanh toán">Đăng nhập thanh toán</a>
                    </li>
                </ul>
                <div id="google_language_translator"><div class="skiptranslate goog-te-gadget" dir="ltr" style=""><div id=":0.targetLanguage"><select class="goog-te-combo" aria-label="Language Translate Widget"><option value="">Select Language</option><option value="af">Afrikaans</option><option value="sq">Albanian</option><option value="am">Amharic</option><option value="ar">Arabic</option><option value="hy">Armenian</option><option value="as">Assamese</option><option value="ay">Aymara</option><option value="az">Azerbaijani</option><option value="bm">Bambara</option><option value="eu">Basque</option><option value="be">Belarusian</option><option value="bn">Bengali</option><option value="bho">Bhojpuri</option><option value="bs">Bosnian</option><option value="bg">Bulgarian</option><option value="ca">Catalan</option><option value="ceb">Cebuano</option><option value="ny">Chichewa</option><option value="zh-CN">Chinese (Simplified)</option><option value="zh-TW">Chinese (Traditional)</option><option value="co">Corsican</option><option value="hr">Croatian</option><option value="cs">Czech</option><option value="da">Danish</option><option value="dv">Dhivehi</option><option value="doi">Dogri</option><option value="nl">Dutch</option><option value="en">English</option><option value="eo">Esperanto</option><option value="et">Estonian</option><option value="ee">Ewe</option><option value="tl">Filipino</option><option value="fi">Finnish</option><option value="fr">French</option><option value="fy">Frisian</option><option value="gl">Galician</option><option value="ka">Georgian</option><option value="de">German</option><option value="el">Greek</option><option value="gn">Guarani</option><option value="gu">Gujarati</option><option value="ht">Haitian Creole</option><option value="ha">Hausa</option><option value="haw">Hawaiian</option><option value="iw">Hebrew</option><option value="hi">Hindi</option><option value="hmn">Hmong</option><option value="hu">Hungarian</option><option value="is">Icelandic</option><option value="ig">Igbo</option><option value="ilo">Ilocano</option><option value="id">Indonesian</option><option value="ga">Irish</option><option value="it">Italian</option><option value="ja">Japanese</option><option value="jw">Javanese</option><option value="kn">Kannada</option><option value="kk">Kazakh</option><option value="km">Khmer</option><option value="rw">Kinyarwanda</option><option value="gom">Konkani</option><option value="ko">Korean</option><option value="kri">Krio</option><option value="ku">Kurdish (Kurmanji)</option><option value="ckb">Kurdish (Sorani)</option><option value="ky">Kyrgyz</option><option value="lo">Lao</option><option value="la">Latin</option><option value="lv">Latvian</option><option value="ln">Lingala</option><option value="lt">Lithuanian</option><option value="lg">Luganda</option><option value="lb">Luxembourgish</option><option value="mk">Macedonian</option><option value="mai">Maithili</option><option value="mg">Malagasy</option><option value="ms">Malay</option><option value="ml">Malayalam</option><option value="mt">Maltese</option><option value="mi">Maori</option><option value="mr">Marathi</option><option value="mni-Mtei">Meiteilon (Manipuri)</option><option value="lus">Mizo</option><option value="mn">Mongolian</option><option value="my">Myanmar (Burmese)</option><option value="ne">Nepali</option><option value="no">Norwegian</option><option value="or">Odia (Oriya)</option><option value="om">Oromo</option><option value="ps">Pashto</option><option value="fa">Persian</option><option value="pl">Polish</option><option value="pt">Portuguese</option><option value="pa">Punjabi</option><option value="qu">Quechua</option><option value="ro">Romanian</option><option value="ru">Russian</option><option value="sm">Samoan</option><option value="sa">Sanskrit</option><option value="gd">Scots Gaelic</option><option value="nso">Sepedi</option><option value="sr">Serbian</option><option value="st">Sesotho</option><option value="sn">Shona</option><option value="sd">Sindhi</option><option value="si">Sinhala</option><option value="sk">Slovak</option><option value="sl">Slovenian</option><option value="so">Somali</option><option value="es">Spanish</option><option value="su">Sundanese</option><option value="sw">Swahili</option><option value="sv">Swedish</option><option value="tg">Tajik</option><option value="ta">Tamil</option><option value="tt">Tatar</option><option value="te">Telugu</option><option value="th">Thai</option><option value="ti">Tigrinya</option><option value="ts">Tsonga</option><option value="tr">Turkish</option><option value="tk">Turkmen</option><option value="ak">Twi</option><option value="uk">Ukrainian</option><option value="ur">Urdu</option><option value="ug">Uyghur</option><option value="uz">Uzbek</option><option value="cy">Welsh</option><option value="xh">Xhosa</option><option value="yi">Yiddish</option><option value="yo">Yoruba</option><option value="zu">Zulu</option></select></div>Powered by <span style="white-space:nowrap"><a class="VIpgJd-ZVi9od-l4eHX-hSRGPd" href="https://translate.google.com" target="_blank"><img src="https://www.gstatic.com/images/branding/googlelogo/1x/googlelogo_color_42x16dp.png" width="37px" height="14px" style="padding-right: 3px" alt="Google Translate">Translate</a></span></div></div>
                <div class="btn-top-info">
                    <div class="search show-search">
                        <span><img src="assets/images/search.svg" alt="Tìm kiếm sản phẩm"></span>
                    </div>
                </div>
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
                            @if(!$data->is_pay)
                         <div>
                             @if($contactWebsite)
                                 {!! $contactWebsite->contact !!}
                             @endif
                         </div>
                            @endif
                        <p>Ghi chú:</p>
                        <div><p>{!! $data->note !!}</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
