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
                        <li><a href="#tab2">ثبت نام</a></li>
                    </ul>

                    <div class="tabs-container alt">

                        <!-- Login -->
                        <div class="tab-content" id="tab1" style="display: none;">
                            <form id="loginform" method="POST" action="{{ route('login') }}">
                                @csrf
                                <p class="form-row form-row-wide">
                                    <label for="username">موبایل:
                                        <i class="im im-icon-Male"></i>
                                        <input id="mobile" type="text"
                                            class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                            value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password">رمز عبور:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                    </label>
                                </p>

                                <p class="form-row">
                                    <input type="submit" class="button border margin-top-10" name="login" value="ورود" />

                                    <label for="rememberme" class="rememberme">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        مرا به خاطر بسپار
                                    </label>
                                </p>

                                <p class="lost_password">
                                    <a href="#">رمز خود را فراموش کرده اید؟</a>
                                </p>

                            </form>
                        </div>


                        <!-- Register -->
                        <div class="tab-content" id="tab2" style="display: none;">

                            <form id="registerform" method="POST" action="{{ route('register') }}" class="register">
                                @csrf

                                <p class="form-row form-row-wide">
                                    <label for="name">نام :
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="name" id="name" value="" />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="mobile">موبایل :
                                        <i class="im im-icon-Male"></i>
                                        <input type="text" class="input-text" name="mobile" id="mobile" value="" />
                                    </label>
                                </p>


                                <p class="form-row form-row-wide">
                                    <label for="password">رمز عبور:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password" id="password" />
                                    </label>
                                </p>

                                <p class="form-row form-row-wide">
                                    <label for="password_confirmation">تکرار رمز عبور:
                                        <i class="im im-icon-Lock-2"></i>
                                        <input class="input-text" type="password" name="password_confirmation"
                                            id="password_confirmation" />
                                    </label>
                                </p>

                                <p class="form-row">
                                    <input type="submit" class="button border fw margin-top-10" name="register"
                                        value="ثبت نام" />
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
        $("form#loginform").submit(function(e) {
            e.preventDefault();

            $("input[name='login']").prop("disabled", true);
            $("input[name='login']").val("...");
            var formdata = new FormData(this);
            $.ajax({
                url: "{{ route('login') }}",
                data: formdata,
                processData: false,
                contentType: false,
                type: "post",
                success: function(data, textStatus, xhr) {
                    location.replace("{{ route('admin') }}")
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 422)
                        alert('اطلاعات وارد شده صحیح نمی باشد')
                },
                complete: function(data) {
                    $("input[name='login']").prop("disabled", false);
                    $("input[name='login']").val("ورود");
                }
            });
        });


        $("form#registerform").submit(function(e) {
            e.preventDefault();
            $("input[name='register']").prop("disabled", true);
            $("input[name='register']").val("...");
            var formdata = new FormData(this);
            $.ajax({
                url: "{{ route('register') }}",
                data: formdata,
                processData: false,
                contentType: false,
                type: "post",
                success: function(data, textStatus, xhr) {
                    location.replace("{{ route('admin') }}")
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 422) {
                        let err = jqXHR.responseJSON.errors
                        let first_key = Object.keys(err)[0]
                        let message = err[first_key][0]
                        alert(message)
                    }
                },
                complete: function(data) {
                    $("input[name='register']").prop("disabled", false);
                    $("input[name='register']").val("ثبت نام");
                }
            });
        });
    </script>
@endsection
