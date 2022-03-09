<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from emadrajabi.com/templates/html/findeo/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Nov 2021 08:21:43 GMT -->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>فایندئو</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/findeo/css/style.css">
    <style>
        :root {
            --maincolor: {{$setting->themColor}};
        }
    </style>
    <link rel="stylesheet" href="/findeo/css/color.css">
    <link rel="stylesheet" href="/findeo/css/mystyle.css">

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">


    <!-- Compare Properties Widget
    ================================================== -->
    <div class="compare-slide-menu">

        <div class="csm-trigger"></div>

        <div class="csm-content">
            <h4>مقایسه کنید
                <div class="csm-mobile-trigger"></div>
            </h4>

            <div class="csm-properties">

                <!-- Property -->
                <div class="listing-item compact">
                    <a href="single-property-page-2.html" class="listing-img-container">
                        <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                        <div class="listing-badges">
                            <span>فروشی</span>
                        </div>
                        <div class="listing-img-content">
                            <span class="listing-compact-title">آپارتمان عقاب طلایی <i>420,000 تومان</i></span>
                        </div>
                        <img src="/findeo/images/listing-01.jpg" alt="">
                    </a>
                </div>

                <!-- Property -->
                <div class="listing-item compact">
                    <a href="single-property-page-2.html" class="listing-img-container">
                        <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                        <div class="listing-badges">
                            <span>فروشی</span>
                        </div>
                        <div class="listing-img-content">
                            <span class="listing-compact-title">آپارتمان ویلایی <i>420,000 تومان</i></span>
                        </div>
                        <img src="/findeo/images/listing-03.jpg" alt="">
                    </a>
                </div>

                <!-- Property -->
                <div class="listing-item compact">
                    <a href="single-property-page-2.html" class="listing-img-container">
                        <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                        <div class="listing-badges">
                            <span>فروشی</span>
                        </div>
                        <div class="listing-img-content">
                            <span class="listing-compact-title">ویلا<i>535,000 تومان</i></span>
                        </div>
                        <img src="/findeo/images/listing-05.jpg" alt="">
                    </a>
                </div>

            </div>

            <div class="csm-buttons">
                <a href="compare-properties.html" class="button">مقایسه</a>
                <a href="#" class="button reset">انصراف</a>
            </div>
        </div>

    </div>
    <!-- Compare Properties Widget / End -->


    <!-- Header Container
    ================================================== -->
    <header id="header-container">

        <!-- Topbar -->
        <div id="top-bar">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Top bar -->
                    <ul class="top-bar-menu">
                        <li><i class="fa fa-phone"></i>{{$setting->phone}}</li>
                        <li><i class="fa fa-envelope"></i> <a href="#">{{$setting->email}}</a></li>
                        <li>
                            <div class="top-bar-dropdown">
                                <span>منو کشویی</span>
                                <ul class="options">
                                    <li>
                                        <div class="arrow"></div>
                                    </li>
                                    <li><a href="#">لینک اول</a></li>
                                    <li><a href="#">لینک دوم با عنوان طولانی</a></li>
                                    <li><a href="#">لینک سوم</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
                <!-- Left Side Content / End -->


                <!-- Left Side Content -->
                <div class="right-side">

                    <!-- Social Icons -->
                    <ul class="social-icons">
                        @if($setting->socialTelegram)
                        <li><a class="facebook" href="{{$setting->socialTelegram}}"><i class="icon-facebook"></i></a></li>
                        @endif
                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                        <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                        <li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>
                    </ul>

                </div>
                <!-- Left Side Content / End -->

            </div>
        </div>
        <div class="clearfix"></div>
        <!-- Topbar / End -->


        <!-- Header -->
        <div id="header">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="index-2.html"><img src="{{\App\Setting::PATH_UPLOAD.$setting->logo}}" alt="" width="128px" height="43px"></a>
                    </div>


                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                        </button>
                    </div>


                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">

                            <li><a class="current" href="#">خانه</a>
                                <ul>
                                    <li><a href="index-2.html">خانه 1</a></li>
                                    <li><a href="index-3.html">خانه 2</a></li>
                                    <li><a href="index-4.html">خانه 3</a></li>
                                    <li><a href="index-5.html">خانه 4</a></li>
                                </ul>
                            </li>

                            <li><a href="#">آگهی ها</a>
                                <ul>
                                    <li><a href="#">طرح فهرستی</a>
                                        <ul>
                                            <li><a href="listings-list-with-sidebar.html">با ستون کناری</a></li>
                                            <li><a href="listings-list-with-map.html">با نقشه</a></li>
                                            <li><a href="listings-list-full-width.html">تمام عرض</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">طرح گرید</a>
                                        <ul>
                                            <li><a href="listings-grid-standard-with-sidebar.html">استاندارد با ستون
                                                    کناری</a></li>
                                            <li><a href="listings-grid-compact-with-sidebar.html">جمع و جور با ستون
                                                    کناری</a></li>
                                            <li><a href="listings-grid-with-map.html">با نقشه</a></li>
                                            <li><a href="listings-grid-full-width.html">تمام عرض</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">با نقشه</a>
                                        <ul>
                                            <li><a href="listings-half-map-list.html">فهرستی</a></li>
                                            <li><a href="listings-half-map-grid-standard.html">گرید استاندارد</a></li>
                                            <li><a href="listings-half-map-grid-compact.html">گرید جمع و جور</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="#">ویژگی ها</a>
                                <ul>
                                    <li><a href="#">توضیحات ملک</a>
                                        <ul>
                                            <li><a href="single-property-page-1.html">سبک 1</a></li>
                                            <li><a href="single-property-page-2.html">سبک 2</a></li>
                                            <li><a href="single-property-page-3.html">سبک 3</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">سبک های جست و جو</a>
                                        <ul>
                                            <li><a href="index-2.html">جست و جو در صفحه اصلی 1</a></li>
                                            <li><a href="index-3.html">جست و جو در صفحه اصلی 2</a></li>
                                            <li><a href="index-4.html">جست و جو در صفحه اصلی 3</a></li>
                                            <li><a href="listings-list-full-width.html">سبک پیشرفته</a></li>
                                            <li><a href="listings-list-with-sidebar.html">جست و جو در ستون کناری</a>
                                        </ul>
                                    </li>
                                    <li><a href="#">حساب کاربری من</a>
                                        <ul>
                                            <li><a href="my-profile.html">پروفایل من</a></li>
                                            <li><a href="my-bookmarks.html">آگهی های مورد علاقه</a></li>
                                            <li><a href="my-properties.html">املاک من</a></li>
                                            <li><a href="change-password.html">تغییر رمز عبور</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">مشاوران و آژانس ها</a>
                                        <ul>
                                            <li><a href="agencies-list.html">لیست آژانس ها</a></li>
                                            <li><a href="agency-page.html">برگه آژانس</a></li>
                                            <li><a href="agents-list.html">لیست مشاوران</a></li>
                                            <li><a href="agent-page.html">برگه مشاور</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="compare-properties.html">مقایسه ویژگی ها</a></li>
                                    <li><a href="submit-property.html">ثبت ملک</a></li>
                                </ul>
                            </li>

                            <li><a href="#">برگه ها</a>
                                <ul>
                                    <li><a href="blog.html">وبلاگ</a>
                                        <ul>
                                            <li><a href="blog.html">وبلاگ</a></li>
                                            <li><a href="blog-post.html">نوشته وبلاگ</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">تماس</a></li>
                                    <li><a href="elements.html">عناصر</a></li>
                                    <li><a href="pricing-tables.html">جداول قیمت گذاری</a></li>
                                    <li><a href="typography.html">تایپوگرافی</a></li>
                                    <li><a href="icons.html">آیکون ها</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->

                <!-- Right Side Content / End -->
                <div class="right-side">
                    <!-- Header Widget -->
                    <div class="header-widget">
                        <a href="{{route('login')}}" class="sign-in"><i class="fa fa-user"></i> ورود / ثبت نام</a>
                        <a href="submit-property.html" class="button border">ثبت ملک</a>
                    </div>
                    <!-- Header Widget / End -->
                </div>
                <!-- Right Side Content / End -->

            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->


    <!-- Banner
    ================================================== -->
    <div class="parallax" data-background="/findeo/images/home-parallax.jpg" data-color="#36383e"
         data-color-opacity="0.45"
         data-img-width="2500" data-img-height="1600">
        <div class="parallax-content">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Main Search Container -->
                        <div class="main-search-container">
                            <h2>خانه ی رویایی خود را پیدا کنید</h2>

                            <!-- Main Search -->
                            <form action="{{route('search')}}" id="filter_form"
                                  method="post" class="main-search-form">
                            @csrf
                            @method('get')
                            <!-- Type -->
                                <div class="search-type">
                                    <label class="active"><input class="first-tab" name="type" checked="checked"
                                                                 type="radio" value="0">خرید و فروش</label>
                                    <label><input name="type" type="radio" value="1">رهن و اجاره</label>
                                    <label><input name="type" type="radio" value="2">پیش فروش</label>
                                    <label><input name="type" type="radio" value="3">معاوضه</label>
                                    <div class="search-type-arrow"></div>
                                </div>


                                <!-- Box -->
                                <div class="main-search-box">
                                    <!-- Row -->
                                    <div class="row with-forms">

                                        <!-- Property Type -->
                                        <div class="col-md-6">
                                            <select name="province"
                                                    class="chosen-select-no-single">
                                                @foreach($provinces as $province)
                                                    <option value="{{$province->id}}">{{$province->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <!-- Min Price -->
                                        <div class="col-md-6">

                                            <!-- Select Input -->
                                            <div class="select-input">
                                                <select name="neighborhoods[]" id="neighborhoods_form"
                                                        data-placeholder="محله را انتخاب کنید"
                                                        class="chosen-select-no-single" multiple>
                                                    @foreach($neighborhoods as $neighborhood)
                                                        <option value="{{$neighborhood->id}}"
                                                                data-provine="{{$neighborhood->province->id}}" {{$neighborhood->is_disabled(1)}}>{{$neighborhood->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- Select Input / End -->

                                        </div>
                                    </div>
                                    <!-- Row -->
                                    <div class="row with-forms">

                                        <!-- Property Type -->
                                        <div class="col-md-6">
                                            <div class="range-slider">
                                                <label>متراژ</label>
                                                <div class="findeo-range" data-name="area" data-min="{{$extremum['min_area']}}"
                                                     data-max="{{$extremum['max_area']}}"
                                                     data-unit="مترمربع" data-step="10"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>


                                        <!-- Min Price -->
                                        <div class="col-md-6">

                                            <div class="range-slider">
                                                <label>سال ساخت</label>
                                                <div class="findeo-range" data-name="year_of_construction" data-min="0"
                                                     data-max="1500"
                                                     data-unit="سال" data-step="1"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row -->
                                    <div class="row with-forms">

                                        <div id="total_price">

                                            <!-- Min Price -->

                                            <div class="range-slider">
                                                <label class="text-center">قیمت</label>
                                                <div class="findeo-range" data-name="rent_price" data-min="{{$extremum['min_total_price']}}"
                                                     data-max="{{$extremum['max_total_price']}}"
                                                     data-unit="تومان" data-step="10"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div id="mortgage_rent" class="d-none">
                                            <!-- Property Type -->
                                            <div class="col-md-6">
                                                <div class="range-slider">
                                                    <label>رهن</label>
                                                    <div class="findeo-range" data-name="mortgage_price" data-min="{{$extremum['min_mortgage_price']}}"
                                                         data-max="{{$extremum['max_mortgage_price']}}"
                                                         data-unit="تومان" data-step="10"></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>


                                            <!-- Min Price -->
                                            <div class="col-md-6">

                                                <div class="range-slider">
                                                    <label>اجاره</label>
                                                    <div class="findeo-range" data-name="rent_price" data-min="{{$extremum['min_rent_price']}}"
                                                         data-max="{{$extremum['max_rent_price']}}"
                                                         data-unit="تومان" data-step="10"></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row -->
                                    <div class="row with-forms">

                                        <!-- Property Type -->
                                        <div class="col-md-9">
                                            <!-- More Search Options -->
                                            <a href="#" class="more-search-options-trigger"
                                               data-open-title="گزینه های بیشتر"
                                               data-close-title="بستن"></a>
                                        </div>


                                        <!-- Min Price -->
                                        <div class="col-md-3">

                                            <!-- Select Input -->
                                            <button class="button">جست و جو</button>
                                            <!-- Select Input / End -->

                                        </div>

                                    </div>
                                    <!-- Row / End -->


                                    <div class="more-search-options">
                                        <div class="more-search-options-container">

                                            <!-- Row -->
                                            <div class="row with-forms">

                                                <!-- Min Price -->
                                                <div class="col-md-6">

                                                    <!-- Select Input -->
                                                    <div class="select-input">
                                                        <select name="usetypeproperties[]"
                                                                data-placeholder="نوع را انتخاب کنید"
                                                                class="chosen-select-no-single" multiple>
                                                            @foreach($usetypes as $usetype)
                                                                <optgroup label="{{$usetype->title}}">
                                                                    @foreach($usetype->usetypeproperties as $usetypeproperty)
                                                                        <option value="{{$usetypeproperty->id}}">{{$usetypeproperty->title}}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <!-- Select Input / End -->

                                                </div>

                                                <!-- Max Price -->
                                                <div class="col-md-6">

                                                    {{--<!-- Select Input -->--}}
                                                    {{--<div class="select-input">--}}
                                                    {{--<input type="text" placeholder="حداکثر مساحت"--}}
                                                    {{--data-unit="متر مربع">--}}
                                                    {{--</div>--}}
                                                    {{--<!-- Select Input / End -->--}}

                                                </div>

                                            </div>
                                            <!-- Row / End -->

                                            <div class="row">
                                                <!-- Min Price -->
                                                @foreach($facilities as $facility)
                                                    @if($facility->type == \App\Facility::Integer)
                                                        <div class="col-md-6">
                                                            <div class="range-slider">
                                                                <label>{{$facility->title}}</label>
                                                                <div class="findeo-range"
                                                                     data-name="facility[{{$facility->id}}]"
                                                                     data-min="{{$extremum['min_facility'][$facility->id]}}"
                                                                     data-max="{{$extremum['max_facility'][$facility->id]}}"
                                                                     data-unit="" data-step="1"></div>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>

                                                    @endif
                                                @endforeach
                                            </div>
                                            <!-- Checkboxes -->
                                            <div class="checkboxes in-row">
                                                <h5>امکانات</h5>
                                                @foreach($facilities as $facility)
                                                    @if($facility->type == \App\Facility::Check_box)
                                                        <input name="check_box_facility[{{$facility->id}}]"
                                                               id="facilitycheckbox{{$facility->id}}"
                                                               type="checkbox">
                                                        <label for="facilitycheckbox{{$facility->id}}">{{$facility->title}}</label>
                                                    @endif
                                                @endforeach

                                            </div>
                                            <!-- Checkboxes / End -->

                                            <!-- Checkboxes -->
                                            <div class="checkboxes in-row">
                                                <h5>شرایط</h5>
                                                @foreach($terms as $term)
                                                    <input name="terms[{{$term->id}}]" id="termcheckbox{{$term->id}}"
                                                           type="checkbox">
                                                    <label for="termcheckbox{{$term->id}}">{{$term->title}}</label>
                                                @endforeach

                                            </div>
                                            <!-- Checkboxes / End -->

                                        </div>
                                    </div>
                                    <!-- More Search Options / End -->


                                </div>
                                <!-- Box / End -->

                            </form>
                            <!-- Main Search -->

                        </div>
                        <!-- Main Search Container / End -->

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline margin-bottom-25 margin-top-65">تازه ها</h3>
            </div>

            <!-- Carousel -->
            <div class="col-md-12">
                <div class="carousel">

                    <!-- Listing Item -->
                    @foreach($estates as $estate)
                        <div class="carousel-item">
                            <div class="listing-item">

                                <a href="single-property-page-1.html" class="listing-img-container">

                                    <div class="listing-badges">
                                        <span class="featured">ویژه</span>
                                        <span>{{$estate->type()}}</span>
                                    </div>

                                    <div class="listing-img-content">
                                        @if($estate->type == \App\Estate::Mortgage_Rent)
                                            <span class="listing-price">{{number_format($estate->mortgage_price)}} رهن  + {{number_format($estate->rent_price)}}
                                                اجاره<i>ماهیانه</i></span>
                                        @else
                                            <span class="listing-price">{{number_format($estate->total_price)}}
                                                تومان <i>ماهیانه</i></span>
                                        @endif
                                        <span class="like-icon with-tip" data-tip-content="افزودن به بوک مارک"></span>
                                        <span class="compare-button with-tip"
                                              data-tip-content="افزودن برای مقایسه"></span>
                                    </div>
                                    <img src=
                                    @if($estate->main_picture)
                                        {{\App\Gallery::$prefix_images .$estate->main_picture }}
                                    @else
                                        "/findeo/images/listing-03.jpg"
                                    @endif
                                     alt="" width="333px" height="254px">

                                </a>

                                <div class="listing-content">

                                    <div class="listing-title">
                                        <h4><a href="single-property-page-1.html">{{$estate->title}}</a></h4>
                                        <a href="#"
                                           class="listing-address popup-gmaps">
                                            <i class="fa fa-map-marker"></i>
                                            {{$estate->address}}
                                        </a>
                                    </div>

                                    <ul class="listing-features">
                                        <li>متراژ <span>{{$estate->area}} متر مربع</span></li>
                                        <li>سال ساخت <span>{{$estate->year_of_construction}}</span></li>
                                        {{--<li>حمام <span>3</span></li>--}}
                                    </ul>

                                    <div class="listing-footer">
                                        <a href="#"><i class="fa fa-eye"></i>{{$estate->views}}</a>
                                        <span><i class="fa fa-calendar-o"></i>{{verta($estate->updated_at)->formatDifference()}}</span>
                                        {{--<span><i class="fa fa-calendar-o"></i>{{$estate->updated_at}}</span>--}}
                                    </div>

                                </div>
                                <!-- Listing Item / End -->

                            </div>
                        </div>
                @endforeach
                <!-- Listing Item / End -->

                </div>
            </div>
            <!-- Carousel / End -->

        </div>
    </div>


    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-105" data-background-color="#f7f7f7">

        <!-- Box Headline -->
        <h3 class="headline-box">به دنبال چه چیزی می گردید؟</h3>

        <!-- Content -->
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Office"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">فروشی</a>
                                <a href="listings-grid-standard-with-sidebar.html">اجاره ی</a>
                            </div>
                        </div>

                        <h3>آپارتمان</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Home-2"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">فروشی</a>
                                <a href="listings-grid-standard-with-sidebar.html">اجاره ی</a>
                            </div>
                        </div>

                        <h3>خانه</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>

                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Car-3"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">فروشی</a>
                                <a href="listings-grid-standard-with-sidebar.html">اجاره ی</a>
                            </div>
                        </div>

                        <h3>اتومبیل</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="im im-icon-Clothing-Store"></i>
                            <div class="icon-links">
                                <a href="listings-grid-standard-with-sidebar.html">فروشی</a>
                                <a href="listings-grid-standard-with-sidebar.html">اجاره ی</a>
                            </div>
                        </div>

                        <h3>فروشگاه</h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->


    <!-- Container -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-35 margin-top-10">محبوب ترین مکان ها <span>املاک در محبوب ترین مکان ها</span>
                </h3>
            </div>

            <div class="col-md-4">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box"
                   data-background-image="/findeo/images/popular-location-01.jpg">

                    <!-- Badge -->
                    <div class="listing-badges">
                        <span class="featured">ویژه</span>
                    </div>

                    <div class="img-box-content visible">
                        <h4>اصفهان </h4>
                        <span>14 ملک</span>
                    </div>
                </a>

            </div>

            <div class="col-md-8">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box"
                   data-background-image="/findeo/images/popular-location-02.jpg">
                    <div class="img-box-content visible">
                        <h4>تهران</h4>
                        <span>24 ملک</span>
                    </div>
                </a>

            </div>

            <div class="col-md-8">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box"
                   data-background-image="/findeo/images/popular-location-03.jpg">
                    <div class="img-box-content visible">
                        <h4>شهرکرد</h4>
                        <span>9 ملک</span>
                    </div>
                </a>

            </div>

            <div class="col-md-4">

                <!-- Image Box -->
                <a href="listings-list-with-sidebar.html" class="img-box"
                   data-background-image="/findeo/images/popular-location-04.jpg">
                    <div class="img-box-content visible">
                        <h4>مشهد </h4>
                        <span>12 ملک</span>
                    </div>
                </a>

            </div>

        </div>
    </div>
    <!-- Container / End -->


    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-95 margin-bottom-0">

        <!-- Box Headline -->
        <h3 class="headline-box">مقالات و نکته ها</h3>

        <div class="container">
            <div class="row">

                <div class="col-md-4">

                    <!-- Blog Post -->
                    <div class="blog-post">

                        <!-- Img -->
                        <a href="blog-post.html" class="post-img">
                            <img src="/findeo/images/blog-post-01.jpg" alt="">
                        </a>

                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="#">مقاله شماره 1</a></h3>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است.</p>

                            <a href="blog-post.html" class="read-more">ادامه <i class="fa fa-angle-left"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->

                </div>

                <div class="col-md-4">

                    <!-- Blog Post -->
                    <div class="blog-post">

                        <!-- Img -->
                        <a href="blog-post.html" class="post-img">
                            <img src="/findeo/images/blog-post-02.jpg" alt="">
                        </a>

                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="#">مقاله شماره 2</a></h3>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است.</p>

                            <a href="blog-post.html" class="read-more">ادامه <i class="fa fa-angle-left"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->

                </div>

                <div class="col-md-4">

                    <!-- Blog Post -->
                    <div class="blog-post">

                        <!-- Img -->
                        <a href="blog-post.html" class="post-img">
                            <img src="/findeo/images/blog-post-03.jpg" alt="">
                        </a>

                        <!-- Content -->
                        <div class="post-content">
                            <h3><a href="#">مقاله شماره 3</a></h3>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است.</p>

                            <a href="blog-post.html" class="read-more">ادامه <i class="fa fa-angle-left"></i></a>
                        </div>

                    </div>
                    <!-- Blog Post / End -->

                </div>

            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->


    <!-- Flip banner -->
    <a href="listings-half-map-grid-standard.html" class="flip-banner parallax"
       data-background="/findeo/images/flip-banner-bg.jpg" data-color="var(--maincolor)" data-color-opacity="0.9"
       data-img-width="2500"
       data-img-height="1600">
        <div class="flip-banner-content">
            <h2 class="flip-visible">ما به مردم و خانه ها کمک می کنیم که همدیگر را پیدا کنند :)</h2>
            <h2 class="flip-hidden">مشاهده املاک <i class="sl sl-icon-arrow-left"></i></h2>
        </div>
    </a>
    <!-- Flip banner / End -->


    <!-- Footer
    ================================================== -->
    <div id="footer" class="sticky-footer">
        <!-- Main -->
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <img class="footer-logo" src="{{\App\Setting::PATH_UPLOAD.$setting->logo}}" alt="" width="128px" height="43px">
                    <br><br>
                    <p>{{$setting->description}}</p>
                </div>

                <div class="col-md-4 col-sm-6 ">
                    <h4>پیوندهای مفید</h4>
                    <ul class="footer-links">
                        <li><a href="#">ورود</a></li>
                        <li><a href="#">ثبت نام</a></li>
                        <li><a href="#">حساب کاربری من</a></li>
                        <li><a href="#">ثبت ملک</a></li>
                        <li><a href="#">تعرفه</a></li>
                        <li><a href="#">حریم خصوصی</a></li>
                    </ul>

                    <ul class="footer-links">
                        <li><a href="#">پرسش های متداول</a></li>
                        <li><a href="#">وبلاگ</a></li>
                        <li><a href="#">مشاوران ما</a></li>
                        <li><a href="#">نحوه ی کار</a></li>
                        <li><a href="#">تماس</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-3  col-sm-12">
                    <h4>تماس با ما</h4>
                    <div class="text-widget">
                        <span>{{$setting->address}}</span> <br>
                        تلفن: <span>{{$setting->phone}}</span><br>
                        ایمیل:<span> <a href="#">{{$setting->email}}</a> </span><br>
                    </div>

                    <ul class="social-icons margin-top-20">
                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                        <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                        <li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
                    </ul>

                </div>

            </div>

            <!-- Copyright -->
            <div class="row">
                <div class="col-md-12">
                    <div class="copyrights">کپی رایت 1399 © تمامی حقوق برای Findeo محفوظ است.</div>
                </div>
            </div>

        </div>

    </div>
    <!-- Footer / End -->


    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>


    <!-- Scripts
    ================================================== -->
    <script type="text/javascript" src="/findeo/scripts/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/jquery-migrate-3.1.0.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/chosen.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/magnific-popup.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/owl.carousel.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/rangeSlider.js"></script>
    <script type="text/javascript" src="/findeo/scripts/sticky-kit.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/slick.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/masonry.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/mmenu.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/tooltips.min.js"></script>
    <script type="text/javascript" src="/findeo/scripts/custom.js"></script>

    {{--my scipts--}}
    <script>
        $('input[name=type]').on('change', function () {
            if (this.value != "{{\App\Estate::Mortgage_Rent}}") {
                $('#mortgage_rent').hide();
                $('#total_price').show();
            }
            else {
                $('#mortgage_rent').show();
                $('#total_price').hide();

            }
        });
        $('select[name=province]').on('change', function () {
            province_id = this.value;
            // $('#neighborhoods_form').html('hi')
            $('#neighborhoods_form').children('option').each(function () {
                if (this.dataset.provine == province_id) {
                    // console.log(this.dataset.provine)
                    $(this).prop('disabled', false);
                }
                else {
                    $(this).prop('disabled', true);
                }
                $('#neighborhoods_form').val('').trigger("chosen:updated");
            });
        });
    </script>
</div>
<!-- Wrapper / End -->


</body>

<!-- Mirrored from emadrajabi.com/templates/html/findeo/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Nov 2021 08:21:57 GMT -->
</html>
