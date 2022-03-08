@include("frontend::layouts.head")
<!-- Body main wrapper start -->
<div class="wrapper">

    <!-- HEADER AREA START (header-5) -->
@include("frontend::layouts.menu-b")
<!-- HEADER AREA END -->
    <button class="btn-filter-respons rotate" id="button-filter"></button>
    <!-- Utilize Cart Menu Start -->
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="mini-cart-product-area ltn__scrollbar">
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="/quarter/img/product/1.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Wheel Bearing Retainer</a></h6>
                        <span class="mini-cart-quantity">1 x $65.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="/quarter/img/product/2.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Brake Conversion Kit</a></h6>
                        <span class="mini-cart-quantity">1 x $85.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="/quarter/img/product/3.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">OE Replica Wheels</a></h6>
                        <span class="mini-cart-quantity">1 x $92.00</span>
                    </div>
                </div>
                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="/quarter/img/product/4.png" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="#">Shock Mount Insulator</a></h6>
                        <span class="mini-cart-quantity">1 x $68.00</span>
                    </div>
                </div>
            </div>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>Subtotal: <span>$310.00</span></h5>
                </div>
                <div class="btn-wrapper">
                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                    <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                <p>Free Shipping on All Orders Over $100!</p>
            </div>

        </div>
    </div>
    <!-- Utilize Cart Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="index-2.html"><img src="/quarter/img/logo.png" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li><a href="#">خانه</a></li>
                    <li><a href="#">درباره ما</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">درباره</a></li>
                            <li><a href="service.html">سرویس ها</a></li>
                            <li><a href="team.html">تیم ما</a></li>
                            <li><a href="locations.html">گوگل مپ</a></li>
                        </ul>
                    </li>
                    <li><a href="#">فروشگاه</a></li>
                    <li><a href="contact.html">تماس با ما</a></li>
                </ul>
            </div>
            <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                    <li>
                        <a href="account.html" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                            حساب من
                        </a>
                    </li>
                    <li>
                        <a href="wishlist.html" title="Wishlist">
                            <span class="utilize-btn-icon">
                                <sup>3</sup>
                                <i class="far fa-heart"></i>
                            </span>
                            علاقه مندی ها
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('filter')}}" id="filter_form" method="post">
                        @include('frontend::layouts.form_filter')
                    </form>
                    <div class="row ltn__product-slider-item-three-active--- slick-arrow-1" id="estates_area">
                        <!-- ltn__product-item -->
                        {{--@if($estates->count() > 0)--}}
                            {{--@include('frontend::layouts.estates')--}}
                        {{--@else--}}
                            {{--<p class="text-center">نتیجه ای یافت نشد</p>--}}
                        {{--@endif--}}
                    </div>
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.php"><img src="/quarter/img/product-3/2.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/quarter/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Sale</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.php">New Apartment Nice View</a></h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="my-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.php" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.php"><img src="/quarter/img/product-3/3.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/quarter/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Rent</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.php">New Apartment Nice View</a></h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="my-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.php" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.php"><img src="/quarter/img/product-3/4.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/quarter/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Rent</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.php">New Apartment Nice View</a></h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="my-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.php" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.php"><img src="/quarter/img/product-3/5.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/quarter/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Rent</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.php">New Apartment Nice View</a></h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="my-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.php" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- ltn__product-item -->
                    <!-- <div class="col-xl-4 col-sm-6 col-12">
                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                        <div class="product-img">
                            <a href="product-details.php"><img src="/quarter/img/product-3/6.jpg" alt="#"></a>
                            <div class="real-estate-agent">
                                <div class="agent-img">
                                    <a href="team-details.html"><img src="/quarter/img/blog/author.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-badge">
                                <ul>
                                    <li class="sale-badg">For Rent</li>
                                </ul>
                            </div>
                            <h2 class="product-title"><a href="product-details.php">New Apartment Nice View</a></h2>
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                <li><span>3 </span>
                                    Bed
                                </li>
                                <li><span>2 </span>
                                    Bath
                                </li>
                                <li><span>3450 </span>
                                    Square Ft
                                </li>
                            </ul>
                            <div class="product-hover-action">
                                <ul>
                                    <li>
                                        <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick_view_modal">
                                            <i class="flaticon-expand"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="Wishlist" data-bs-toggle="modal" data-bs-target="#liton_wishlist_modal">
                                            <i class="my-heart"></i></a>
                                    </li>
                                    <li>
                                        <a href="product-details.php" title="Product Details">
                                            <i class="flaticon-add"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info-bottom">
                            <div class="product-price">
                                <span>$34,900<label>/Month</label></span>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <!--  -->
                </div>
            </div>
            <div class="see-more-products">
                <button id="see_more">مشاهده بیشتر</button>
            </div>
        </div>
        <!-- <div class="col-lg-4">
                    <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                        <h3 class="mb-10">Advance Information</h3>
                        <label class="mb-30"><small>About 9,620 results (0.62 seconds) </small></label>
                        <div class="widget ltn__menu-widget">
                            <h4 class="ltn__widget-title">Property Type</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">House
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,924</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Single Family
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,610</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Apartment
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,912</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Office Villa
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,687</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Luxary Home
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">1,853</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Studio
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">893</span>
                                </li>
                            </ul>
                            <hr>
                            <h4 class="ltn__widget-title">Amenities</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">Dishwasher
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,924</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Floor Coverings
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,610</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Internet
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,912</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Build Wardrobes
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,687</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Supermarket
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">1,853</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Kids Zone
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">893</span>
                                </li>
                            </ul>
                            <hr>
                            <h4 class="ltn__widget-title">Price Renge</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">Low Budget
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">$5,000 - $10,000</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Medium
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">$10,000 - $30,000</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">High Budget
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">$30,000 Up</span>
                                </li>
                            </ul>
                            <hr>
                            <div class="widget--- ltn__price-filter-widget">
                                <h4 class="ltn__widget-title ltn__widget-title-border---">Filter by price</h4>
                                <div class="price_filter">
                                    <div class="price_slider_amount">
                                        <input type="submit"  value="Your range:"/>
                                        <input type="text" class="amount" name="price"  placeholder="Add Your Price" />
                                    </div>
                                    <div class="slider-range"></div>
                                </div>
                            </div>
                            <hr>
                            <h4 class="ltn__widget-title">Bed/bath</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">Single
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,924</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Double
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,610</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Up To 3
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,912</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Up To 5
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,687</span>
                                </li>
                            </ul>
                            <hr>
                            <h4 class="ltn__widget-title">Catagory</h4>
                            <ul>
                                <li>
                                    <label class="checkbox-item">Buying
                                        <input type="checkbox" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,924</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Renting
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">3,610</span>
                                </li>
                                <li>
                                    <label class="checkbox-item">Selling
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <span class="categorey-no">2,912</span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget ltn__menu-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product categories</h4>
                            <ul>
                                <li><a href="#">Body <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Interior <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Lights <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Parts <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Tires <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Uncategorized <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                                <li><a href="#">Wheel <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="widget ltn__price-filter-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Filter by price</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit"  value="Your range:"/>
                                    <input type="text" class="amount" name="price"  placeholder="Add Your Price" />
                                </div>
                                <div class="slider-range"></div>
                            </div>
                        </div>
                        <div class="widget ltn__top-rated-product-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Top Rated Product</h4>
                            <ul>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.php"><img src="/quarter/img/product/1.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.php">Mixel Solid Seat Cover</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.php"><img src="/quarter/img/product/2.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.php">Brake Conversion Kit</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="top-rated-product-item clearfix">
                                        <div class="top-rated-product-img">
                                            <a href="product-details.php"><img src="/quarter/img/product/3.png" alt="#"></a>
                                        </div>
                                        <div class="top-rated-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <h6><a href="product-details.php">Coil Spring Conversion</a></h6>
                                            <div class="product-price">
                                                <span>$49.00</span>
                                                <del>$65.00</del>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget ltn__search-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Search Objects</h4>
                            <form action="#">
                                <input type="text" name="search" placeholder="Search your keyword...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget ltn__tagcloud-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Popular Tags</h4>
                            <ul>
                                <li><a href="#">Popular</a></li>
                                <li><a href="#">desgin</a></li>
                                <li><a href="#">ux</a></li>
                                <li><a href="#">usability</a></li>
                                <li><a href="#">develop</a></li>
                                <li><a href="#">icon</a></li>
                                <li><a href="#">Car</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Repairs</a></li>
                                <li><a href="#">Auto Parts</a></li>
                                <li><a href="#">Oil</a></li>
                                <li><a href="#">Dealer</a></li>
                                <li><a href="#">Oil Change</a></li>
                                <li><a href="#">Body Color</a></li>
                            </ul>
                        </div>
                        <div class="widget ltn__tagcloud-widget ltn__size-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product Size</h4>
                            <ul>
                                <li><a href="#">S</a></li>
                                <li><a href="#">M</a></li>
                                <li><a href="#">L</a></li>
                                <li><a href="#">XL</a></li>
                                <li><a href="#">XXL</a></li>
                            </ul>
                        </div>
                        <div class="widget ltn__color-widget d-none">
                            <h4 class="ltn__widget-title ltn__widget-title-border">Product Color</h4>
                            <ul>
                                <li class="black"><a href="#"></a></li>
                                <li class="white"><a href="#"></a></li>
                                <li class="red"><a href="#"></a></li>
                                <li class="silver"><a href="#"></a></li>
                                <li class="gray"><a href="#"></a></li>
                                <li class="maroon"><a href="#"></a></li>
                                <li class="yellow"><a href="#"></a></li>
                                <li class="olive"><a href="#"></a></li>
                                <li class="lime"><a href="#"></a></li>
                                <li class="green"><a href="#"></a></li>
                                <li class="aqua"><a href="#"></a></li>
                                <li class="teal"><a href="#"></a></li>
                                <li class="blue"><a href="#"></a></li>
                                <li class="navy"><a href="#"></a></li>
                                <li class="fuchsia"><a href="#"></a></li>
                                <li class="purple"><a href="#"></a></li>
                                <li class="pink"><a href="#"></a></li>
                                <li class="nude"><a href="#"></a></li>
                                <li class="orange"><a href="#"></a></li>

                                <li><a href="#" class="orange"></a></li>
                                <li><a href="#" class="orange"></a></li>
                            </ul>
                        </div>
                        <div class="widget ltn__banner-widget d-none">
                            <a href="shop.html"><img src="/quarter/img/banner/banner-2.jpg" alt="#"></a>
                        </div>

                    </aside>
                </div> -->
    </div>
