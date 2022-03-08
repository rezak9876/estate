@extends('frontend::layouts.master')
@section('content')

    <div class="clearfix"></div>
    <!-- Header Container / End -->


    <!-- Content
    ================================================== -->

    <!-- Map Container -->
    <div class="contact-map margin-bottom-55">

        <!-- Google Maps -->
        <div class="google-map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12964.38905492434!2d51.3405655!3d35.674607!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x966aacaf33f98a7e!2z2LTYsdqp2Kog2LfYsdit2YHYpw!5e0!3m2!1sen!2s!4v1636207986227!5m2!1sen!2s" width="909" height="420" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <!-- Google Maps / End -->

        <!-- Office -->
        <div class="address-box-container">
            <div class="address-container" data-background-image="/findeo/images/our-office.jpg">
                <div class="office-address">
                    <h3>دفتر ما</h3>
                    <ul>
                        <li>{{$setting->address}}</li>
                        <li>تلفن: {{$setting->phone}} </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Office / End -->

    </div>
    <div class="clearfix"></div>
    <!-- Map Container / End -->


    <!-- Container / Start -->
    <div class="container">

        <div class="row">

            <!-- Contact Details -->
            <div class="col-md-4">

                <h4 class="headline margin-bottom-30 text-center">ما را اینجا پیدا کنید</h4>

                <!-- Contact Details -->
                <div class="sidebar-textbox">
                    <p class="text-center">{{$setting->address}}</p>

                    <ul class="contact-details">
                        <li><i class="im im-icon-Phone-2"></i> <strong>تلفن:</strong> <span>{{$setting->phone}} </span></li>
                        <li><i class="im im-icon-Fax"></i> <strong>فکس:</strong> <span>{{$setting->fax}} </span></li>
                        <li><i class="im im-icon-Globe"></i> <strong>سایت:</strong> <span><a href="www.amlak.com">www.amlak.com</a></span></li>
                        <li><i class="im im-icon-Envelope"></i> <strong>ایمیل:</strong> <span><a href="www.email.com">{{$setting->email}}</a></span></li>
                    </ul>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="col-md-8">

                <section id="contact">
                    <h4 class="headline margin-bottom-35 text-center">فرم تماس</h4>

                    <div id="contact-message"></div>

                    <form method="post" action="https://emadrajabi.com/templates/html/findeo/contact.php" name="contactform" id="contactform" autocomplete="on">

                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <input name="name" type="text" id="name" placeholder="نام" required="required" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <input name="email" type="email" id="email" placeholder="ایمیل" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <input name="subject" type="text" id="subject" placeholder="موضوع" required="required" />
                        </div>

                        <div>
                            <textarea name="comments" cols="40" rows="3" id="comments" placeholder="پیام" spellcheck="true" required="required"></textarea>
                        </div>

                        <input type="submit" class="submit button" id="submit" value="ارسال" style="float: left;" />

                    </form>
                </section>
            </div>
            <!-- Contact Form / End -->

        </div>

    </div>
    <!-- Container / End -->



    <!-- Footer
    ================================================== -->
    <div class="margin-top-55"></div>

@endsection
@section('style')
    <link rel="stylesheet" href="/findeo/css/mystyle.css">
@endsection
@section('script')
@endsection