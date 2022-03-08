@csrf
@method('get')
<input type="hidden" name="step" value="0">
<div class="ltn__shop-options filter-border" id="nav-filter">
    <ul class="justify-content-start" id="filter-option">
        <div class="title-filter-box">جعبه فیلتر</div>
        <li class="item-filter">
            <div class="short-by text-center">
                <select name="type" class="nice-select" id="state_type">
                    @if(isset($form_value))
                        <option value="{{\App\Estate::Buy_Sell}}" {{is_selected($form_value->type==\App\Estate::Buy_Sell)}}>{{\App\Estate::text(\App\Estate::Buy_Sell)}}</option>
                        <option value="{{\App\Estate::Mortgage_Rent}}" {{is_selected($form_value->type==\App\Estate::Mortgage_Rent)}}>{{\App\Estate::text(\App\Estate::Mortgage_Rent)}}</option>
                        <option value="{{\App\Estate::Presell}}" {{is_selected($form_value->type==\App\Estate::Presell)}}>{{\App\Estate::text(\App\Estate::Presell)}}</option>
                        <option value="{{\App\Estate::Exchange}}" {{is_selected($form_value->type==\App\Estate::Exchange)}}>{{\App\Estate::text(\App\Estate::Exchange)}}</option>
                    @else
                        <option value="{{\App\Estate::Buy_Sell}}">{{\App\Estate::text(\App\Estate::Buy_Sell)}}</option>
                        <option value="{{\App\Estate::Mortgage_Rent}}">{{\App\Estate::text(\App\Estate::Mortgage_Rent)}}</option>
                        <option value="{{\App\Estate::Presell}}">{{\App\Estate::text(\App\Estate::Presell)}}</option>
                        <option value="{{\App\Estate::Exchange}}">{{\App\Estate::text(\App\Estate::Exchange)}}</option>
                    @endif
                </select>
            </div>
        </li>
        <li class="item-filter">
            <div class="short-by text-center">
                <select name="province" class="nice-select">
                    @foreach($provinces as $province)
                        @if(isset($form_value))

                            <option value="{{$province->id}}" {{is_selected($form_value->province==$province->id)}}>{{$province->title}}</option>
                        @else
                            <option value="{{$province->id}}">{{$province->title}}</option>

                        @endif

                    @endforeach
                </select>
            </div>
        </li>
        <li class="item-filter">
            <div class="search-box">
                <select class="js-example-basic-multiple" id="mySelect2" name="neighborhoods[]" multiple="multiple">
                    @foreach($neighborhoods as $neighborhood)
                        @if($neighborhood->title)
                            @if(isset($form_value))
                                <option class="test" value="{{$neighborhood->id}}"
                                        data-province="{{$neighborhood->province->id}}"
                                        {{is_selected($form_value->neighborhoods && in_array($neighborhood->id,$form_value->neighborhoods))}} >{{$neighborhood->title}}</option>
                            @else
                                <option class="test" value="{{$neighborhood->id}}"
                                        data-province="{{$neighborhood->province->id}}"
                                        >{{$neighborhood->title}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>
        </li>
        <li class="item-filter">
            <ul class="nav">
                <li class="button-dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle">
                        نوع ملک
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <nav>
                                <div class="nav nav-tabs d-block-ruby" id="nav-tab"
                                     role="tablist">
                                    @foreach($usetypes as $usetype)
                                        <button class="nav-link"
                                                id="nav-usetype{{$usetype->id}}-tab"
                                                data-bs-toggle="tab"
                                                data-bs-target="#nav-usetype{{$usetype->id}}"
                                                type="button" role="tab"
                                                aria-controls="nav-usetype{{$usetype->id}}"
                                                aria-selected="false">{{$usetype->title}}</button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content" id="type_of_use">
                                @foreach($usetypes as $usetype)
                                    <div class="tab-pane fade" id="nav-usetype{{$usetype->id}}"
                                         role="tabpanel"
                                         aria-labelledby="nav-usetype{{$usetype->id}}-tab">
                                        <div class="all">
                                            <ul>
                                                @foreach($usetypesproperties as $usetypesproperty)
                                                    @if($usetypesproperty->use_type_id == $usetype->id)
                                                        @if(isset($form_value))
                                                            <input type="checkbox"
                                                                   name="usetypesproperty[{{$usetypesproperty->id}}]"
                                                                   class="d-none" {{$form_value->usetypesproperty?is_checked(in_array($usetypesproperty->id,array_keys($form_value->usetypesproperty))):null}}>
                                                            <li class="usetypesproperty_li {{$form_value->usetypesproperty?is_selected(in_array($usetypesproperty->id,array_keys($form_value->usetypesproperty))):null}}">{{$usetypesproperty->title}}</li>
                                                        @else
                                                            <input type="checkbox"
                                                                   name="usetypesproperty[{{$usetypesproperty->id}}]"
                                                                   class="d-none">
                                                            <li class="usetypesproperty_li">{{$usetypesproperty->title}}</li>
                                                        @endif

                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="item-filter">
            <ul class="nav">
                <li class="button-dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle">
                        قیمت
                    </a>
                    <ul class="dropdown-menu">
                        <li class="w-100">
                            @php
                                $check_type = isset($form_value->type)? $form_value->type == \App\Estate::Mortgage_Rent:null;
                            @endphp
                            <div id="rangePrice_buy_sell" class="{{$check_type?'d-none':null}}">
                                <span class="title-range">خرید و فروش</span>
                                <div class="total-range">
                                    <div class="range-slider flat my-range" data-ticks-position='top'
                                         style='--min:{{$extremum['min_total_price']}}; --max:{{$extremum['max_total_price']}}; --value-a:{{isset($form_value->min_total_price)?$form_value->min_total_price:  $extremum['min_total_price']}}; --value-b:{{isset($form_value->max_total_price)?$form_value->max_total_price: $extremum['max_total_price']}}; --suffix:""; --text-value-a:"{{isset($form_value->min_total_price)?$form_value->min_total_price:  $extremum['min_total_price']}}"; --text-value-b:"{{isset($form_value->max_total_price)?$form_value->max_total_price: $extremum['max_total_price']}}";'>
                                        <input name="min_total_price" id="rangemin_sell" type="range"
                                               min="{{$extremum['min_total_price']}}"
                                               max="{{$extremum['max_total_price']}}"
                                               value="{{isset($form_value->min_total_price)?$form_value->min_total_price:  $extremum['min_total_price']}}"
                                               step="10" onclick=""
                                               oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value)),min_range_fa_buysell(this.value)">
                                        <output></output>
                                        <input name="max_total_price" id="rangemax_sell" type="range"
                                               min="{{$extremum['min_total_price']}}"
                                               max="{{$extremum['max_total_price']}}"
                                               value="{{isset($form_value->max_total_price)?$form_value->max_total_price: $extremum['max_total_price']}}"
                                               step="10"
                                               oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value)),max_range_fa_buysell(this.value)">
                                        <output></output>
                                        <div class='range-slider__progress'></div>
                                    </div>
                                    <div class="rang-price-fa">
                                        قیمت از
                                        <span class="rangelenght"
                                              id="rang_min">{{isset($form_value->min_total_price)?$form_value->min_total_price:  $extremum['min_total_price']}}</span>
                                        <span id="c1" class="currency"></span>
                                        تا
                                        <span class="rangelenght"
                                              id="rang_max">{{isset($form_value->max_total_price)?$form_value->max_total_price:  $extremum['max_total_price']}}</span>
                                        <span id="c2" class="currency"></span>
                                    </div>
                                </div>
                            </div>
                            <div id="rangePrice_mortgage_rent" class="{{!$check_type?'d-none':null}}">
                                <span class="title-range">رهن</span>
                                <div class="total-range">
                                    <div class="range-slider flat my-range" data-ticks-position='top'
                                         style='--min:{{$extremum['min_mortgage_price']}}; --max:{{$extremum['max_mortgage_price']}}; --value-a:{{isset($form_value->min_mortgage_price)?$form_value->min_mortgage_price:  $extremum['min_mortgage_price']}}; --value-b:{{isset($form_value->max_mortgage_price)?$form_value->max_mortgage_price: $extremum['max_mortgage_price']}}; --suffix:""; --text-value-a:"{{isset($form_value->min_mortgage_price)?$form_value->min_mortgage_price:  $extremum['min_mortgage_price']}}"; --text-value-b:"{{isset($form_value->max_mortgage_price)?$form_value->max_mortgage_price: $extremum['max_mortgage_price']}}";'>
                                        <input name="min_mortgage_price" type="range"
                                               min="{{$extremum['min_mortgage_price']}}"
                                               max="{{$extremum['max_mortgage_price']}}"
                                               value="{{isset($form_value->min_mortgage_price)?$form_value->min_mortgage_price:  $extremum['min_mortgage_price']}}"
                                               step="10" onclick=""
                                               oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value)),min_range_fa_mortgage(this.value)">
                                        <output></output>
                                        <input name="max_mortgage_price" type="range"
                                               min="{{$extremum['min_mortgage_price']}}"
                                               max="{{$extremum['max_mortgage_price']}}"
                                               value="{{isset($form_value->max_mortgage_price)?$form_value->max_mortgage_price: $extremum['max_mortgage_price']}}"
                                               step="10"
                                               oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value)),max_range_fa_mortgage(this.value)">
                                        <output></output>
                                        <div class='range-slider__progress'></div>
                                    </div>
                                    <div class="rang-price-fa">
                                        قیمت از
                                        <span id="rang_min2">50</span>
                                        <span id="c3" class="currency"></span>
                                        تا
                                        <span id="rang_max2">500</span>
                                        <span id="c4" class="currency"></span>
                                    </div>
                                </div>
                                <span class="title-range">اجاره</span>
                                <div class="total-range">
                                    <div class="range-slider flat my-range" data-ticks-position='top'
                                         style='--min:{{$extremum['min_rent_price']}}; --max:{{$extremum['max_rent_price']}}; --value-a:{{isset($form_value->min_rent_price)?$form_value->min_rent_price:  $extremum['min_rent_price']}}; --value-b:{{isset($form_value->max_rent_price)?$form_value->max_rent_price: $extremum['max_rent_price']}}; --suffix:""; --text-value-a:"{{isset($form_value->min_rent_price)?$form_value->min_rent_price:  $extremum['min_rent_price']}}"; --text-value-b:"{{isset($form_value->max_rent_price)?$form_value->max_rent_price: $extremum['max_rent_price']}}";'>
                                        <input name="min_rent_price" type="range" min="{{$extremum['min_rent_price']}}"
                                               max="{{$extremum['max_rent_price']}}"
                                               value="{{isset($form_value->min_rent_price)?$form_value->min_rent_price:  $extremum['min_rent_price']}}"
                                               step="10" onclick=""
                                               oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value)),min_range_fa_rent(this.value)">
                                        <output></output>
                                        <input name="max_rent_price" type="range" min="{{$extremum['min_rent_price']}}"
                                               max="{{$extremum['max_rent_price']}}"
                                               value="{{isset($form_value->max_rent_price)?$form_value->max_rent_price: $extremum['max_rent_price']}}"
                                               step="10"
                                               oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value)),max_range_fa_rent(this.value)">
                                        <output></output>
                                        <div class='range-slider__progress'></div>
                                    </div>
                                    <div class="rang-price-fa">
                                        قیمت از
                                        <span id="rang_min3">50</span>
                                        <span id="c5" class="currency"></span>
                                        تا
                                        <span id="rang_max3">500</span>
                                        <span id="c6" class="currency"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </li>
        <li class="item-filter">
            <ul class="nav">
                <li class="button-dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle">
                        متراژ
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div id="filter_area">
                                <span class="title-range">متراژ بنا</span>
                                <div class="total-range">
                                    <div class="range-slider flat my-range"
                                         data-ticks-position='top'
                                         style='--min:{{$extremum['min_area']}}; --max:{{$extremum['max_area']}}; --value-a:{{isset($form_value->min_area)?$form_value->min_area:  $extremum['min_area']}}; --value-b:{{isset($form_value->max_area)?$form_value->max_area:  $extremum['max_area']}}; --suffix:""; --text-value-a:"{{isset($form_value->min_area)?$form_value->min_area:  $extremum['min_area']}}"; --text-value-b:"{{isset($form_value->max_area)?$form_value->max_area:  $extremum['max_area']}}";'>
                                        <input name="min_area" type="range"
                                               min="{{$extremum['min_area']}}"
                                               max="{{$extremum['max_area']}}"
                                               value="{{isset($form_value->min_area)?$form_value->min_area:  $extremum['min_area']}}"
                                               step="1"
                                               onclick=""
                                               oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value)),min_range_fa_area(this.value)">
                                        <output></output>
                                        <input name="max_area" type="range"
                                               min="{{$extremum['min_area']}}"
                                               max="{{$extremum['max_area']}}"
                                               value="{{isset($form_value->max_area)?$form_value->max_area:  $extremum['max_area']}}"
                                               step="1"
                                               oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value)),max_range_fa_area(this.value)">
                                        <output></output>
                                        <div class='range-slider__progress'></div>
                                    </div>
                                    <div class="rang-price-fa">
                                        متراژ از
                                        <span id="rang-min-area">{{isset($form_value->min_area)?$form_value->min_area:  $extremum['min_area']}}</span>
                                        <span class="currency">متر مربع </span>
                                        تا
                                        <span id="rang-max-area">{{isset($form_value->max_area)?$form_value->max_area:  $extremum['max_area']}}</span>
                                        <span class="currency">متر مربع</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </li>
        <li class="item-filter">
            <ul class="nav">
                <li class="button-dropdown min-w-150">
                    <a href="javascript:void(0)" class="dropdown-toggle">
                        فیلتر های بیشتر
                    </a>
                    <ul class="dropdown-menu">
                        <li class="max-height-dropdown">
                            <div class="filter-more">
                                <div>
                                    <label class="photo-ads-text" for="photo-ads">آگهی های عکس
                                        دار</label>
                                    <input type="checkbox" name="photo_estate"
                                           id="photo-ads" {{isset($form_value)?is_checked($form_value->photo_estate):null}}>
                                </div>

                                <div class="count-room">
                                    <span class="title-filter d-flex">امکانات</span>
                                    <table class="borderles">
                                        <tr>
                                            @foreach($facilities as $facility)
                                                @if($facility->type == \App\Facility::Check_box)
                                                    <td>
                                                        <input name="check_box_facility[{{$facility->id}}]"
                                                               type="checkbox"
                                                               id="one-bedroom"
                                                                {{isset($form_value->check_box_facility)?is_checked(in_array($facility->id,array_keys($form_value->check_box_facility))):null}}>
                                                        <label
                                                                for="one-bedroom">{{$facility->title}}</label>
                                                    </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>

                                <div class="age-estate">

                                    @foreach($facilities as $facility)
                                        @if($facility->type == \App\Facility::Integer)
                                            <span class="title-filter d-flex">{{$facility->title}}</span>
                                            <div class="total-range">
                                                <div class="range-slider flat my-range"
                                                     data-ticks-position='top'
                                                     style='--min:{{$extremum['min_facility'][$facility->id]}}; --max:{{$extremum['max_facility'][$facility->id]}}; --value-a:{{isset($form_value->min_facility)?$form_value->min_facility[$facility->id]:  $extremum['min_facility'][$facility->id]}}; --value-b:{{isset($form_value->max_facility)?$form_value->max_facility[$facility->id]:  $extremum['max_facility'][$facility->id]}}; --suffix:""; --text-value-a:"{{isset($form_value->min_facility)?$form_value->min_facility[$facility->id]:  $extremum['min_facility'][$facility->id]}}"; --text-value-b:"{{isset($form_value->max_facility)?$form_value->max_facility[$facility->id]:  $extremum['max_facility'][$facility->id]}}";'>
                                                    <input name="min_facility[{{$facility->id}}]"
                                                           type="range"
                                                           min="{{$extremum['min_facility'][$facility->id]}}"
                                                           max="{{$extremum['max_facility'][$facility->id]}}"
                                                           value="{{isset($form_value->min_facility)?$form_value->min_facility[$facility->id]:  $extremum['min_facility'][$facility->id]}}"
                                                           step="1"
                                                           onclick=""
                                                           oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value)),min_range_fa_buysell(this.value)">
                                                    <output></output>
                                                    <input name="max_facility[{{$facility->id}}]"
                                                           type="range"
                                                           min="{{$extremum['min_facility'][$facility->id]}}"
                                                           max="{{$extremum['max_facility'][$facility->id]}}"
                                                           value="{{isset($form_value->max_facility)?$form_value->max_facility[$facility->id]:  $extremum['max_facility'][$facility->id]}}"
                                                           step="1"
                                                           oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value)),max_range_fa_buysell(this.value)">
                                                    <output></output>
                                                    <div class='range-slider__progress'></div>
                                                </div>

                                            </div>

                                        @endif
                                    @endforeach

                                </div>
                                <div class="filter-conditions">
                                    <span class="title-filter d-flex">شرایط</span>
                                    <table class="borderles">
                                        @foreach($terms as $term)
                                            <td><input name="terms[{{$term->id}}]"
                                                       type="checkbox" id="presell"><label
                                                        for="presell">{{$term->title}}</label>
                                            </td>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <button class="filter-btn">اعمال</button>
    </ul>

</div>