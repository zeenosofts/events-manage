@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Edit Event') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-{{session('message')['class']}}" role="alert">
                            <span  class="alert-text"><strong>{{strtoupper(session('message')['class'])}}!</strong> {{session('message')['result']}}</span>
                        </div>
                    @endif
                    <form method="post" action="{{route('update_event')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$event->id}}">
                    <div class="form-group">
                        <label>Event title</label>
                        <input type="text" name="event_title" class="form-control" value="{{$event->event_title}}" placeholder="Event title" required>
                    </div>
                    <div class="form-group">
                        <label>Event Date</label>
                        <input type="date" name="event_date" class="form-control" value="{{$event->event_date}}" placeholder="Event Date" required>
                    </div>
                    <div class="form-group">
                        <label>Event City</label>
                        <input type="text" name="event_city" class="form-control" value="{{$event->event_city}}" placeholder="Event City" required>
                    </div>
                    <div class="form-group">
                        <label>Event Address</label>
                        <input type="text" name="event_address" class="form-control" value="{{$event->event_address}}" placeholder="Event Address" required>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label>Event Poster</label>--}}
                        {{--<input type="file" name="event_poster" class="form-control" required>--}}
                    {{--</div>--}}
                        <div class="form-group">
                            <label>Ticket URL</label>
                            <input type="text" name="ticket_url" class="form-control" value="{{$event->ticket_url}}" placeholder="Ticket Link" required>
                        </div>
                    <div class="form-group">
                        <label>Event Description</label>
                        <textarea name="event_description" id="editor" rows="10">{{$event->event_description}}</textarea>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Update Event</button>
                        <a href="{{route('home')}}" class="btn btn-warning">Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
