<header class="ltn__header-area ltn__header-5 ltn__header-transparent--- gradient-color-4---">
    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="index-2.html"><img src="{{asset(\App\Setting::PATH_UPLOAD).'/'.$setting->logo}}" alt="Logo"></a>
                        </div>
                        <div class="get-support clearfix d-none">
                            <div class="get-support-icon">
                                <i class="icon-call"></i>
                            </div>
                            <div class="get-support-info">
                                <h6>Get Support</h6>
                                <h4><a href="tel:+123456789">123-456-789-10</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li class="menu-icon"><a href="{{route('index')}}">صفحه اصلی</a>
                                        <!-- <ul class="sub-menu menu-pages-img-show">
                                            <li>
                                                <a href="index-2.html">Home Style 01</a>
                                                <img src="/quarter/img/home-demos/home-1.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-3.html">Home Style 02</a>
                                                <img src="/quarter/img/home-demos/home-2.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-4.html">Home Style 03</a>
                                                <img src="/quarter/img/home-demos/home-3.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-5.html">Home Style 04</a>
                                                <img src="/quarter/img/home-demos/home-4.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-6.html">Home Style 05 <span class="menu-item-badge">video</span></a>
                                                <img src="/quarter/img/home-demos/home-5.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-7.html">Home Style 06</a>
                                                <img src="/quarter/img/home-demos/home-6.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-8.html">Home Style 07</a>
                                                <img src="/quarter/img/home-demos/home-7.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-9.html">Home Style 08</a>
                                                <img src="/quarter/img/home-demos/home-8.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-10.html">Home Style 09</a>
                                                <img src="/quarter/img/home-demos/home-9.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-11.html">Home Style 10 <span class="menu-item-badge">Map</span></a>
                                                <img src="/quarter/img/home-demos/home-10.jpg" alt="#">
                                            </li>
                                            <li>
                                                <a href="index-12.html">Home Style 11</a>
                                                <img src="/quarter/img/home-demos/home-11.jpg" alt="#">
                                            </li>
                                        </ul> -->
                                    </li>
                                    <li class="menu-icon"><a href="#">درباره ما</a>
                                        <ul>
                                            <li><a href="about.html">درباره</a></li>
                                            <li><a href="service.html">سرویس ها</a></li>
                                            <li><a href="team.html">تیم ما</a></li>
                                            <li><a href="locations.html">گوگل مپ</a></li>
                                        </ul>
                                    </li>
                                    {{--<li class="menu-icon"><a href="shop.php">فروشگاه</a></li>--}}
                                    <li><a href="contact.html">تماس با ما</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col ltn__header-options ltn__header-options-2 mb-sm-20">
                    <!-- header-search-1 -->
                    {{--<div class="header-search-wrap">--}}
                        {{--<div class="header-search-1">--}}
                            {{--<div class="search-icon">--}}
                                {{--<i class="icon-search for-search-show"></i>--}}
                                {{--<i class="icon-cancel  for-search-close"></i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="header-search-1-form">--}}
                            {{--<form id="#" method="get" action="#">--}}
                                {{--<input type="text" name="search" value="" placeholder="جستجو کنید ..." />--}}
                                {{--<button type="submit">--}}
                                    {{--<span><i class="icon-search"></i></span>--}}
                                {{--</button>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <!-- user-menu -->
                    <div class="ltn__drop-menu user-menu">
                        <ul>
                            <li>
                                <a href="#"><i class="icon-user"></i></a>
                                <ul>
                                    <li><a href="{{route('login')}}">ورود</a></li>
                                    {{--<li><a href="register.html">ثبت نام</a></li>--}}
                                    {{--<li><a href="account.html">حساب من</a></li>--}}
                                    {{--<li><a href="wishlist.html">علاقه مندی ها</a></li>--}}
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>