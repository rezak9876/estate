@extends('frontend::layouts.master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>مقایسه کنید</h2>

                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">خانه</a></li>
                        <li>مقایسه کنید</li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>



<!-- Content
================================================== -->
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <!-- Compare List -->
            <div class="compare-list-container">
                <ul id="compare-list">

                    <li class="compare-list-properties">
                        <div class="blank-div"></div>
                        @foreach($estates as $estate)
                        <div>
                            <a href="#">
                                <div class="clp-img">
                                    <img class="thumbnail_picture" src="{{ $estate->thumbnail_picture()}}" alt="">
                                    <span class="remove-from-compare"><i class="fa fa-close"></i></span>
                                </div>

                                <div class="clp-title">
                                    <h4>{{$estate->title}}</h4>
                                    <span>275,000 تومان</span>
                                </div>
                            </a>
                        </div>

                        @endforeach
                    </li>

                    <li>
                        <div>نوع</div>
                        @foreach($estates as $estate)

                        <div>{{$estate->type()}}</div>
                        @endforeach

                    </li>

                    <li>
                        <div>مساحت</div>
                        @foreach($estates as $estate)

                        <div>{{$estate->area}} مترمربع</div>
                        @endforeach

                    </li>

                </ul>
            </div>
            <!-- Compare List / End -->

        </div>
    </div>
</div>


<!-- Footer
================================================== -->
<div class="margin-top-55"></div>

<div id="footer" class="sticky-footer">
    <!-- Main -->
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-6">
                <img class="footer-logo" src="images/logo.png" alt="">
                <br><br>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
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
                    <span>تهران، میدان آزادی</span> <br>
                    تلفن: <span>0210000 </span><br>
                    ایمیل:<span> <a href="#">office@example.com</a> </span><br>
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


@endsection
@section('style')
<link rel="stylesheet" href="/findeo/css/mystyle.css">
<style>
    .chosen-choices {
        float: right;
        width: 100%;
    }

    /*estates*/
    .my-listings-container {
        z-index: 0;
    }

    .grid-layout-three .listing-item {
        float: right !important;
    }

    .listing-img-container {
        height: 165px;
    }

    .listing-title {
        height: 150px;
    }





    @media (max-width: 576px) {
        .search-type label {
            width: 44%;
        }
    }


    .parallax {
        background-position: inherit !important;
        background-repeat: repeat;
    }


    .thumbnail_picture {
        max-height: 100px;
    }

    .clp-img {
        text-align: center !important;
    }
</style>
@endsection
@section('script')
{{--my scipts--}}
<script>
    $('input[name=type]').on('change', function() {
        if (this.value != "{{\Modules\Estate\Entities\Estate::Mortgage_Rent}}") {
            $('#mortgage_rent').addClass('d-none');
            $('#total_price').show();
        } else {
            $('#mortgage_rent').removeClass('d-none');
            $('#total_price').hide();
        }
    });
    $('select[name=province]').on('change', function() {
        province_id = this.value;
        // $('#neighborhoods_form').html('hi')
        $('#neighborhoods_form').children('option').each(function() {
            if (this.dataset.provine == province_id) {
                // console.log(this.dataset.provine)
                $(this).prop('disabled', false);
                $(this).show();
            } else {
                $(this).prop('disabled', true);
                $(this).hide();
            }
            $('#neighborhoods_form').val('').trigger("chosen:updated");
        });
    });
</script>


<script>
    $('.chosen-select-no-single').change(function() {
        console.log($(this).val());
        if ($(this).val().length > 1) {
            // alert('now')
        }
    })
</script>



<!-- comparition -->

<script>
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
<script>
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }


    function add_to_compare(estate_id) {
        let comparison_estates = getCookie('comparison_estates')

        let array;
        if (comparison_estates != '') {
            array = comparison_estates.split(",");
            if (!array.includes(estate_id))
                array.push(estate_id)
            else
                return false;
        } else {
            array = [estate_id];
        }
        let text = array.toString();
        setCookie('comparison_estates', text, 1)

        $.ajax({
            url: "{{route('estate_by_id')}}",
            type: "get",
            data: {
                id: estate_id,
            },
            success: function(response) {
                let estate = response.data
                let price_div
                if (estate.type != "{{\Modules\Estate\Entities\Estate::Mortgage_Rent}}")
                    price_div = `<i>${numberWithCommas(estate.total_price)} تومان</i>`
                else {
                    price_div = `<i> اجاره ${numberWithCommas(estate.rent_price)} تومان</i>`
                    price_div += `<i> رهن ${numberWithCommas(estate.mortgage_price)} تومان</i>`
                }

                let estate_div = `<div class="listing-item compact">
                        <a href="single-property-page-2.html" class="listing-img-container">
                            <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                            <div class="listing-badges">
                                <span>${estate.type_name}</span>
                            </div>
                            <div class="listing-img-content">
                                <span class="listing-compact-title">${estate.title} ${price_div}</span>
                            </div>
                            <img src="${estate.main_picture}" alt="">
                        </a>
                    </div>`;


                $('#comparison-estates').append(estate_div)
            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });

    }


    $(document).ready(function() {
        $.ajax({
            url: "{{route('compare_slide_menu')}}",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                array_id: getCookie('comparison_estates'),
            },
            success: function(response) {
                let estates = response.data
                for (let index in estates) {
                    let estate = estates[index]
                    let price_div
                    if (estate.type != "{{\Modules\Estate\Entities\Estate::Mortgage_Rent}}")
                        price_div = `<i>${numberWithCommas(estate.total_price)} تومان</i>`
                    else {
                        price_div = `<i> اجاره ${numberWithCommas(estate.rent_price)} تومان</i>`
                        price_div += `<i> رهن ${numberWithCommas(estate.mortgage_price)} تومان</i>`
                    }

                    let estate_div = `<div class="listing-item compact">
                        <a href="single-property-page-2.html" class="listing-img-container">
                            <div class="remove-from-compare"><i class="fa fa-close"></i></div>
                            <div class="listing-badges">
                                <span>${estate.type_name}</span>
                            </div>
                            <div class="listing-img-content">
                                <span class="listing-compact-title">${estate.title} ${price_div}</span>
                            </div>
                            <img src="${estate.main_picture}" alt="">
                        </a>
                    </div>`;


                    $('#comparison-estates').append(estate_div)
                }

            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });
    });
</script>
@endsection