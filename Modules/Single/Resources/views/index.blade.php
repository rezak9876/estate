@extends('frontend::layouts.master')
@section('content')

    <div class="clearfix"></div>
    <!-- Header Container / End -->



    <!-- Titlebar
    ================================================== -->
    <div id="titlebar" class="property-titlebar margin-bottom-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <a href="/" class="back-to-listings"></a>

                    <div class="property-title">
                        <span class="property-badge">{{$estate->type()}}</span>
                        <h2 style="max-width: 750px;">{{$estate->title}}</h2>
                        <span>
						<a href="#location" class="listing-address">
							<i class="fa fa-map-marker"></i>
                            {{$estate->neighborhood->title}}
						</a>
					</span>
                    </div>

                    <div class="property-pricing">

                        @if($estate->type == \Modules\Estate\Entities\Estate::Mortgage_Rent)
                            <div>رهن {{number_format($estate->mortgage_price)}} تومان</div>
                            <div> اجاره{{number_format($estate->rent_price)}} تومان</div>
                        @else
                            <div>{{number_format($estate->total_price)}} تومان</div>
                            <div class="sub-price">{{number_format($estate->total_price/$estate->area)}} تومان / متر
                                مربع
                            </div>
                        @endif


                    </div>


                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row margin-bottom-50">
            <div class="col-md-12">

                <!-- Slider -->
                <div class="property-slider default">

                    @if($estate->main_picture)
                        <a href="{{\Modules\Estate\Entities\Gallery::$prefix_images .$estate->main_picture }}"
                           data-background-image="{{\Modules\Estate\Entities\Gallery::$prefix_images .$estate->main_picture }}"
                           class="item mfp-gallery"></a>
                    @endif
                    @foreach($estate->galleries as $gallery)
                        <a href="{{\Modules\Estate\Entities\Gallery::$prefix_images .$gallery->path }}"
                           data-background-image="{{\Modules\Estate\Entities\Gallery::$prefix_images .$gallery->path }}"
                           class="item mfp-gallery"></a>
                    @endforeach
                </div>

                <!-- Slider Thumbs -->
                <div class="property-slider-nav">
                    @if($estate->main_picture)
                        <div class="item"><img src="{{\Modules\Estate\Entities\Gallery::$prefix_images .$estate->main_picture}}" alt=""
                                               height="80px" style="margin: auto">
                        </div>
                    @endif
                    @foreach($estate->galleries as $gallery)
                        <div class="item"><img src="{{\Modules\Estate\Entities\Gallery::$prefix_images .$gallery->path }}" alt=""
                                               height="80px" style="margin: auto"></div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">


            <!-- Sidebar -->
            <div class="col-lg-4 col-md-5 sp-sidebar d-none d-md-block">
                <div class="sidebar sticky right">


                    <!-- Widget -->
                    <div class="widget">
                        <form action="{{route('search')}}" id="filter_form" method="post">
                        @csrf
                        @method('get')
                        <!-- Row -->
                            <div class="row with-forms">
                                <!-- Status -->
                                <div class="col-md-12">
                                    <select name="type"
                                            data-placeholder="نوع"
                                            class="chosen-select-no-single">
                                        <option
                                            value="{{\Modules\Estate\Entities\Estate::Buy_Sell}}">{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Buy_Sell)}}</option>
                                        <option
                                            value="{{\Modules\Estate\Entities\Estate::Mortgage_Rent}}">{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Mortgage_Rent)}}</option>
                                        <option
                                            value="{{\Modules\Estate\Entities\Estate::Presell}}">{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Presell)}}</option>
                                        <option
                                            value="{{\Modules\Estate\Entities\Estate::Exchange}}">{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Exchange)}}</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Row / End -->


                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Status -->
                                <div class="col-md-12">
                                    <select name="usetypeproperties[]"
                                            data-placeholder="وضعیت"
                                            class="chosen-select-no-single" multiple>
                                        @foreach($usetypes as $usetype)
                                            <optgroup label="{{$usetype->title}}">
                                                @foreach($usetype->usetypeproperties as $usetypeproperty)
                                                    <option
                                                        value="{{$usetypeproperty->id}}">{{$usetypeproperty->title}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Row / End -->


                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Type -->
                                <div class="col-md-12">
                                    <select name="province"
                                            class="chosen-select-no-single">
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id}}">{{$province->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Row / End -->


                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- States -->
                                <div class="col-md-12">
                                    <select name="neighborhoods[]" id="neighborhoods_form"
                                            data-placeholder="محله را انتخاب کنید"
                                            class="chosen-select-no-single" multiple>
                                        @foreach($neighborhoods as $neighborhood)
                                            <option value="{{$neighborhood->id}}"
                                                    data-provine="{{$neighborhood->province->id}}" {{$neighborhood->is_disabled(1)}}

                                            >{{$neighborhood->title}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Row / End -->


                            <!-- Area Range -->
                            <div class="range-slider">
                                <label>متراژ</label>
                                <div class="findeo-range" data-name="area" data-min="{{$extremum['min_area']}}"
                                     data-max="{{$extremum['max_area']}}"
                                     data-unit="مترمربع" data-step="10"></div>
                                <div class="clearfix"></div>
                            </div>

                            <br>

                            <!-- Price Range -->
                            <div class="range-slider">
                                <div class="range-slider">
                                    <label>سال ساخت</label>
                                    <div class="findeo-range" data-name="year_of_construction" data-min="0"
                                         data-max="1500"
                                         data-unit="سال" data-step="1"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            <div id="total_price"
                            >

                                <!-- Min Price -->

                                <div class="range-slider">
                                    <label class="text-center">قیمت</label>
                                    <div class="findeo-range" data-name="total_price"
                                         data-min="{{$extremum['min_total_price']}}"
                                         data-max="{{$extremum['max_total_price']}}"
                                         data-unit="تومان" data-step="10"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div id="mortgage_rent"
                                 class="d-none">
                                <!-- Property Type -->
                                <div class="col-md-6">
                                    <div class="range-slider">
                                        <label>رهن</label>
                                        <div class="findeo-range" data-name="mortgage_price"
                                             data-min="{{$extremum['min_mortgage_price']}}"
                                             data-max="{{$extremum['max_mortgage_price']}}"
                                             data-unit="تومان" data-step="10"></div>
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
                                             data-unit="تومان" data-step="10"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>




                            <div class="more-search-options d-none relative">

                                <div class="row">
                                    <!-- Min Price -->
                                    @foreach($facilities as $facility)
                                        @if($facility->type == \Modules\Facility\Entities\Facility::Integer)
                                            <div class="col-md-12">
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
                                        <input name="terms[{{$term->id}}]" id="termcheckbox{{$term->id}}"
                                               type="checkbox">
                                        <label for="termcheckbox{{$term->id}}">{{$term->title}}</label>
                                    @endforeach

                                </div>
                                <!-- Checkboxes / End -->
                            </div>
                            <!-- More Search Options / End -->

                            <!-- More Search Options -->
                            <a href="#" class="more-search-options-trigger margin-bottom-10 margin-top-30"
                               data-open-title="گزینه های بیشتر" data-close-title="بستن"></a>

                            <button class="button fullwidth margin-top-30">جستجو</button>
                        </form>
                    </div>
                    <!-- Widget / End -->

                </div>
            </div>
            <!-- Sidebar / End -->


            <!-- Property Description -->
            <div class="col-lg-8 col-md-7 sp-content text-center">
                <div class="property-description">

                    <!-- Main Features -->
                    {{--desktop--}}
                    <ul class="property-main-features  	d-none d-sm-block">
                        <li>مساحت <span>{{$estate->area}} متر مربع</span></li>
                        <li>سال ساخت <span>{{$estate->year_of_construction}}</span></li>
                        <li>نوع <span>{{$estate->use_type->title}}</span></li>
                        <li>نوع کاربری<span>{{$estate->use_type_property->title}}</span></li>
                    </ul>


                    <!-- Main Features -->
                    {{--mobile--}}
                    <ul class="property-main-features d-block d-sm-none">
                        <div class="row text-right">
                            <div class="col-6">
                                <li>مساحت <span>{{$estate->area}} متر مربع</span></li>
                                <li>سال ساخت <span>{{$estate->year_of_construction}}</span></li>
                            </div>
                            <div class="col-6">
                                <li>نوع <span>{{$estate->use_type->title}}</span></li>
                                <li>نوع کاربری<span>{{$estate->use_type_property->title}}</span></li>
                            </div>
                        </div>
                    </ul>


                    <!-- Description -->
                    <h3 class="desc-headline">توضیحات</h3>
                    <div class="show-more">
                        <p>
                            {{$estate->description}}
                        </p>

                        <a href="#" class="show-more-button">بیشتر <i class="fa fa-angle-down"></i></a>
                    </div>

                    <!-- Details -->
                    @if($estate->boolfacilities->count())

                        <h3 class="desc-headline">جزئیات</h3>
                        <ul class="property-features margin-top-0" style="columns: auto;">
                            <div class="row">

                                @foreach($facilities as $facility)
                                    @if($facility->type == \Modules\Facility\Entities\Facility::Integer)
                                        <div class="col-6">

                                            <li class="text-center">{{$facility->title}} :
                                                <span>
                                        @if($estate->intfacilities->where('id',$facility->id)->first())
                                                        <small>{{$estate->intfacilities->where('id',$facility->id)->first()->pivot->value}}</small>
                                                    @endif
                                    </span>
                                            </li>
                                        </div>
                                    @endif
                                @endforeach

                                @foreach($facilities as $facility)
                                    @if($facility->type == \Modules\Facility\Entities\Facility::Text)
                                        <div class="col-6">

                                            <li class="text-center">{{$facility->title}} :
                                                <span>
                                        @if($estate->txtfacilities->where('id',$facility->id)->first())
                                                        <small>{{$estate->txtfacilities->where('id',$facility->id)->first()->pivot->value}}</small>
                                                    @endif
                                    </span>
                                            </li>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                        </ul>
                    @endif

                <!-- Features -->
                    @if($estate->boolfacilities->count())
                        <h3 class="desc-headline">ویژگی ها</h3>
                        <ul class="property-features checkboxes margin-top-0" style="columns: auto;">

                            <div class="row">

                                @foreach($facilities as $facility)
                                    @if($facility->type == \Modules\Facility\Entities\Facility::Check_box)
                                        @if($estate->boolfacilities->contains($facility->id))
                                            <div class="col-6">
                                                <li class="text-center">{{$facility->title}}</li>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>

                        </ul>
                    @endif

                <!-- Features -->
                    @if($estate->terms->count())

                        <h3 class="desc-headline">شرایط</h3>
                        <ul class="property-features checkboxes margin-top-0" style="columns: auto;">
                            <div class="row">

                                @foreach($terms as $term)
                                    @if($estate->terms->contains($term->id))
                                        <div class="col-6">

                                            <li class="text-center">{{$term->title}}</li>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </ul>
                @endif

                <!-- Features -->
                    <h3 class="desc-headline">نقشه</h3>
                    <div id="map"></div>
                    <p>آدرس: {{$estate->address}}</p>
                {{--                    </ul>--}}



                <!-- Layout Switcher -->

                    <!-- Similar Listings Container / End -->

                </div>
            </div>
            <!-- Property Description / End -->


        </div>

        <!-- Similar Listings Container -->
        <h3 class="desc-headline no-border margin-bottom-35 margin-top-60">موارد مشابه</h3>

        <!-- Listings Container -->
        <div class="row">
        @foreach($estates as $like_estate)

            <!-- Listing Item -->
                <div class="col-md-4">
                    <div class="listing-item compact">

                        <a href="{{route('show',$like_estate->slug)}}" class="listing-img-container">

                            <div class="listing-badges">
                                @if($like_estate->special)
                                    <span class="featured">ویژه</span>
                                @endif
                                <span>{{$like_estate->type()}}</span>
                            </div>

                            <div class="listing-img-content" style="display: inherit;height: auto !important;;">
                                            <span class="listing-compact-title">
                                                @if($like_estate->type == \Modules\Estate\Entities\Estate::Mortgage_Rent)
                                                    <span class="listing-price">{{number_format($like_estate->mortgage_price)}}
                                                        رهن  + {{number_format($like_estate->rent_price)}}
                                                        اجاره</span>
                                                @else
                                                    <span class="listing-price">{{number_format($like_estate->total_price)}}
                                                        تومان </span>
                                                @endif
                                            </span>

                                <ul class="listing-hidden-content"
                                    style="display: flex;justify-content: space-around;align-items: center;padding: 0;">
                                    <li style="padding: 0;">مساحت <span>{{$like_estate->area}} متر مربع</span></li>
                                    <li style="padding: 0;">سال ساخت <span>{{$like_estate->year_of_construction}}</span>
                                    </li>
                                    <li style="padding: 0;">نوع
                                        کاربری<span>{{$like_estate->use_type_property->title}}</span></li>
                                </ul>
                            </div>

                            <img
                                src=
                                @if($like_estate->main_picture)
                                {{$like_estate->thumbnail_picture()}}
                                @else
                                    "/findeo/images/listing-03.jpg"
                                @endif
                                alt="">
                        </a>

                    </div>
                </div>
                <!-- Listing Item / End -->

            @endforeach
        </div>
        <!-- Listings Container / End -->
    </div>


    <!-- Footer
    ================================================== -->
    <div class="margin-top-55"></div>

@endsection
@section('style')
    <link rel="stylesheet" href="/findeo/css/mystyle.css">

    {{--map--}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <style>
        #map {
            /* configure the size of the map */
            width: 100%;
            height: 400px;
            z-index: 0;
        }
    </style>

    {{--mystyle--}}
    <style>
        .property-features {
            columns: 2;
        }

        .mr-5 {
            margin-right: 5rem !important;
        }

        .property-slider-nav .item img {
            max-height: 126px;
        }

        .property-features.checkboxes li:before {
            color: var(--maincolor);
            background-color: transparent !important;
        }

    </style>


    <style>
        @media (max-width: 576px) {
            .property-pricing {
                top: auto;
            }
        }
    </style>
@endsection
@section('script')
    {{--my scipts--}}
    <script>
        $('select[name=type]').on('change', function () {
            if (this.value != "{{\Modules\Estate\Entities\Estate::Mortgage_Rent}}") {
                $('#mortgage_rent').hide();
                $('#total_price').show();
            } else {
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
                    $(this).show();

                } else {
                    $(this).prop('disabled', true);
                    $(this).hide();

                }
                $('#neighborhoods_form').val('').trigger("chosen:updated");
            });
        });
    </script>

    {{--map--}}
    <script>
        // initialize Leaflet
        latitude = "{{$estate->latitude}}";
        longitude = "{{$estate->longitude}}";
        var map = L.map('map').setView({lon: longitude, lat: latitude}, 15);

        // add the OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
        }).addTo(map);

        // show the scale bar on the lower left corner
        L.control.scale({imperial: true, metric: true}).addTo(map);

        // show a marker on the map
        L.marker({lon: longitude, lat: latitude}).bindPopup('The center of the world').addTo(map);

        $(".usetypesproperty_li").click(function (e) {
            $(this).prev().prop('checked', $(this).hasClass("selected"));
        });
    </script>

@endsection
