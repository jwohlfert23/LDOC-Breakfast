@extends('master')

@section('head')
    <style>
        html, body {
            height: 100%;
            font-family: "Roboto", sans-serif;
        }

        .background {
            background: url('/img/old-well.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.7) 0px 0px 0px 1000px inset;
            -moz-box-shadow: rgba(0, 0, 0, 0.7) 0px 0px 0px 1000px inset;
            color: white;
            padding-top: 10%;
        }
    </style>
@stop
@section('content')

    <div class="background" style="height: 100%; text-align: center;">
        <h1 style="font-size: 100px; margin-bottom: 30px">LDOC Breakfast</h1>

        <p class="lead" style="margin-bottom: 30px">Start off your LDOC right with all you can eat/drink breakfast at Jack &amp; Andy's</p>

        <div style="text-align: center">
            <a class="btn btn-primary btn-lg">See the Menu</a>
            <a class="btn btn-secondary btn-lg">RSVP</a>
        </div>
    </div>
@stop