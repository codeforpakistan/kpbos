<!DOCTYPE html>
<html lang="en">
<head>
    <title>KPBOS</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/login/bootstrap.min.css" />
    <link rel="stylesheet" href="public/login//bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="public/login/maruti-login.css" />
    <link  href="public/login/logo.png" rel="shortcut icon" type="image/png">
</head>
<body>
<div id="loginbox">
    <form method="post" id="loginform" class="form-vertical" action="{{ url('admin_login') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div class="control-group normal_text">
            <h4 style="margin-left: 20px; font-size: 18px;">
                <img style="height: 60px;margin-left: -70px" src="public/login/logo.png" alt="Logo" />
                &nbsp; &nbsp;Bureau Of Statistics </h4>
            <h5 style="margin-top: -30px">(Khyber Pakhtunkhwa)</h5>


            <div style="position: absolute; width:60%; margin-left: 95px; margin-top: -60px; display: none" class="alert alert-warning msg"></div>
        </div>

        @if(Session::has('msg'))
        <div  class="alert-danger" style="font-weight: bold; color: red; padding: 5%; "><span style="margin-left: 20%"> {{ Session::get('msg') }}</span>  </div>

        @endif
        <div class="control-group">
            <div class="controls">

                <div class="main_input_box">

                    <span class="add-on"><i class="icon-user"></i></span><input type="text" placeholder="Email" name="email"/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password"/>
                </div>
            </div>
        </div>
        <div class="form-actions">
<!--            <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Lost password?</a></span>-->
            <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
        </div>
    </form>
    <form id="recoverform" action="#" class="form-vertical">
        <p class="normal_text">
            <img style="height: 60px;margin-left: -10px" src="public/login/logo.png'?>" alt="Logo" />
            <i style="font-size: 14px; font-weight: bold">   Provincial Quality Control Board</i>
            <i style="font-size: 12px; font-weight: bold"> (Khyber Pakhtunkhwa)</i>
        </p>

        <div class="controls">
            <div class="main_input_box">
                <span class="add-on"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
            </div>
        </div>

        <div class="form-actions">
            <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to login</a></span>
            <span class="pull-right"><input type="submit" class="btn btn-info" value="Recover" /></span>
        </div>
    </form>
</div>

<script src="public/login/jquery.min.js"></script>
<script src="public/login/maruti.login.js"></script>

</body>


<!-- Mirrored from wrappixel.com/demos/free-admin-templates/maruti-admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Jul 2017 06:51:17 GMT -->
</html>
