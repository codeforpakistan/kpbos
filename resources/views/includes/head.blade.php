<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from techlinqs.com/html/politics/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jul 2018 10:39:39 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link  href="" rel="shortcut icon" type="image/png">-->
    <title>Bureau of Statistics | Khyber Pakhtunkhwa</title>




    <!-- StyleSheets -->

    <link rel="shortcut icon" href="{{ URL::asset('public/favicon.ico') }}"  type="image/x-icon">
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" href="" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/font-awesome.css') }}" href="" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/icomoon.css') }}" href="" rel="stylesheet">
    <link href="{{ URL::asset('style.css') }}" href="" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/main.css') }}" href="" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/color.css') }}" href="" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/responsive.css') }}" href="" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/transition.css') }}" href="" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/footer.css') }}" href="" rel="stylesheet">



<!--    <link href="{{ URL::asset('assets/css/round-about.css') }}" href="" rel="stylesheet">-->

<!--    <link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" href="" rel="stylesheet">-->

    <!-- FontsOnline -->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700" rel="stylesheet">
    <!-- JavaScripts -->
    <script src="{{ URL::asset('assets/scripts/modernizr.js') }}" src=""></script>
    <style type="text/css">
        marquee span {
            margin-right: 100%;
        }
        marquee p {
            white-space:nowrap;
            margin-right: 1000px;
        }
    </style>

    <style>


        #loading {
            -webkit-animation: rotation 5s infinite linear;
        }

        @-webkit-keyframes rotation {
            from {
                -webkit-transform: rotatey(0deg);
            }
            to {
                -webkit-transform: rotatey(359deg);
            }
        }
         li > a:hover{
            color: white !important;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130639840-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130639840-1');
</script>

</head>
<body class="bg-pattern">

<!-- Wrapper -->
<div class="wrapper push-wrapper">


<!-- Forms -->

<!-- Header -->
<header class="header">

    <!-- Logo Bar -->
    <div class="logo-bar">

        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-sm-2 col-xs-2">
                    <div>
                        <a href="{{ url('/') }}"><img id="loading" src="{{ URL::asset('assets/images/logo.png') }}" src="" alt="" style="height: 80px;"></a>
                    </div>

                </div>
                <div class="col-lg-9  col-sm-5 col-xs-5">
                    <div class="left-side p-m-0">
                   <p style="font-weight: bold; font-family: Arial,Helvetica Neue,Helvetica,sans-serif; color: #000000; font-size: 18px; "><span>Bureau Of Statistics Planning & Development Department<br> Government of KP</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-5 col-xs-5" style="margin-top: 30px;">
                    <div>

                        <a style="display: inline" target="_blank" title="follow me on twitter" href="https://www.twitter.com/#"><img alt="follow me on twitter" src="{{ url('public/twitter.png') }}" border=0></a>

                        <a style="display: inline" target="_blank" title="find us on Facebook" href="https://www.facebook.com/#"><img alt="follow me on facebook" src="{{ url('public/facebook.png') }}" border=0></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Logo Bar -->

    <!-- Nav Holder -->
    <nav class="nav-holder">

        <!-- Nav Nd Caption -->


            <!-- Nav Lsit -->
        <div class="container">

            <div class="nav-inner after-clear">
                <ul id="responsive-menu" class="nav-list menu-head">
                    @foreach($menus as $menu)
                    <li style="margin-left: 28px;">
                        <a href="{{ url('main_menu') }}/{{ $menu->id }}" >{{ $menu->name }}</a>
                        @php
                        $children = DB::table('sub_menus')->where('menu_id',$menu->id)->get();
                        @endphp
                        @if(!$children->isEmpty())
                        <ul>
                            @foreach($children as $child)
                            <li><a href="{{ url('sub_menu') }}/{{ $child->id }}" >{{ $child->name }}</a></li>
                            @endforeach
                        </ul>
                        @endif

<!--                        <ul>-->
<!--                            <li><a href="index-2.html">Home 1</a></li>-->
<!--                            <li><a href="index-3.html">Home 2</a></li>-->
<!--                            <li><a href="index-4.html">Home 3</a></li>-->
<!--                        </ul>-->
                    </li>
                    @endforeach
                    <li><a href="{{ url('#') }}">About Us</a>
                        <ul>
                            <li><a href="{{ url('about_kpbos')}}">About KPBOS</a></li>
                            <li><a href="{{ url('hierarchy')}}" >Organization Hierarchy</a></li>
                            <li><a href="{{ url('contact_us')}}" >Contact Us</a></li>

                        </ul>

                    </li>

                    <li><a href="{{ url('all_achievements') }}">Achievements</a>

                    </li>



                    <li><a href="{{ url('#') }}">Media</a>
                    <ul>
                        <li><a href="{{ url('images')}}">Images</a></li>
                        <li><a href="{{ url('videos')}}" >Videos</a></li>
                    </ul>

                    </li>


                    <li><a href="{{ url('allpublications') }}">Publications</a>
                    <ul>
                        @foreach($publication_names as $publication_name)
                        <li><a href="{{ url('allpublication') }}/{{ $publication_name->id }}">{{ $publication_name->name}}</a></li>
                        @endforeach
                    </ul>
                    </li>
                    <li><a href="{{ url('allnews') }}">News And Event</a></li>

                </ul>
                <ul class="language-dropdown">
                    <li><a href="#"><img src="assets/images/flags/flag.jpg" alt=""></a></li>
                </ul>
            </div>
        </div>

            <div>

<!--                <span>Khyber Pakhtunkhwa  Bureau Of Statistics</span>-->
                <br><br>
<!--                <marquee scrollamount="10"  onmouseover="this.stop();" onmouseout="this.start();">-->
<!--                @foreach($allnews as $news)-->
<!---->
<!--                   <span style="color: white" onclick="window.location='singlenews'+'/'+--><?php //echo $news->id ?><!--">  {{ $news->description }} </span>-->
<!---->
<!--                @endforeach-->
<!--                </marquee>-->



            </div>
            <!-- Year Quest -->


        <!-- Nav Nd Caption -->

    </nav>
    <!-- Nav Holder -->

</header>
<!-- Header -->
@yield('middle')
<!-- Footer -->
<footer class="footer-distributed">

    <div class="footer-left">

        <a href="{{ url('/') }}"><img id="loading" src="{{ URL::asset('assets/images/logo.png') }}" src="" alt="" style="height: 80px;"><span style="font-size: 12px; color: white"><br> Bureau Of Statistics Planning & Development Department<br>Gov of Khyber Pakhtunkhwa</span></a>

        <div class="footer-icons">

            <a href="#"><i style="padding-top: 7px;" class="fa fa-facebook"></i></a>
            <a href="#"><i style="padding-top: 7px;" class="fa fa-twitter"></i></a>


        </div>

        <div>
            <p>VISITORS: <a href="#" target="_blank" title="Web Counter">
                    <img src="https://smallseotools.com/counterDisplay?code=abeeea78753b1d58ab1f336a97e06d68&style=0006&pad=5&type=page&initCount=0"  title="Web Counter" Alt="Web Counter" border="0">
                </a></p>
        </div>

        <p>
            <strong style="color: white;">Last Updated: 28th November 2018</strong>
        </p>


    </div>

    <div class="footer-center" style=" margin-top: 2%;">


        <span style="font-size: 16px; color: white;">Important Links</span><br>
        <p class="footer-links" style="padding: 10px; margin: 10px 10px 10px 10px">
            .
            <a href="{{ url('/') }}">Home</a> <br>
            ·
            <a href="{{ url('about_kpbos') }}">About Us</a><br>
            ·
            <a href="{{ url('all_achievements') }}">Achievements</a><br>
            ·
            <a href="{{ url('allpublications') }}">Publications</a><br>

            ·
            <a href="{{ url('images') }}">Media</a><br>

            ·
            <a href="{{ url('allnews') }}">News And Events</a><br>


        </p>



    </div>

    <div class="footer-right" style=" margin-top: 2%;">
        <div style="margin-left: 7%;"><span style="font-size: 16px; color: white;">Contact Us</span></div><br>

        <table>
            <tbody>
            <tr><td> <i style="margin-bottom: 30px; color: white; margin-right: 3%;"  class="fa fa-x fa-map-marker"></i></td><td>  <p style="color: white; margin-left: 10%;">Bureau of Statistics,<br> Planning and Development Department <br> Government of Khyber Pakhtunkhwa</p></td></tr>
            <tr><td><i style="margin-bottom: 30px; color: white; margin-right: 3%;"  class="fa fa-x fa fa-phone"></i></td><td> <p style="color: white; margin-left: 10%;">+92 91 9211183</p></td></tr>
            <tr><td><i style="margin-bottom: 30px; color: white; margin-right: 3%;"  class="fa fa-x fa fa-envelope"></i></td><td>  <p ><a style="color: white; margin-left: 10%;" href="mailto:support@company.com">kpkbsts@gmail.com</a></p></td></tr>
            </tbody>
        </table>
        <div>


        </div>

        <div>


        </div>

        <div>


        </div>









    </div>

</footer>
<!-- Footer -->

</div>
<!-- Wrapper -->

<!-- Java Script -->

<script src="{{ URL::asset('assets/scripts/jquery.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/bootstrap.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/jquery-ui.js') }}" src=""></script>
<script  src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="{{ URL::asset('assets/scripts/gmap3.min.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/menu.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/rangeslider.min.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/slick.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/countdown.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/countTo.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/appear.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/prettyPhoto.js') }}" src=""></script>
<script src="{{ URL::asset('assets/scripts/isotope.pkgd.js') }}" src=""></script>
<!-- Put all Functions in functions.js -->
<script src="{{ URL::asset('assets/scripts/functions.js') }}" src=""></script>

<!--<script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>-->
<!--<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>-->






</body>

<!-- Mirrored from techlinqs.com/html/politics/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Jul 2018 10:43:04 GMT -->
</html>
