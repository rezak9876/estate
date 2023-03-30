@extends('frontend::layouts.master')
@section('content')
    <section class="fullwidth margin-top-105" data-background-color="#f7f7f7" style="background: rgb(247, 247, 247) none repeat scroll 0% 0%;">

        <!-- Box Headline -->
        <h3 class="headline-box">درباره ما</h3>

        <!-- Content -->
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="fa fa-building"></i>
                            <div class="icon-links">
                                <a>فروشی</a>
                                <a>اجاره ی</a>
                            </div>
                        </div>

                        <h3>با سابقه ترین املاک مازندران</h3>
                        <p> بر اساس بودجه و سلیقه‌ی خودتان مناسب‌ترین مورد را پیدا کنید. با کیلید در وقت و هزینه صرفه‌جویی می‌کنید و با آگاهی و آرامش تمام بر سر معامله می‌روید.</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Icon Box -->
                    <div class="icon-box-1">

                        <div class="icon-container">
                            <i class="fa fa-house"></i>
                            <div class="icon-links">
                                <a>فروشی</a>
                                <a>اجاره ی</a>
                            </div>
                        </div>

                        <h3>تاریخچه املاک</h3>
                        <p>کدام محله؟ کدام آپارتمان؟ کدام آژانس مشاور املاک؟ با استفاده از امکانات جستجوی هوشمند املاک می‌توانید به همه این پرسش‌ها پاسخ دهید</p>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@section('style')
    <link rel="stylesheet" href="/findeo/css/mystyle.css">
@endsection
@section('script')
@endsection