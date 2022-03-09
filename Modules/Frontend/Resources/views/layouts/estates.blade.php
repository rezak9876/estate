@foreach($estates as $estate)

    <!-- Listing Item -->
    <div class="listing-item">

        <a href="{{route('show',$estate->slug)}}" class="listing-img-container" style="margin: auto">

            <div class="listing-badges">
                <span>{{$estate->type()}}</span>
            </div>

            <div class="listing-img-content d-flex align-items-center" style="background-color: rgba(74,74,76,0.7);">

            @if($estate->type == \Modules\Estate\Entities\Estate::Mortgage_Rent)
                    <span class="listing-price">
                        {{number_format($estate->rent_price)}}
                        اجاره</span>
                    <br>
                    <span class="listing-price">+{{number_format($estate->mortgage_price)}}
                        رهن
                        </span>
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
                 alt="">

        </a>

        <div class="listing-content">

            <div class="listing-title">
                <h4><a href="{{route('show',$estate->slug)}}">{{$estate->title}}</a></h4>
                <a href="{{route('show',$estate->slug)}}"
                   class="listing-address popup-gmaps">
                    <i class="fa fa-map-marker"></i>
                    @if($estate->neighborhood->title)
                        {{$estate->neighborhood->title}}
                    @else
                        {{substr($estate->address,30).'...'}}
                    @endif
                </a>

                <a href="{{route('show',$estate->slug)}}" class="details button border">جزئیات</a>
            </div>

            <ul class="listing-details">
                <li>{{$estate->area}} متر مربع</li>
                <li>سال ساخت:{{$estate->year_of_construction}}</li>
                {{--<li>1 اتاق</li>--}}
                {{--<li>1 حمام</li>--}}
            </ul>

            <div class="listing-footer">
                <a href="{{route('show',$estate->slug)}}"><i class="fa fa-eye"></i>{{$estate->views}}</a>
                <span><i class="fa fa-calendar-o"></i>{{verta($estate->updated_at)->formatDifference()}}</span>
            </div>

        </div>

    </div>
    <!-- Listing Item / End -->

@endforeach
