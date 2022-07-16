<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Magazine</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>

        <div class="logo-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                        <a href="index.html">
                            <img class="img-fluid" src="img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                        <img class="img-fluid" src="img/banner-ad.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="logo-wrap"> --}}
        <div class="container main-menu" id="main-menu">
            <div class="row align-items-center justify-content-between">
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="index.html">Home</a></li>
                        <li><a href="archive.html">Favorites</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
                <div class="navbar-right">
                    <ul class="nav-menu">
                        <li><a href="about.html">Login</a></li>
                        <li><a href="contact.html">Register</a></li>
                        <li class="menu-has-children"><a href="javascript:void(0);">Post Types</a>
                            <ul>
                                <li><a href="standard-post.html">Standard Post</a></li>
                                <li><a href="image-post.html">Image Post</a></li>
                                <li><a href="gallery-post.html">Gallery Post</a></li>
                                <li><a href="video-post.html">Video Post</a></li>
                                <li><a href="audio-post.html">Audio Post</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </header>

    <div class="site-main-container">
        @yield('content')
    </div>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="js/vendor/bootstrap.min.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> --}}
    {{-- <script src="js/easing.min.js"></script> --}}
    {{-- <script src="js/hoverIntent.js"></script> --}}
    {{-- <script src="js/superfish.min.js"></script> --}}
    {{-- <script src="js/jquery.ajaxchimp.min.js"></script> --}}
    {{-- <script src="js/jquery.magnific-popup.min.js"></script> --}}
    {{-- <script src="js/mn-accordion.js"></script> --}}
    {{-- <script src="js/jquery-ui.js"></script> --}}
    {{-- <script src="js/jquery.nice-select.min.js"></script> --}}
    {{-- <script src="js/owl.carousel.min.js"></script> --}}
    {{-- <script src="js/mail-script.js"></script> --}}
    <script src="js/main.js"></script>
</body>

</html>