</div>
</div>
<!-- PRODUCT DETAILS AREA END -->

<!-- CALL TO ACTION START (call-to-action-6) -->
<div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bs-bg="/quarter/img/1.jpg--">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg position-relative text-center---">
                    <div class="coll-to-info text-color-white">
                        <h1>به دنبال خانه ای رویایی هستید؟</h1>
                        <p>ما می توانیم به شما در تحقق رویای خانه جدید کمک کنیم</p>
                    </div>
                    <div class="btn-wrapper">
                        <a class="btn btn-effect-3 btn-white" href="contact.html">افزودن آگهی</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CALL TO ACTION END -->
<!-- CALL TO ACTION END -->
@include("frontend::layouts.footer")

<!-- MODAL AREA START (Quick View Modal) -->
<div class="ltn__modal-area ltn__quick-view-modal-area">
    @foreach($estates as $estate)
        <div class="modal fade" id="quick_view_modal{{$estate->id}}" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <div class="imagebox-m">

                                            @if($estate->main_picture)
                                                <img
                                                        src="{{$estate->thumbnail_picture() }}"
                                                        alt="" width="100%" height="100%">
                                            @else
                                                <img
                                                        src="https://picsum.photos/200/300"
                                                        alt="" width="100%" height="100%">
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    <li class="review-total"><a href="#"> ( 95 نظر )</a></li>
                                                </ul>
                                            </div>
                                            <h3>{{$estate->title}}</h3>
                                            <div class="product-price">
                                                @if($estate->type == \App\Estate::Mortgage_Rent)
                                                    <div>
                                                        <label class="modal-price-text">رهن :</label>
                                                        <span class="price-db">{{number_format($estate->mortgage_price)}}</span>
                                                        <span class="million-t"></span>
                                                    </div>
                                                    <div>
                                                        <label class="modal-price-text">اجاره :</label>
                                                        <span class="price-db">{{number_format($estate->rent_price)}}</span>
                                                        <span class="million-t"></span>
                                                    </div>
                                                @else
                                                    <div>
                                                        <label class="modal-price-text">قیمت :</label>
                                                        <span class="price-db">{{number_format($estate->total_price)}}</span>
                                                        <span class="million-t"></span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1">
                                                <ul>
                                                    <li>
                                                        <strong>نوع کاربری :</strong>
                                                        <span>
                                                        <a href="#">{{$estate->use_type->title}}
                                                            / {{$estate->use_type_property->title}}</a>
                                                    </span>
                                                    </li>
                                                    <li class="metr">
                                                        <strong>متراژ :</strong>
                                                        <span>
                                                        <a href="#">{{$estate->area}}</a>
                                                    </span>
                                                    </li>
                                                    <li>
                                                        <strong>شهر و محله :</strong>
                                                        <span>
                                                        <a href="#">{{$estate->neighborhood->title}}</a>
                                                    </span>
                                                    </li>
                                                    <li>
                                                            <div class="row">

                                                                <div class="col-2">

                                                                    <strong>آدرس :</strong>
                                                                </div>
                                                                <div class="col-10">

                                                                        <span>
                                                                        <a href="#"> {{$estate->address}} </a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li>اشتراک گذاری با :</li>
                                                    <li><a href="#" title="Facebook"><i
                                                                    class="fab fa-facebook-f"></i></a>
                                                    </li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                                    </li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                                                    </li>
                                                    <li><a href="#" title="Instagram"><i
                                                                    class="fab fa-instagram"></i></a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<!-- MODAL AREA END -->

