@extends('master')

@section('content')
    <div class="background" style="height: 700px; text-align: center;">
        <h1 style="font-size: 100px; margin-bottom: 60px; text-transform: uppercase">LDOC Breakfast</h1>

        <p class="lead" style="margin-bottom: 60px; font-size: 24px">Start off your LDOC right with breakfast at Jack
            &amp; Andy's</p>

        <div style="text-align: center">
            <a class="btn btn-primary btn-lg" href="#menu">See the Menu</a>
            <a class="btn btn-secondary btn-lg" href="/oauth">RSVP</a>
        </div>
    </div>
    <div class="padded">
        <div class="container" style="text-align: center; width: 800px">
            <h2>What the hell is this?</h2>

            <p>At 301 Henderson, we love to cook; we love our friends; and we love to give back. Last year, we decided
                to have a breakfast on LDOC and invite our friends over to start the day off right. It was great time
                all around. This year, we want to take it up a notch and do something good for the community in the
                process. For $10, you can enjoy our homemade breakfast and
                drink/eat as much as you want (see the menu below). All money that we make from the breakfast,
                will be donated to TABLE NC.
                So please join us on LDOC around 10AM and start your LDOC off right! </p>
        </div>
    </div>
    <div class="background" style="height: 400px; text-align: center; background-image: url('/img/franklin-st.jpg')"
         id="menu">
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