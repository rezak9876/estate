@extends('frontend::layouts.master')
@section('content')


    <div class="clearfix"></div>
    <!-- Header Container / End -->


    <!-- Banner
    ================================================== -->
    <div class="parallax" data-background="{{'/'.\Modules\Setting\Entities\Setting::PATH_UPLOAD.$setting->main_page_pic}}"
         data-color="#36383e"
         data-color-opacity="0.45"
         data-img-width="2500" data-img-height="1600">
        <div class="parallax-content" style="padding: 0;">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Main Search Container -->
                        <div class="main-search-container">
                            <h2 class="text-center">خانه ی رویایی خود را پیدا کنید</h2>

                            <!-- Main Search -->
                            <form action="{{route('search')}}" id="filter_form"
                                  method="post" class="main-search-form">
                            @csrf
                            @method('get')
                            <!-- Type -->
                                <div class="text-center">
                                    <div class="search-type">
                                        <label class="active" ><input class="first-tab" name="type" checked="checked"
                                                                      type="radio" value="0">خرید و فروش</label>
                                        <label><input name="type" type="radio" value="1">رهن و اجاره</label>
                                        <label><input name="type" type="radio" value="2">پیش فروش</label>
                                        <label><input name="type" type="radio" value="3">معاوضه</label>
                                        <div class="search-type-arrow"></div>
                                    </div>
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
                                                <div class="findeo-range" data-name="area"
                                                     data-min="{{$extremum['min_area']}}"
                                                     data-max="{{$extremum['max_area']}}"
                                                     data-unit="مترمربع" data-step="10"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>


                                        <!-- Min Price -->
                                        <div class="col-md-6">

                                            <div class="range-slider">
                                                <label>سال ساخت</label>
                                                <div class="findeo-range" data-name="year_of_construction"
                                                     data-min="{{$extremum['min_year_of_construction']}}"
                                                     data-max="{{$extremum['max_year_of_construction']}}"
                                                     data-unit="" data-step="1"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row -->
                                    <div class="row with-forms">

                                        <div id="total_price" style="width: 100%">

                                            <!-- Min Price -->

                                            <div class="range-slider">
                                                <label class="text-center">قیمت</label>
                                                <div class="findeo-range" data-name="total_price"
                                                     data-min="{{$extremum['min_total_price']}}"
                                                     data-max="{{$extremum['max_total_price']}}"
                                                     data-unit="میلیون تومان" data-step="10"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div id="mortgage_rent" class="d-none" style="width: 100%">
                                            <!-- Property Type -->
                                            <div class="col-md-6">
                                                <div class="range-slider">
                                                    <label>رهن</label>
                                                    <div class="findeo-range" data-name="mortgage_price"
                                                         data-min="{{$extremum['min_mortgage_price']}}"
                                                         data-max="{{$extremum['max_mortgage_price']}}"
                                                         data-unit="میلیون تومان" data-step="10"></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>


                                            <!-- Min Price -->
                                            <div class="col-md-6">

                                                <div class="range-slider">
                                                    <label>اجاره</label>
                                                    <div class="findeo-range" data-name="rent_price"
                                                         data-min="{{$extremum['min_rent_price']}}"
                                                         data-max="{{$extremum['max_rent_price']}}"
                                                         data-unit="میلیون تومان" data-step="10"></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="more-search-options d-none" style="position: inherit">
                                        <div class="more-search-options-container" style="padding: inherit;box-shadow: none">

                                            <!-- Row -->

                                                <!-- Min Price -->
                                                <div class="col-md-6">

                                                    <!-- Select Input -->
                                                    <div class="select-input">
                                                        <label style="color:#333;">انتخاب نوع</label>
                                                        <select name="usetypeproperties[]"
                                                                data-placeholder="نوع را انتخاب کنید"
                                                                placeholder="نوع را انتخاب کنید"
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

                                            <!-- Row / End -->

                                            <div class="row">
                                                <!-- Min Price -->
                                                @foreach($facilities as $facility)
                                                    @if($facility->type == \Modules\Facility\Entities\Facility::Integer)
                                                            <div class="range-slider" style="width: 100%;">
                                                                <label>{{$facility->title}}</label>
                                                                <div class="findeo-range"
                                                                     data-name="facility[{{$facility->id}}]"
                                                                     data-min="{{$extremum['min_facility'][$facility->id]}}"
                                                                     data-max="{{$extremum['max_facility'][$facility->id]}}"
                                                                     data-unit="" data-step="1"></div>
                                                                <div class="clearfix"></div>
                                                            </div>

                                                    @endif
                                                @endforeach
                                            </div>
                                            <!-- Checkboxes -->
                                            <div class="checkboxes in-row">

                                                <h5>امکانات</h5>
                                                @foreach($facilities as $facility)
                                                    @if($facility->type == \Modules\Facility\Entities\Facility::Check_box)
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
                                                    <input name="terms[{{$term->id}}]"
                                                           id="termcheckbox{{$term->id}}"
                                                           type="checkbox">
                                                    <label for="termcheckbox{{$term->id}}">{{$term->title}}</label>
                                                @endforeach
                                            </div>
                                            <!-- Checkboxes / End -->

                                        </div>
                                    </div>
                                    <!-- More Search Options / End -->

                                    <!-- Row -->
                                    <div class="row with-forms">

                                        <div style="display: flex;justify-content: space-between;width: 100%;">
                                            <!-- Property Type -->
                                            <div >
                                                <!-- More Search Options -->
                                                <a class="more-search-options-trigger"
                                                   data-open-title="گزینه های بیشتر"
                                                   data-close-title="بستن"></a>
                                            </div>


                                            <!-- Min Price -->
                                            <div >

                                                <!-- Select Input -->
                                                <button class="button" id="more_option">جست و جو</button>
                                                <!-- Select Input / End -->

                                            </div>
                                        </div>



                                    </div>
                                    <!-- Row / End -->

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

            <div class="col-md-12 text-center">
                <h3 class="headline margin-bottom-25 margin-top-65">تازه ها</h3>
            </div>


            <div class="my-listings-container grid-layout-three" style="padding-right: 1rem; padding-left:1rem;">

            @foreach($estates as $estate)
                <!-- Listing Item -->
                    <div class="listing-item">

                        <a href="{{route('show',$estate->slug)}}" class="listing-img-container" style="height: auto;">

                            <div class="listing-badges">
                                @if($estate->special)
                                    <span class="featured">ویژه</span>
                                @endif
                                <span>{{$estate->type()}}</span>
                            </div>

                            <div class="listing-img-content d-flex align-items-center" style="background-color: rgba(74,74,76,0.7);">
                                @if($estate->type == \Modules\Estate\Entities\Estate::Mortgage_Rent)
                                    <span class="listing-price">{{number_format($estate->mortgage_price)}}
                                        رهن  +
                                        <br>
                                        {{number_format($estate->rent_price)}}
                                        اجاره</span>
                                @else
                                    <span class="listing-price">{{number_format($estate->total_price)}}
                                        تومان </span>
                                @endif
                            </div>

                            <img src=
                                 @if($estate->main_picture)
                                 {{$estate->thumbnail_picture()}}
                                 @else
                                         "/findeo/images/listing-03.jpg"
                                 @endif
                                 alt="" style="height: 260px;">

                        </a>

                        <div class="listing-content">

                            <div class="listing-title">
                                <h4><a href="{{route('show',$estate->slug)}}">
                                        @if(strlen($estate->title)<120)
                                            {{$estate->title}}
                                        @else
                                            {{$estate->title}}
                                        @endif

                                    </a></h4>
                                <a href="{{route('show',$estate->slug)}}">
                                    <i class="fa fa-map-marker"></i>
                                    @if($estate->neighborhood->title)
                                        {{$estate->neighborhood->title}}
                                    @else
                                        {{substr($estate->address,30).'...'}}
                                    @endif
                                </a>

                                {{--<a href="single-property-page-1.html" class="details button border">جزئیات</a>--}}
                            </div>

                            <ul class="listing-details">
                                <li>متراژ <span>{{$estate->area}} متر مربع</span></li>
                                <li>سال ساخت <span>{{$estate->year_of_construction}}</span></li>
                            </ul>

                            <div class="listing-footer">
                                <a href="{{route('show',$estate->slug)}}"><i
                                            class="fa fa-eye"></i>{{$estate->views}}</a>
                                <span><i class="fa fa-calendar-o"></i>{{verta($estate->updated_at)->formatDifference()}}</span>
                            </div>

                        </div>
                        <!-- Listing Item / End -->

                    </div>
                {{--<div class="clearfix"></div>--}}
                <!-- Listing Item / End -->
                @endforeach

            </div>


            <!-- Carousel -->
        {{--<div class="col-md-12">--}}
        {{--<div class="carousel">--}}

        {{--<!-- Listing Item -->--}}
        {{--@foreach($estates as $estate)--}}
        {{--<div class="carousel-item">--}}
        {{--<div class="listing-item">--}}

        {{--<a href="{{route('show',$estate->slug)}}" class="listing-img-container">--}}

        {{--<div class="listing-badges">--}}
        {{--@if($estate->special)--}}
        {{--<span class="featured">ویژه</span>--}}
        {{--@endif--}}
        {{--<span>{{$estate->type()}}</span>--}}
        {{--</div>--}}

        {{--<div class="listing-img-content">--}}
        {{--@if($estate->type == \Modules\Estate\Entities\Estate::Mortgage_Rent)--}}
        {{--<span class="listing-price">{{number_format($estate->mortgage_price)}} رهن  + {{number_format($estate->rent_price)}}--}}
        {{--اجاره<i>ماهیانه</i></span>--}}
        {{--@else--}}
        {{--<span class="listing-price">{{number_format($estate->total_price)}}--}}
        {{--تومان <i>ماهیانه</i></span>--}}
        {{--@endif--}}

        {{--</div>--}}
        {{--<img src=--}}
        {{--@if($estate->main_picture)--}}
        {{--{{$estate->thumbnail_picture()}}--}}
        {{--@else--}}
        {{--"/findeo//findeo/images/listing-03.jpg"--}}
        {{--@endif--}}
        {{--alt="" width="333px" height="254px">--}}

        {{--</a>--}}

        {{--<div class="listing-content">--}}

        {{--<div class="listing-title">--}}
        {{--<h4><a href="{{route('show',$estate->slug)}}">{{$estate->title}}</a></h4>--}}
        {{--<a href="{{route('show',$estate->slug)}}"--}}
        {{--class="listing-address popup-gmaps">--}}
        {{--<i class="fa fa-map-marker"></i>--}}
        {{--{{$estate->neighborhood->title}}--}}
        {{--</a>--}}
        {{--</div>--}}

        {{--<ul class="listing-features">--}}
        {{--<li>متراژ <span>{{$estate->area}} متر مربع</span></li>--}}
        {{--<li>سال ساخت <span>{{$estate->year_of_construction}}</span></li>--}}
        {{--<li>حمام <span>3</span></li>--}}
        {{--</ul>--}}

        {{--<div class="listing-footer">--}}
        {{--<a href="{{route('show',$estate->slug)}}"><i--}}
        {{--class="fa fa-eye"></i>{{$estate->views}}</a>--}}
        {{--<span><i class="fa fa-calendar-o"></i>{{verta($estate->updated_at)->formatDifference()}}</span>--}}
        {{--<span><i class="fa fa-calendar-o"></i>{{$estate->updated_at}}</span>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--<!-- Listing Item / End -->--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        {{--<!-- Listing Item / End -->--}}

        {{--</div>--}}
        {{--</div>--}}
        <!-- Carousel / End -->

        </div>
    </div>




    <!-- Flip banner -->
    <a href="/" class="flip-banner parallax"
       data-background="/findeo/images/flip-banner-bg.jpg" data-color="var(--maincolor)" data-color-opacity="0.9"
       data-img-width="2500"
       data-img-height="1600">
        <div class="flip-banner-content">
            <h2 class="flip-visible">ما به مردم و خانه ها کمک می کنیم که همدیگر را پیدا کنند :)</h2>
            <h2 class="flip-hidden">مشاهده املاک <i class="sl sl-icon-arrow-left"></i></h2>
        </div>
    </a>
    <!-- Flip banner / End -->


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


    </style>
@endsection
@section('script')
    {{--my scipts--}}
    <script>
        $('input[name=type]').on('change', function () {
            if (this.value != "{{\Modules\Estate\Entities\Estate::Mortgage_Rent}}") {
                $('#mortgage_rent').addClass('d-none');
                $('#total_price').show();
            }
            else {
                $('#mortgage_rent').removeClass('d-none');
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
                    $(this).show();
                }
                else {
                    $(this).prop('disabled', true);
                    $(this).hide();
                }
                $('#neighborhoods_form').val('').trigger("chosen:updated");
            });
        });

    </script>


    <script>
        $('.chosen-select-no-single').change(function (){
            console.log($(this).val());
            if($(this).val().length > 1) {
                // alert('now')
            }
        })
    </script>
@endsection
