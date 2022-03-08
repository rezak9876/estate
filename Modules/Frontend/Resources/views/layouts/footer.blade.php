<footer class="ltn__footer-area  ">
    <div class="footer-top-area  section-bg-2 plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-about-widget">
                        <div class="footer-logo">
                            <div class="site-logo">
                                <img src="{{asset(\App\Setting::PATH_UPLOAD).'/'.$setting->logo}}" alt="Logo">
                            </div>
                        </div>
                        <p>{{$setting->description}}</p>
                        <div class="footer-address">
                            <ul>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-placeholder"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>تهران, میدان ونک, برج نگار, طبقه ۱۳,واحد ۲۲</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-call"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="tel:+0123-456789">09123456789</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="mailto:example@example.com">tarhfa@info.com</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="ltn__social-media mt-20">
                            <ul>
                                <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">شرکت</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="about.html">درباره</a></li>
                                <li><a href="blog.html">بلاگ</a></li>
                                <li><a href="shop.html">تمامی آگهی ها</a></li>
                                <li><a href="locations.html">گوگل مپ</a></li>
                                <li><a href="faq.html">سوالات متداول</a></li>
                                <li><a href="contact.html">تماس با ما</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">سرویس ها</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="order-tracking.html">رهگیری سفارش</a></li>
                                <li><a href="wishlist.html">لیست علاقه مندیها</a></li>
                                <li><a href="login.html">ورود</a></li>
                                <li><a href="account.html">حساب من</a></li>
                                <li><a href="about.html">شرایط و ضوابط </a></li>
                                <li><a href="about.html">پیشنهادات تبلیغاتی</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">مراقبت از مشتری</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="login.html">ورود</a></li>
                                <li><a href="account.html">حساب من</a></li>
                                <li><a href="wishlist.html">لیست علاقه مندیها</a></li>
                                <li><a href="order-tracking.html">رهگیری سفارش</a></li>
                                <li><a href="faq.html">سوالات متداول</a></li>
                                <li><a href="contact.html">تماس با ما</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget footer-newsletter-widget">
                        <div style="width: 100px; height: 100px">
                            {!! $setting->enamad !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
        <div class="container-fluid ltn__border-top-2">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="ltn__copyright-design clearfix">
                        <p>کلیه حقوق محفوظ است @ شرکت <span class="current-year"></span></p>
                    </div>
                </div>
                <div class="col-md-6 col-12 align-self-center">
                    <div class="ltn__copyright-menu text-end">
                        <ul>
                            <li><a href="#">شرایط و ضوابط</a></li>
                            <li><a href="#">مطالبه</a></li>
                            <li><a href="#">سیاست حفظ حریم خصوصی</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>