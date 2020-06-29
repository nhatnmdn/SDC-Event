<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SDC-EVENT | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset("user/img/favicon.png")}}" rel="icon">
    <link href="{{asset("user/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <!-- Vendor CSS Files -->
    <link href="{{asset("user/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("user/vendor/icofont/icofont.min.css")}}" rel="stylesheet">
    <link href="{{asset("user/vendor/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
    <link href="{{asset("user/vendor/remixicon/remixicon.css")}}" rel="stylesheet">
    <link href="{{asset("user/vendor/venobox/venobox.css")}}" rel="stylesheet">
    <link href="{{asset("user/vendor/owl.carousel/assets/owl.carousel.min.css")}}" rel="stylesheet">
    <link href="{{asset("user/vendor/aos/aos.css")}}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="{{asset("user/css/style.css")}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,400;1,500&display=swap" rel="stylesheet">

    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/dashboard/">
    <script src="https://kit.fontawesome.com/9174f7bc91.js" crossorigin="anonymous"></script>

</head>
<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar-expand-lg navbar-light bg-light navigation">
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                    <i style="color: black;" class="fas fa-bars"></i>
                </label>
                <label class="logo">
                    <a href="{{route('index')}}"><img src="{{asset("user/images/logo.gif")}}"></a>
                    <h3>Software Development Centre</h3>
                    <p>University of Da Nang</p>
                </label>
                <ul class="bg-light">
                    <li><a style="text-decoration: none;" href="#1">Software Developer</a></li>
                    <li><a style="text-decoration: none;" href="#2">Education</a></li>
                    <li class="dropdown"><a style="text-decoration: none;" href="#3">{{ __('Language') }}</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('language',['vi']) }}">VI</a></li>
                            <li><a href="{{ route('language',['en']) }}">EN</a></li>
                        </ul>
                    </li>
                    @guest()
                        <li><a style="text-decoration: none;" href="{{route('login.form')}}">{{ __('Sign In / Up') }}</a></li>
                    @endguest()
                    @auth()
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                            <ul class="dropdown-menu">
                                @if(!\App\Helpers\GlobalHelper::checkUserRole())
                                    <li><a href="{{route('admin.home')}}"><i class="fas fa-home"></i> <span>{{__('Dashboard')}}</span></a></li>
                                @endif
                                <li><a href="{{route('profile')}}"><i class="fas fa-user-circle"></i> <span>{{__('Profile')}}</span></a></li>
                                <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> <span>{{__('Logout')}}</span></a></li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </div>
</header>
<main id="main">
    {{--    <section id="skills" class="skills">--}}
    <div class="container-fluid" data-aos="fade-up">
        <div class="row">
            @yield('content')
        </div>
    </div>
    {{--    </section>--}}
</main>
<!-- ======= Footer ======= -->
<footer style="float: left">
    <div>
        <a class="add" href=""><i class="fas fa-map-marker-alt"></i>
            <span>41 Le Duan Str., Hai Chau District, Da Nang City</span>
        </a>

        <a class="mail" href=""><i class="fas fa-envelope"></i>
            <span>contact@sdc.udn.vn</span>
        </a>
        <a class="phone" href=""><i class="fas fa-phone-alt"></i>
            <span>(+84) 236.2240.741</span>
        </a>
    </div>
</footer>
<!-- End Footer -->

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{asset("user/vendor/jquery/jquery.min.js")}}"></script>
<script src="{{asset("user/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("user/vendor/jquery.easing/jquery.easing.min.js")}}"></script>
<script src="{{asset("user/vendor/php-email-form/validate.js")}}"></script>
<script src="{{asset("user/vendor/waypoints/jquery.waypoints.min.js")}}"></script>
<script src="{{asset("user/vendor/isotope-layout/isotope.pkgd.min.js")}}"></script>
<script src="{{asset("user/vendor/venobox/venobox.min.js")}}"></script>
<script src="{{asset("user/vendor/owl.carousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("user/vendor/aos/aos.js")}}"></script>

<!-- Template Main JS File -->
<script src="{{asset("user/js/main.js")}}"></script>
@yield('script')
<script>
    $(".navigation li a").click(function () {
        $(".checkbtn").click()
    })

    $("div .alert").delay(5000).slideUp();
</script>
</body>

<style>

    .bg-light ul li:hover .dropdown-menu{
        display: block;
    }
</style>

</html>


