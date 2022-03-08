@foreach($estates as $estate)
    <div class="col-xl-4 col-sm-6 col-12">
        <div class="d-flex ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
            <div class="product-img">
                <div>
                    {{$estate->type()}}
                </div>
                <a href="{{route('show',$estate->slug)}}">
                    @if($estate->main_picture)
                        <img
                                src="{{$estate->thumbnail_picture()}}"
                                alt=""
                                width="150px" height="175px">
                    @else
                        <img
                                src="https://picsum.photos/200/300"
                                alt=""
                                width="150px" height="175px">
                    @endif
                </a>

                <!-- <div class="real-estate-agent">
                                        <div class="agent-img">
                                            <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
                                        </div>
                                    </div> -->
            </div>
            <div class="product-info d-flex flex-direction-column w-100">
                <!-- <div class="product-badge">
            <ul>
                <li class="sale-badg">For Rent</li>
            </ul>
        </div> -->
                <div class="">
                    <h2 class="product-title"><a
                                href="{{route('show',$estate->slug)}}">{{$estate->title}}</a></h2>
                </div>
                <div class="d-flex">
                    <div class="product-img-location mb10 nowarp">
                        <ul>


                            <li>
                                @if($estate->type == \App\Estate::Mortgage_Rent)

                                    <a></s><i class="flaticon-pin"></i>
                                        <label>رهن:</label><span>{{number_format($estate->mortgage_price)}} تومان</span>
                                    </a>
                                    <a>
                                        <i class="flaticon-pin"></i>
                                        <label>اجاره:</label> <span>{{number_format($estate->rent_price)}} تومان</span>
                                    </a>
                                @else
                                    <a>

                                        <i class="flaticon-pin"></i>
                                        <label>قیمت:</label> <span>{{number_format($estate->total_price)}} تومان</span>
                                    </a>

                                @endif
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-4">
                                        <a>
                                            <i class="flaticon-pin"></i>
                                            <label>متراژ:</label> <span>{{$estate->area}}</span>
                                        </a>
                                    </div>

                                    <div class="col-6">
                                        <a>
                                            <i class="flaticon-pin"></i>
                                            @if($estate->year() != 0)
                                                <span>{{$estate->year()}}</span><label>سال ساخت</label>
                                            @else
                                                <label>نوساز</label>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="locations.html"><i class="flaticon-pin"></i>{{substr($estate->address,0,30)}}
                                    ...</a>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="product-info-bottom">
                <div class="product-price">
                    <span>$34,900</span>
                </div>
            </div> -->
                </div>
                <div class="product-hover-action icons-products-list">
                    <ul>
                        <li>
                            <a href="#" title="Quick View" data-bs-toggle="modal"
                               data-bs-target="#quick_view_modal{{$estate->id}}">
                                <i class="flaticon-expand"></i>
                            </a>
                        </li>
                        {{--<li>--}}
                        {{--<a href="javascript:void();">--}}
                        {{--<i class="my-heart"></i></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="{{route('show',$estate->slug)}}" title="Product Details">--}}
                        {{--<i class="flaticon-add"></i>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
                <!-- <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
            <li><span>3 </span>
                Bed
            </li>
            <li><span>2 </span>
                Bath
            </li>
            <li><span>3450 </span>
                Square Ft
            </li>
        </ul> -->

            </div>
        </div>
    </div>
@endforeach