<!-- MODAL AREA START (Add To Cart Modal) -->
<div class="ltn__modal-area ltn__add-to-cart-modal-area">
    <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="ltn__quick-view-modal-inner">
                        <div class="modal-product-item">
                            <div class="row">
                                <div class="col-12">
                                    <div class="modal-product-img">
                                        <img src="/quarter/img/product/1.png" alt="#">
                                    </div>
                                    <div class="modal-product-info">
                                        <h5><a href="product-details.php">Brake Conversion Kit</a></h5>
                                        <p class="added-cart"><i class="fa fa-check-circle"></i> Successfully added to
                                            your Cart</p>
                                        <div class="btn-wrapper">
                                            <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                                            <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                        </div>
                                    </div>
                                    <!-- additional-info -->
                                    <div class="additional-info d-none">
                                        <p>We want to give you <b>10% discount</b> for your first order, <br> Use
                                            discount code at checkout</p>
                                        <div class="payment-method">
                                            <img src="/quarter/img/icons/payment.png" alt="#">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL AREA END -->

<!-- MODAL AREA START (Wishlist Modal) -->
<!-- MODAL AREA END -->

</div>
<!-- Body main wrapper end -->

<!-- All JS Plugins -->
<!-- Main JS -->
<script src="/quarter/js/bootstrap.min.js"></script>
<script src="/quarter/js/jquery.js"></script>

