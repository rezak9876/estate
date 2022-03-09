@extends('frontend::layouts.master')
@section('content')
    <div class="clearfix"></div>
    <!-- Header Container / End -->



    <!-- Titlebar
    ================================================== -->
    <div class="parallax titlebar"
         data-background="{{'/'.\Modules\Setting\Entities\Setting::PATH_UPLOAD.$setting->search_page_pic}}"
         data-color="#333333"
         data-color-opacity="0.7"
         data-img-width="800"
         data-img-height="505">

        <div id="titlebar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2>آگهی ها</h2>

                        <!-- Breadcrumbs -->
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="/">خانه</a></li>
                                <li>آگهی ها</li>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Content
    ================================================== -->
    <div class="container">
        <div class="row sticky-wrapper">


            <!-- Sidebar
            ================================================== -->
            <div class="col-md-4">
                <div class="sidebar sticky right">

                    <!-- Widget -->
                    <div class="widget margin-bottom-40">
                        <h3 class="margin-top-0 margin-bottom-35">یافتن خانه جدید</h3>


                        <form action="{{route('filter')}}" id="filter_form" method="post">
                            @csrf
                            @method('get')
                            <input type="hidden" name="step" value="0">

                            <!-- Row -->
                            <div class="row with-forms">
                                <!-- Status -->
                                <div class="col-md-12">
                                    <select name="type"
                                            data-placeholder="نوع"
                                            class="chosen-select-no-single">
                                        @if(isset($form_value))
                                            <option
                                                value="{{\Modules\Estate\Entities\Estate::Buy_Sell}}" {{is_selected($form_value->type==\Modules\Estate\Entities\Estate::Buy_Sell)}}>{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Buy_Sell)}}</option>
                                            <option
                                                value="{{\Modules\Estate\Entities\Estate::Mortgage_Rent}}" {{is_selected($form_value->type==\Modules\Estate\Entities\Estate::Mortgage_Rent)}}>{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Mortgage_Rent)}}</option>
                                            <option
                                                value="{{\Modules\Estate\Entities\Estate::Presell}}" {{is_selected($form_value->type==\Modules\Estate\Entities\Estate::Presell)}}>{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Presell)}}</option>
                                            <option
                                                value="{{\Modules\Estate\Entities\Estate::Exchange}}" {{is_selected($form_value->type==\Modules\Estate\Entities\Estate::Exchange)}}>{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Exchange)}}</option>
                                        @else
                                            <option
                                                value="{{\Modules\Estate\Entities\Estate::Buy_Sell}}">{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Buy_Sell)}}</option>
                                            <option
                                                value="{{\Modules\Estate\Entities\Estate::Mortgage_Rent}}">{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Mortgage_Rent)}}</option>
                                            <option
                                                value="{{\Modules\Estate\Entities\Estate::Presell}}">{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Presell)}}</option>
                                            <option
                                                value="{{\Modules\Estate\Entities\Estate::Exchange}}">{{\Modules\Estate\Entities\Estate::text(\Modules\Estate\Entities\Estate::Exchange)}}</option>
                                        @endif
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
                                                        value="{{$usetypeproperty->id}}" {{$form_value->usetypeproperties?is_selected(in_array($usetype->id,$form_value->usetypeproperties)):null}}>{{$usetypeproperty->title}}</option>
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
                                            <option
                                                value="{{$province->id}}" {{$form_value?is_selected($form_value->province==$province->id):null}}>{{$province->title}}</option>
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
                                                    data-provine="{{$neighborhood->province->id}}" {{$neighborhood->is_disabled(isset($form_value->province)?$form_value->province:1)}}

                                                {{is_selected($form_value->neighborhoods && in_array($neighborhood->id,$form_value->neighborhoods))}}>{{$neighborhood->title}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Row / End -->


                            <!-- Area Range -->
                            <div class="range-slider">
                                <label>متراژ</label>
                                <div class="findeo-range" data-name="area" data-min="{{$extremum['min_area']}}"
                                     data-minvalue="{{isset($form_value->min_area)?$form_value->min_area:  $extremum['min_area']}}"
                                     data-maxvalue="{{isset($form_value->max_area)?$form_value->max_area:  $extremum['max_area']}}"
                                     data-max="{{$extremum['max_area']}}"
                                     data-unit="مترمربع" data-step="10"></div>
                                <div class="clearfix"></div>
                            </div>

                            <br>

                            <!-- Price Range -->
                            <div class="range-slider">
                                <div class="range-slider">
                                    <label>سال ساخت</label>
                                    <div class="findeo-range" data-name="year_of_construction"
                                         data-min="{{$extremum['min_year_of_construction']}}"
                                         data-minvalue="{{isset($form_value)?$form_value->min_year_of_construction:  $extremum['min_year_of_construction']}}"
                                         data-maxvalue="{{isset($form_value)?$form_value->max_year_of_construction:  $extremum['max_year_of_construction']}}"
                                         data-max="{{$extremum['max_year_of_construction']}}"
                                         data-unit="" data-step="1"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            <div id="total_price"
                                 class="{{isset($form_value->type)?$form_value->type != \Modules\Estate\Entities\Estate::Mortgage_Rent ?null:'d-none' :null}}">

                                <!-- Min Price -->

                                <div class="range-slider">
                                    <label class="text-center">قیمت</label>
                                    <div class="findeo-range" data-name="total_price"
                                         data-min="{{$extremum['min_total_price']}}"
                                         data-minvalue="{{isset($form_value)?$form_value->min_total_price:  $extremum['min_total_price']}}"
                                         data-maxvalue="{{isset($form_value)?$form_value->max_total_price:  $extremum['max_total_price']}}"
                                         data-max="{{$extremum['max_total_price']}}"
                                         data-unit="تومان" data-step="10"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div id="mortgage_rent"
                                 class="{{isset($form_value->type)?$form_value->type == \Modules\Estate\Entities\Estate::Mortgage_Rent ?null:'d-none' :'d-none'}}">
                                <!-- Property Type -->
                                <div class="col-md-6">
                                    <div class="range-slider">
                                        <label>رهن</label>
                                        <div class="findeo-range" data-name="mortgage_price"
                                             data-min="{{$extremum['min_mortgage_price']}}"
                                             data-minvalue="{{isset($form_value)?$form_value->min_mortgage_price:  $extremum['min_mortgage_price']}}"
                                             data-maxvalue="{{isset($form_value)?$form_value->max_mortgage_price:  $extremum['max_mortgage_price']}}"
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
                                             data-minvalue="{{isset($form_value)?$form_value->min_rent_price:  $extremum['min_rent_price']}}"
                                             data-maxvalue="{{isset($form_value)?$form_value->max_rent_price:  $extremum['max_rent_price']}}"
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
                                                         data-minvalue="{{isset($form_value->min_facility)?$form_value->min_facility[$facility->id]:  $extremum['min_facility'][$facility->id]}}"
                                                         data-maxvalue="{{isset($form_value->max_facility)?$form_value->max_facility[$facility->id]:  $extremum['max_facility'][$facility->id]}}"
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
                                                   type="checkbox"
                                                {{isset($form_value->check_box_facility)?is_checked(in_array($facility->id,array_keys($form_value->check_box_facility))):null}}>
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
                                               type="checkbox"
                                            {{isset($form_value->terms)?is_checked(in_array($term->id,array_keys($form_value->terms))):null}}>
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

            <div class="col-md-8">

                <!-- Sorting / Layout Switcher -->
                <div class="row margin-bottom-15">

                    <div class="col-md-6">
                    </div>

                    <div class="col-md-6">
                        <!-- Layout Switcher -->
                        <div class="layout-switcher">
{{--                            <a href="#" class="list"><i class="fa fa-th-list"></i></a>--}}
{{--                            <a href="#" class="grid"><i class="fa fa-th-large"></i></a>--}}
                        </div>
                    </div>
                </div>


                <!-- Listings -->
                <div class="listings-container list-layout" id="estates_area">
                    <div class="text-center pb-5">

                        <div class="loader"></div>
                        در حال پردازش...
                    </div>
                </div>
                <!-- Listings Container / End -->

                <hr>
                <div class="text-center">

                    <button id="see_more" class="button border d-none">مشاهده بیشتر</button>
                </div>

            </div>


        </div>
    </div>


    <!-- Footer
    ================================================== -->
    <div class="margin-top-55"></div>

@endsection
@section('style')
    <link rel="stylesheet" href="/findeo/css/mystyle.css">
    <style>


        /*multiselect form*/

        .search-field {
            float: right;
            margin-right: 1.5rem;
        }

        /*loader */
        .pb-5 {
            padding-bottom: 2rem;
        }

        .loader {
            margin: auto;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid var(--maincolor);
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }


    </style>

    <style>
        @media (max-width: 576px){
            #titlebar {
                padding: 1rem !important;
                margin-bottom: 0.5rem;
            }
        }
    </style>
