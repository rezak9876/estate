@include("frontend::layouts.head")

    <!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- Body main wrapper start -->
<div class="body-wrapper">

    <!-- HEADER AREA START (header-5) -->
@include("frontend::layouts.menu-b")
<!-- HEADER AREA END -->

    <!-- Utilize Cart Menu Start -->
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="mini-cart-product-area ltn__scrollbar">
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="/quarter/img/product/1.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Wheel Bearing Retainer</a></h6>
                        <span class="mini-cart-quantity">1 x $65.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="/quarter/img/product/2.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Brake Conversion Kit</a></h6>
                        <span class="mini-cart-quantity">1 x $85.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="/quarter/img/product/3.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">OE Replica Wheels</a></h6>
                        <span class="mini-cart-quantity">1 x $92.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="/quarter/img/product/4.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Shock Mount Insulator</a></h6>
                        <span class="mini-cart-quantity">1 x $68.00</span>
                    </div>
                </div>
            </div>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>Subtotal: <span>$310.00</span></h5>
                </div>
                <div class="btn-wrapper">
                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                    <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                <p>Free Shipping on All Orders Over $100!</p>
            </div>

        </div>
    </div>
    <!-- Utilize Cart Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="index-2.html"><img src="{{\App\Setting::PATH_UPLOAD.$setting->logo}}" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li><a href="#">خانه</a></li>
                    <li><a href="#">درباره ما</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">درباره</a></li>
                            <li><a href="service.html">سرویس ها</a></li>
                            <li><a href="team.html">تیم ما</a></li>
                            <li><a href="locations.html">گوگل مپ</a></li>
                        </ul>
                    </li>
                    <li><a href="#">فروشگاه</a></li>
                    <li><a href="contact.html">تماس با ما</a></li>
                </ul>
            </div>
            <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                    <li>
                        <a href="account.html" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                            حساب من
                        </a>
                    </li>
                    <li>
                        <a href="wishlist.html" title="Wishlist">
                            <span class="utilize-btn-icon">
                                <sup>3</sup>
                                <i class="far fa-heart"></i>
                            </span>
                            علاقه مندی ها
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>

    <!-- SLIDER AREA START (slider-4) -->
    <div class="ltn__slider-area ltn__slider-4">
        <div class="ltn__slide-one-active----- slick-slide-arrow-1----- slick-slide-dots-1----- arrow-white----- ltn__slide-animation-active">
            <!-- ltn__slide-item -->
            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-4 bg-image bg-overlay-theme-black-60"
                 data-bs-bg="/quarter/img/slider/12.jpg">
                <div class="ltn__slide-item-inner text-left">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-car-dealer-form">
                                    <div class="ltn__car-dealer-form-tab">
                                        <div class="ltn__tab-menu  text-uppercase">
                                            <div class="nav">
                                                @php
                                                    $estate_types = [
                                                         \App\Estate::Buy_Sell => 'خرید',
                                                         \App\Estate::Mortgage_Rent => 'اجاره',
                                                         \App\Estate::Presell => 'پیش فروش',
                                                         \App\Estate::Exchange => 'معاوضه'
                                                    ];
                                                @endphp
                                                @foreach($estate_types as $key=>$type)
                                                    <a
                                                            class="
                                                            @if($key == \App\Estate::Buy_Sell)
                                                                    active show
                                                            @endif
                                                                    tab-type"
                                                            data-bs-toggle="tab"
                                                            href="#ltn__form_tab_1_{{$key}}"><i
                                                                class="fas fa-home"
                                                                data-key="{{$key}}">

                                                        </i>{{$type}} خانه</a>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            @foreach($estate_types as $key=>$type)
                                                <div class="tab-pane fade
                                                @if($key == \App\Estate::Buy_Sell)
                                                        active show
                                                @endif
                                                        " id="ltn__form_tab_1_{{$key}}">
                                                    <div class="car-dealer-form-inner">
                                                        <form action="{{route('search')}}" id="filter_form"
                                                              method="post" class="ltn__car-dealer-form-box row">
                                                            @csrf
                                                            @method('get')
                                                            {{--<div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-4 col-md-6">--}}
                                                            {{--<select class="nice-select" name="usetypesproperty[]">--}}
                                                            {{--@foreach($usetypesproperties as $usetypesproperty)--}}
                                                            {{--<option value="{{$usetypesproperty->id}}">{{$usetypesproperty->title}}</option>--}}
                                                            {{--@endforeach--}}
                                                            {{--</select>--}}
                                                            {{--</div>--}}
                                                            <input type="hidden" name="type" value="0">
                                                            <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-car col-lg-6 col-md-6">
                                                                <select name="province" class="nice-select">
                                                                    @foreach($provinces as $province)
                                                                        <option value="{{$province->id}}">{{$province->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-meter col-lg-6 col-md-6">
                                                                <select name="neighborhoods[]" class="nice-select">
                                                                    @foreach($neighborhoods as $neighborhood)
                                                                        <option value="{{$neighborhood->id}}" data-provine="3{{$neighborhood->id}}">{{$neighborhood->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            {{--<div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-ring col-lg-6 col-md-6">--}}
                                                            {{--<select class="nice-select">--}}
                                                            {{--<option>اتاق خواب</option>--}}
                                                            {{--<option>1</option>--}}
                                                            {{--<option>2</option>--}}
                                                            {{--<option>3</option>--}}
                                                            {{--<option>4</option>--}}
                                                            {{--</select>--}}
                                                            {{--</div>--}}
                                                            <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-cog col-lg-6 col-md-6">
                                                                <div class="input-item input-item-name ltn__custom-icon">
                                                                    <input type="text" name="min_area"
                                                                           placeholder="حداقل متراژ (بر حسب متر)">
                                                                </div>
                                                            </div>
                                                            <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-cog col-lg-6 col-md-6">
                                                                <div class="input-item input-item-name ltn__custom-icon">
                                                                    <input type="text" name="max_area"
                                                                           placeholder="حداکثر متراژ (بر حسب متر)">
                                                                </div>
                                                            </div>
                                                            <div class="car-price-filter-range col-lg-12">
                                                                <div class="price_filter">
                                                                    <div class="price_slider_amount">
                                                                        <input type="submit" value="محدوده قیمت:"/>
                                                                        <input type="text" class="amount" name="price"
                                                                               placeholder="قیمت خود را اضافه کنید"/>
                                                                    </div>
                                                                    <input type="hidden" name="min_total_price"
                                                                           value="{{$extremum['min_total_price']}}">
                                                                    <input type="hidden" name="max_total_price"
                                                                           value="{{$extremum['max_total_price']/2}}">
                                                                    <div class="slider-range"></div>
                                                                </div>
                                                                <div class="btn-wrapper text-center">
                                                                    <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                                                    <button type="submit"
                                                                            class="btn theme-btn-1 btn-effect-1 text-uppercase">
                                                                        جستجو
                                                                        موجودی
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area ltn__product-gutter pt-30 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        {{--<h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">ویژگی</h6>--}}
                        <h1 class="section-title">آخرین آگهی ها</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__product-slider-item-three-active--- slick-arrow-1">
                <!-- ltn__product-item -->
                @if($estates->count() > 0)
                    @include('frontend::layouts.estates')
                @else
                    <p class="text-center">نتیجه ای یافت نشد</p>
                @endif
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->

    <!-- FEATURE AREA START ( Feature - 6) -->
    <div class="ltn__feature-area section-bg-1 pb-90 mb-120---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h6 class="section-subtitle section-subtitle-2 ltn__secondary-color">خدمات ما</h6>
                        <h1 class="section-title">تمرکز اصلی ما</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__custom-gutter--- justify-content-center">
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                        <div class="ltn__feature-icon">
                            <!-- <span><i class="flaticon-house"></i></span> -->
                            <img src="/quarter/img/icons/icon-img/21.png" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">خرید خانه</a></h3>
                            <p>بیش از 1 میلیون+ خانه برای فروش در وب سایت موجود است ، ما می توانیم شما را با خانه ای که
                                می خواهید با آن خانه تماس بگیرید مطابقت دهید.</p>
                            <a class="ltn__service-btn" href="service-details.html">پیدا کردن خانه<i
                                        class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1 active">
                        <div class="ltn__feature-icon">
                            <!-- <span><i class="flaticon-house-3"></i></span> -->
                            <img src="/quarter/img/icons/icon-img/22.png" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">اجاره خانه</a></h3>
                            <p>بیش از 1 میلیون+ خانه برای فروش در وب سایت موجود است ، ما می توانیم شما را با خانه ای که
                                می خواهید با آن خانه تماس بگیرید مطابقت دهید.</p>
                            <a class="ltn__service-btn" href="service-details.html">پیدا کردن خانه<i
                                        class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-6 text-center bg-white  box-shadow-1">
                        <div class="ltn__feature-icon">
                            <!-- <span><i class="flaticon-deal-1"></i></span> -->
                            <img src="/quarter/img/icons/icon-img/23.png" alt="#">
                        </div>
                        <div class="ltn__feature-info">
                            <h3><a href="service-details.html">فروش خانه</a></h3>
                            <p>بیش از 1 میلیون+ خانه برای فروش در وب سایت موجود است ، ما می توانیم شما را با خانه ای که
                                می خواهید با آن خانه تماس بگیرید مطابقت دهید.</p>
                            <a class="ltn__service-btn" href="service-details.html">پیدا کردن خانه<i
                                        class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURE AREA END -->

    <!-- VIDEO AREA START -->
    <div class="ltn__video-popup-area ltn__video-popup-margin--- mb-120">
        <div class="ltn__video-bg-img ltn__video-popup-height-600--- bg-overlay-black-30 bg-image bg-fixed ltn__animation-pulse1"
             data-bs-bg="/quarter/img/bg/19.jpg">
            <a class="ltn__video-icon-2 ltn__video-icon-2-border---"
               href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&amp;showinfo=0"
               data-rel="lightcase:myCollection">
                <i class="fa fa-play"></i>
            </a>
        </div>
    </div>
    <!-- VIDEO AREA END -->

    <!-- CATEGORY AREA START -->
    <div class="ltn__category-area section-bg-1-- ltn__primary-bg before-bg-1 bg-image bg-overlay-theme-black-5--0 pt-115 pb-90 d-none"
         data-bs-bg="/quarter/img/bg/5.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title white-color">Top Categories</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__category-slider-active slick-arrow-1">
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="ltn__category-item ltn__category-item-4 text-center">
                        <div class="ltn__category-item-img">
                            <a href="shop.html">
                                <i class="flaticon-car"></i>
                            </a>
                        </div>
                        <div class="ltn__category-item-name">
                            <h4><a href="shop.html">Parking Space</a></h4>
                        </div>
                        <div class="ltn__category-item-btn">
                            <a href="shop.html"><i class="flaticon-right-arrow"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CATEGORY AREA END -->

    <!-- BRAND LOGO AREA START -->
    <div class="ltn__brand-logo-area ltn__brand-logo-1 section-bg-1 pt-290 pb-110 plr--9 d-none">
        <div class="container-fluid">
            <div class="row ltn__brand-logo-active">
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="/quarter/img/brand-logo/1.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="/quarter/img/brand-logo/2.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="/quarter/img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="/quarter/img/brand-logo/4.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="/quarter/img/brand-logo/5.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__brand-logo-item">
                        <img src="/quarter/img/brand-logo/3.png" alt="Brand Logo">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BRAND LOGO AREA END -->

    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="/quarter/img/1.jpg--">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                        <div class="coll-to-info text-color-white">
                            <h1>به دنبال خانه ای رویایی هستید؟</h1>
                            <p>ما می توانیم به شما در تحقق رویای خانه جدید کمک کنیم</p>
                        </div>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-3 btn-white" href="contact.html">افزودن آگهی</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->

@include("frontend::layouts.footer")


<!-- MODAL AREA START (Quick View Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        @foreach($estates as $estate)
            <div class="modal fade" id="quick_view_modal{{$estate->id}}" tabindex="-1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <!-- <i class="fas fa-times"></i> -->
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="ltn__quick-view-modal-inner">
                                <div class="modal-product-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="modal-product-img">
                                                <div class="imagebox-m">

                                                    @if($estate->main_picture)
                                                        <img
                                                                src="{{$estate->thumbnail_picture()}}"
                                                                alt="" width="100%" height="100%">
                                                    @else
                                                        <img
                                                                src="https://picsum.photos/200/300"
                                                                alt="" width="100%" height="100%">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="modal-product-info">
                                                <div class="product-ratting">
                                                    <ul>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        <li class="review-total"><a href="#"> ( 95 نظر )</a></li>
                                                    </ul>
                                                </div>
                                                <h3>{{$estate->title}}</h3>
                                                <div class="product-price">
                                                    @if($estate->type == \App\Estate::Mortgage_Rent)
                                                        <div>
                                                            <label class="modal-price-text">رهن :</label>
                                                            <span class="price-db">{{number_format($estate->mortgage_price)}}</span>
                                                            <span class="million-t"></span>
                                                        </div>
                                                        <div>
                                                            <label class="modal-price-text">اجاره :</label>
                                                            <span class="price-db">{{number_format($estate->rent_price)}}</span>
                                                            <span class="million-t"></span>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <label class="modal-price-text">قیمت :</label>
                                                            <span class="price-db">{{number_format($estate->total_price)}}</span>
                                                            <span class="million-t"></span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="modal-product-meta ltn__product-details-menu-1">
                                                    <ul>
                                                        <li>
                                                            <strong>نوع کاربری :</strong>
                                                            <span>
                                                        <a href="#">{{$estate->use_type->title}}
                                                            / {{$estate->use_type_property->title}}</a>
                                                    </span>
                                                        </li>
                                                        <li class="metr">
                                                            <strong>متراژ :</strong>
                                                            <span>
                                                        <a href="#">{{$estate->area}}</a>
                                                    </span>
                                                        </li>
                                                        <li>
                                                            <strong>شهر و محله :</strong>
                                                            <span>
                                                        <a href="#">{{$estate->neighborhood->title}}</a>
                                                    </span>
                                                        </li>
                                                        <li>
                                                            <div class="row">

                                                                <div class="col-2">

                                                                    <strong>آدرس :</strong>
                                                                </div>
                                                                <div class="col-10">

                                                                        <span>
                                                                        <a href="#"> {{$estate->address}} </a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <hr>
                                                <div class="ltn__social-media">
                                                    <ul>
                                                        <li>اشتراک گذاری با :</li>
                                                        <li><a href="#" title="Facebook"><i
                                                                        class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li><a href="#" title="Twitter"><i
                                                                        class="fab fa-twitter"></i></a>
                                                        </li>
                                                        <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                                        </li>
                                                        <li><a href="#" title="Instagram"><i
                                                                        class="fab fa-instagram"></i></a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- MODAL AREA END -->


</div>
<!-- Body main wrapper end -->

<!-- preloader area start -->
<div class="preloader d-none" id="preloader">
    <div class="preloader-inner">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<!-- preloader area end -->

<!-- All JS Plugins -->
<script src="/quarter/js/plugins.js"></script>
<!-- Main JS -->
<script src="/quarter/js/main.js"></script>
<script src="/quarter/js/rtl.js"></script>
<script>
    var min_total_price = parseInt("{{$extremum['min_total_price']}}");
    var max_total_price = parseInt("{{$extremum['max_total_price']}}");
    $(".slider-range").slider({
        range: true,
        min: min_total_price,
        max: max_total_price,
        step: 10,
        values: [min_total_price, max_total_price / 2],
        slide: function (event, ui) {
            var x = Number(ui.values[0]).toLocaleString();
            var y = Number(ui.values[1]).toLocaleString();
            $("input[name=min_total_price]").val(x);
            $("input[name=max_total_price]").val(y);
            if (x.length < 5) {
                var curenc_x = " میلیون ";
            } else {
                curenc_x = " میلیارد ";
            }
            if (y.length < 5) {
                var curenc_y = " میلیون تومان ";
            } else {
                curenc_y = " میلیارد تومان ";
            }
            $(".amount").val(" از " + x + curenc_x + " تا " + y + curenc_y);
        }

    });

    var min_unit = (min_total_price < 1000) ? 'میلیون' : 'میلیارد';
    var max_unit = (max_total_price / 2 < 1000) ? 'میلیون' : 'میلیارد';
    $(".amount").val(`از ${min_total_price} ${min_unit} تا ${max_total_price / 2} ${max_unit} تومان`);

    $(".tab-type").on('shown.bs.tab', function (event) {
        $("input[name=type]").val(event.target.firstChild.dataset.key);
    })

</script>
</body>

<!-- Mirrored from maelectrics.com/tf/html/quarter-preview/quarter/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Sep 2021 12:51:01 GMT -->
</html>