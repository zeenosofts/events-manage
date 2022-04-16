<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Events</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,900;1,100&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #222222;
            }
            .bold{
                font-weight: bold;
            }
            .light-black{
                color: rgba(255,255,255,0.65);
            }
            .white-text{
                color: white;
            }
            h3 {
                font-size: 35px;
                font-size: 1.9444444444444rem;
            }
            .padding-right{
                padding-right: 100px;
            }
            .margin-top{
                margin-top: 10px;
            }
            .border-top{
                border-top: 3px solid white !important;
            }
            .padding-top{
                padding-top: 10px;
            }
            .padding-bottom{
                padding-bottom: 50px;
            }
            .event-box{
                border-top: 3px solid #ffffff !important;
            }
            .event-box::after{
                border-top: 3px solid #d70e1d !important;
            }
            .event-box:hover::after{
                border-top: 3px solid #d70e1d !important;
            }
            .btn{
                background-color: #d70e1d;
                border-radius: 0;
                padding-left: 25px !important;
                padding-right: 25px !important;
            }
        </style>
    </head>
<body>
<div class="container margin-top">
    <div class="row">
        @foreach($events as $event)
        <div class="col-lg-6 col-12 ">
            <div class="event-box">
                <div class="padding-right padding-top padding-bottom">
                    <h6 class=" light-black">{{\Carbon\Carbon::parse($event->event_date)->format('F jS')}} {{$event->event_city}}</h6>
                    <h3 class="white-text">
                        {{$event->event_title}}
                    </h3>
                    <h6 class=" light-black">{{$event->event_address}}</h6>
                    <div class="margin-top">
                        <a class="btn btn-danger">Buy Ticket</a>
                    </div>
                </div>
            </div>

        </div>
            @endforeach
    </div>
</div>
</body>

</html>
