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
                background-color: transparent;
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

            /* Extra small devices (phones, 600px and down) */
            @media only screen and (max-width: 600px) {
                h3 {
                    font-size: 16px;
                }
            }

            /* Small devices (portrait tablets and large phones, 600px and up) */
            @media only screen and (min-width: 600px) {
                h3 {
                    font-size: 28px;
                }
            }
            /* Medium devices (landscape tablets, 768px and up) */
            @media only screen and (min-width: 768px) {
                h3 {
                    font-size: 30px;
                }
            }

            /* Large devices (laptops/desktops, 992px and up) */
            @media only screen and (min-width: 992px) {
                h3 {
                    font-size: 32px;
                }
            }

            /* Extra large devices (large laptops and desktops, 1200px and up) */
            @media only screen and (min-width: 1200px) {
                h3 {
                    font-size: 32px;
                }
            }
            .page-link {
                position: relative;
                display: block;
                color: #d70e1d;
                text-decoration: none;
                background-color: #fff;
                border: 1px solid #dee2e6;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
            .page-item.active .page-link {
                z-index: 3;
                color: #fff;
                background-color: #d70e1d;
                border-color: #d70e1d;
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
                    <h6  class=" light-black">
                        <span style="text-decoration: {{strstr($event->event_city,"Completed") ? 'line-through' : 'none'}};">{{\Carbon\Carbon::parse($event->event_date)->format('F jS')}} {{str_replace('(Completed)','',$event->event_city)}}</span>
                        <span><b>{{strstr($event->event_city,"Completed") ? 'Completed' : 'Completed'}}</b></span>
                    </h6>
                    <h3 class="white-text">
                        <span style="text-decoration: {{strstr($event->event_city,"Completed") ? 'line-through' : 'none'}};">{{$event->event_title}}</span>
                    </h3>
                    <h6 class=" light-black">
                        <span style="text-decoration: {{strstr($event->event_city,"Completed") ? 'line-through' : 'none'}};">{{$event->event_address}}
                        </span></h6>
                    <div class="margin-top">
                        <a href="{{strstr($event->event_city,"Completed") ? '#' : $event->ticket_url}}" target="_blank" class="btn btn-danger">{{strstr($event->event_city,"Completed") ? 'Completed' : "Buy Ticket"}}</a>
                    </div>
                </div>
            </div>

        </div>
            @endforeach
    </div>
    @if($type == 'full')
    <div class="row">
        <div class="col-lg-12">
            {{$events->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
        @endif
</div>
</body>

</html>
