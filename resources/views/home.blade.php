@extends('master')

@section('content')
    <div class="background" style="height: 700px; text-align: center;">
        <h1 style="font-size: 100px; margin-bottom: 60px; text-transform: uppercase">LDOC Breakfast</h1>

        <p class="lead" style="margin-bottom: 60px; font-size: 24px">Start off your LDOC right with all you can
            eat/drink breakfast at
            Jack &amp; Andy's</p>

        <div style="text-align: center">
            <a class="btn btn-primary btn-lg" href="#menu">See the Menu</a>
            <a class="btn btn-secondary btn-lg" href="/oauth">RSVP</a>
        </div>
    </div>
    <div class="padded">
        <div class="container" style="text-align: center; width: 800px">
            <h2>What the hell is this?</h2>

            <p>We love to cook. We love our friends. We love to give back. We thought, why not combine them and have an
                LDOC breakfast where all the proceeds go to charity.</p>
        </div>
    </div>
    <div class="background" style="height: 400px; text-align: center; background-image: url('/img/franklin-st.jpg')" id="menu">
        <div class="title">
            <h1 style="border-color: white">Menu</h1>
        </div>
    </div>
    <div class="padded">
        <div class="container" style="width: 900px">

            <?php $c = App\Item::where('category_id', 1)->get(); ?>
            @foreach(App\Category::all() as $cat)
                <div class="title">
                    <h2>{{$cat->name}}</h2>
                </div>

                @foreach($cat->items as $item)
                    <div class="media" style="margin: 20px 0">
                        <a class="media-left" href="#">
                            <img class="media-object img-circle" style="width: 150px; height: 150px"
                                 src="{{$item->image}}">
                        </a>

                        <div class="media-body" style="padding-left: 20px">
                            <h4 class="media-heading">{{$item->name}}</h4>

                            <p>{{$item->description}}</p>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@stop