@endsection
@section('script')
    {{--my scipts--}}
    <script>
        $('select[name=type]').on('change', function () {
            if (this.value != "{{\Modules\Estate\Entities\Estate::Mortgage_Rent}}") {
                $('#mortgage_rent').addClass('d-none');
                $('#total_price').show();
            } else {
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
                } else {
                    $(this).prop('disabled', true);
                    $(this).hide();
                }
                $('#neighborhoods_form').val('').trigger("chosen:updated");
            });
        });

    </script>


    {{--lazy load--}}

    <script>
        $('form#filter_form').submit(function (e) {
            e.preventDefault();
            $('#see_more').prop("disabled", false);
            $("input[name=step]").val(0)
            var data = new FormData($('form#filter_form')[0]);
            $.ajax({
                processData: false,
                contentType: false,

                data: data,
                type: $(this).attr('method'),
                url: $('form#filter_form').attr("action"),
                // success: function (data, textStatus, jqXHR) {
                //     alert(data)
                //     $('#estates_area').html(data);
                // },
                // error: function (data, textStatus, jqXHR) {
                //     console.log(data)
                //     $('#estates_area').html(data);
                //
                // },
                success: function (result) {
                    if (result.estates_status == false) {
                        $('#see_more').addClass('d-none');
                        $('#estates_area').html('<p class="text-center">موردی پیدا نشد</p>');
                    } else {
                        $('#estates_area').html(result);
                        $('#see_more').removeClass('d-none');
                    }
                },
                error: function (jqXhr, textStatus) { // error callback
                    alert(jqXHR + ' ' + textStatus)
                    location.reload();
                }
            });
        });


        function end_estates() {
            $('#estates_area').append('<p class="text-center">موردی پیدا نشد</p>');
            $('#see_more').prop("disabled", true);
            $('#see_more').addClass('d-none');

        }

        $('#see_more').click(function (e) {
            step_value = parseInt($("input[name=step]").val());
            step_value += 10;
            $("input[name=step]").val(step_value)

            var data = new FormData($('form#filter_form')[0]);
            $.ajax({
                processData: false,
                contentType: false,

                data: data,
                type: 'POST',
                url: $('form#filter_form').attr("action"),
                success: function (result) {
                    if (typeof result.estates_status === 'undefined')
                        $('#estates_area').append(result);
                    else
                        end_estates()
                },
                error: function (jqXhr, textStatus) { // error callback
                    alert(jqXHR + ' ' + textStatus)
                    location.reload();
                }
            });

        })
        $(document).ready(function () {
            $("#filter_form").submit();
        });
    </script>
@endsection
