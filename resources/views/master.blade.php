<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css"
          integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,700,900,300italic,400italic,700italic|Montserrat:400,700'
          rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <style>
        body {
            font-family: "Merriweather", sans-serif;
            font-size: 18px;
            line-height: 1.9;
        }

        .btn, h1, h2, h3, h4, h5, h6, .lead {
            font-family: "Montserrat", sans-serif;

        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            margin-bottom: 15px;
        }

        .title {
            display: block;
        }

        .title h1, .title h2, .title h3 {
            display: inline-block;
            text-transform: uppercase;
            border: 7px solid #373a3c;
            padding: 7px;
        }

        h1 {
            font-size: 60px;
        }

        h1.big {
            font-size: 100px;
        }

        @media (max-width: 800px) {
            h1.big {
                font-size: 65px;
            }
        }

        p {
            margin-bottom: 15px;
        }

        .background {
            background: url('/img/old-well.jpg') no-repeat center center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.7) 0px 0px 0px 1000px inset;
            -moz-box-shadow: rgba(0, 0, 0, 0.7) 0px 0px 0px 1000px inset;
            color: white;
            padding-top: 10%;
            width: 100%;
        }

        .padded {
            padding: 60px 0;
        }
    </style>
    @yield('head')
</head>
<body>
@yield('content')

        <!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"
        integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>

<script>
    $(function () {
        $('a[href*="#"]:not([href="#"])').click(function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
<script src="https://checkout.stripe.com/checkout.js"></script>
</body>
</html>