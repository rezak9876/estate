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
            <div id="mapid" style="height: 100%"></div>
        </div>
        <!-- Google Maps / End -->

        <!-- Office -->
        <div class="address-box-container">
            <div class="address-container" data-background-image="/findeo/images/our-office.jpg">
                <div class="office-address">
                    <h3>دفتر ما</h3>
                    <ul>
                        <li>{{ $setting->address }}</li>
                        <li>تلفن: {{ $setting->phone }} </li>
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
                    <p class="text-center">{{ $setting->address }}</p>

                    <ul class="contact-details">
                        <li><i class="im im-icon-Phone-2"></i> <strong>تلفن:</strong> <span>{{ $setting->phone }} </span>
                        </li>
                        <li><i class="im im-icon-Fax"></i> <strong>فکس:</strong> <span>{{ $setting->fax }} </span></li>
                        <li><i class="im im-icon-Envelope"></i> <strong>ایمیل:</strong> <span><a
                                    href="www.email.com">{{ $setting->email }}</a></span></li>
                    </ul>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="col-md-8">

                <section id="contact">
                    <h4 class="headline margin-bottom-35 text-center">فرم تماس</h4>

                    <div id="contact-message"></div>

                    <form method="post" action="https://emadrajabi.com/templates/html/findeo/contact.php"
                        name="contactform" id="contactform" autocomplete="on">

                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <input name="name" type="text" id="name" placeholder="نام"
                                        required="required" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div>
                                    <input name="email" type="email" id="email" placeholder="ایمیل"
                                        pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$"
                                        required="required" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <input name="subject" type="text" id="subject" placeholder="موضوع" required="required" />
                        </div>

                        <div>
                            <textarea name="comments" cols="40" rows="3" id="comments" placeholder="پیام" spellcheck="true"
                                required="required"></textarea>
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

    <link rel="stylesheet" href="{{ mix('packages/leaflet/leaflet.css') }}" />
@endsection
@section('script')
    <script src="{{ mix('packages/leaflet/leaflet.js') }}"></script>
    <script>
        let latitude = 36.57109473074268;
        let longitude = 52.004266032199205;
        var mymap = L.map("mapid").setView([latitude, longitude], 15);
        L.tileLayer(
            "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: "mapbox/streets-v11",
                tileSize: 512,
                zoomOffset: -1,
                accessToken: "pk.eyJ1IjoiaG9zc3MiLCJhIjoiY2t1MTlnaWViMWh5bDJucWh1Z2p6ZHlsOSJ9.mhgrXXbEhSIfHKGioJh2Xg",
            }
        ).addTo(mymap);

        var myIcon = L.icon({
            iconUrl: "/images/map/marker-icon.png",
            iconRetinaUrl: "/images/map/marker-icon.png",
            iconSize: [30, 40],
            iconAnchor: [10, 40],
            popupAnchor: [0, 0],
            shadowUrl: "/images/map/marker-icon.png",
            shadowRetinaUrl: "/images/map/marker-icon.png",
            shadowSize: [0, 0],
            shadowAnchor: [0, 0],
        });

        var marker = L.marker([latitude, longitude], {
            icon: myIcon
        }).addTo(
            mymap
        );
    </script>
@endsection
