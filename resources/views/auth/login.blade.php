@extends('frontend::layouts.master')
@section('content')

    <div class="clearfix"></div>
    <!-- Header Container / End -->




    <!-- Contact
    ================================================== -->

    <!-- Container -->
    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                 <!--Tab -->
                <div class="my-account style-1 margin-top-5 margin-bottom-40">

                    <ul class="tabs-nav">
                        <li class=""><a href="#tab1">ورود</a></li>
                    </ul>

                    <div class="tabs-container alt">

                        <!-- Login -->
                        <div class="tab-content" id="tab1" style="display: none;">
                            <form id="myform" method="POST" action="{{ route('login') }}">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <label for="username">ایمیل:
                                        <i class="im im-icon-Male"></i>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password">رمز عبور:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    </label>
                                </p>

                                <p class="form-row">
                                    <input type="submit" class="button border margin-top-10" name="login" value="ورود" />

                                    <label for="rememberme" class="rememberme">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    مرا به خاطر بسپار
                                    </label>
                                </p>

                                <p class="lost_password">
                                    <a href="#" >رمز خود را فراموش کرده اید؟</a>
                                </p>

                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
    <!-- Container / End -->



    <!-- Footer
    ================================================== -->
    <div class="margin-top-55"></div>

@endsection
@section('style')
    <link rel="stylesheet" href="/findeo/css/mystyle.css">
@endsection
@section('script')
<script>
       $("form#myform").submit(function(e) {
            e.preventDefault();

            var formdata = new FormData(this);
            $.ajax({
                url: "{{route('login')}}",
                data: formdata,
                processData: false,
                contentType: false,
                type: "post",
                success: function(data, textStatus, xhr) {
                    location.replace("{{route('admin')}}")
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if(jqXHR.status == 422)
                        alert('اطلاعات وارد شده صحیح نمی باشد')
                }
            });
        });
</script>
@endsection