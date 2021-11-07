<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ত্রিশাল পৌরসভা লগইন প্যানেল</title>


    <link rel="shortcut icon" href="{{ asset('img') }}/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Front') }}/css/loginPanel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('Front') }}/css/all.min.css">
    <script type="text/javascript" src="{{ asset('Front') }}/js/jquery-3.5.1.slim.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.show-password').on('click', function() {
                if ($(this).hasClass('fa-eye')) {
                    $(this).removeClass('fa-eye');
                    $(this).addClass('fa-eye-slash');
                    $(this).parent('.relative').find('input').attr('type', 'text');
                } else {
                    $(this).addClass('fa-eye');
                    $(this).removeClass('fa-eye-slash');
                    $(this).parent('.relative').find('input').attr('type', 'password');
                }
            });
        });
    </script>
</head>

<body>
    <div id="trishal-login">
        <div class="wrapper" style="margin-top: 20px;">
            <div class="login-page">
                <div class="form">
                    <div class="" style="margin-bottom: 10px;">
                        <img width="80" src="{{ asset('img') }}/logo.svg" alt="">
                    </div>
                    <form class="login-form" method="post" action="">
                        <input class="bn-font" type="text" name="" placeholder="কার্ড নং" autocomplete="off"
                            required="required" />
                        <div class="relative">
                            <input class="bn-font" type="password" name="password" placeholder="পিন নং"
                                autocomplete="off" required="required" />
                            <i class="fa fa-eye show-password"></i>
                        </div>
                        <button class="bn-font font-16" type="submit">লগইন </button>
                    </form>


                </div>
                <div class="thanksto">
                    <img src="{{ asset('img') }}/login.svg" alt="thanks to" />
                </div>
            </div>
            <div class="credit-info">
                <img class="logo" src="{{ asset('Front') }}/images/svg/Tech Path Limited Logo.svg">
                <div class="developed bn-font">কারিগরি সহযোগিতায়: <a href="#" target="_blank"><span
                            class="orange-color">Techpath Limited</a></div>
            </div>
            <ul class="colorlib-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
</body>

</html>