{{--<script src="/quarter/js/choices.js"></script>--}}
<script src="/quarter/js/plugins.js"></script>
<script src="/quarter/js/main.js"></script>
<script>

    // $("select[name=province]").change(function (e) {
    //     change_neighborhoods(e.target.value);
    // });
    $(".usetypesproperty_li").click(function (e) {
        $(this).prev().prop('checked', !$(this).hasClass("selected"));
    });


    //
    // function change_neighborhoods(type) {
    //     alert(type);
    //     console.log($(".choices__list[dir=ltr]"))
    //
    // }

    {{--var Buy_Sell = "type{{\App\Estate::Buy_Sell}}";--}}
    {{--var Mortgage_Rent = "type{{\App\Estate::Mortgage_Rent}}";--}}
    {{--var Presell = "type{{\App\Estate::Presell}}";--}}
    {{--var Exchange = "type{{\App\Estate::Exchange}}";--}}

    $('form#filter_form').submit(function (e) {
        e.preventDefault();
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
                $('#estates_area').html(result);
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
    }

    $('#see_more').click(function (e) {
        step_value = $("input[name=step]").val();
        step_value+=18;
        $("input[name=step]").val(step_value)

        var data = new FormData($('form#filter_form')[0]);
        $.ajax({
            processData: false,
            contentType: false,

            data: data,
            type: 'POST',
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

    $('.filter-btn').click(function (e) {
        $('#see_more').prop("disabled", false);
    });

    $(document).ready(function(){
        $("#filter_form").submit();
    });
</script>
@yield('end')

{{--//select2--}}


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // $(document).ready(function () {
    //     $('.js-example-basic-multiple').select2();
    // });

    $(document).ready(function () {
        $(".js-example-basic-multiple").select2({
            maximumSelectionLength: 2
        });
    });
    // $('select[name=province]').on('change', function () {
    //     $('#mySelect2').val(null).trigger('change');
    //     province_id = this.value
    //     $('.js-example-basic-multiple').children().each(function () {
    //         if ($(this).data('province') == province_id) {
    //             $(this).prop('disabled', false)
    //                 .removeClass('d-none')
    //         }
    //         else {
    //             $(this).prop('disabled', true)
    //                 .addClass('d-none')
    //         }
    //     });
    //     // $('.js-example-basic-multiple').html('hi')
    // });
</script>
<script src="/quarter/js/rtl.js"></script>

</body>

</html>