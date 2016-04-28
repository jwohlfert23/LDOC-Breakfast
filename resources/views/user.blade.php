@extends('master')

@section('content')
    <div class="container">

        <div class="card" style="width: 550px; max-width: 100%; margin: 20px auto;">

            <div class="card-block">

                @if($user->avatar)
                    <img src="{{$user->avatar}}" class="img-circle" style="height: 100px; margin-bottom: 20px"/>
                @endif
                <h4 style="margin-bottom: 20px">Logged in as {{$user->name}}</h4>

                <p>The cost for the breakfast is $10.00. We're collecting money in advance to make it easier on
                    everybody. You can:</p>

                @if(Session::has('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('danger')}}
                    </div>
                @endif
                <div class="card-text">
                    <form action="/charge" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="{{config('services.stripe.key')}}"
                                data-image="/img/old-well.jpg"
                                data-name="LDOC Breakfast"
                                data-amount="4150"
                                data-locale="auto"
                                data-email="{{$user->email}}">
                        </script>
                    </form>
                </div>
            </div>
            <div class="card-footer text-muted" style="font-size: 14px">
                You can also venmo @Jack-Wohlfert $10.00 if that's easier for you
            </div>
        </div>


    </div>

@stop