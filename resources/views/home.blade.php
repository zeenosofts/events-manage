@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Create Event') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-{{session('message')['class']}}" role="alert">
                            <span  class="alert-text"><strong>{{strtoupper(session('message')['class'])}}!</strong> {{session('message')['result']}}</span>
                        </div>
                    @endif
                    <form method="post" action="{{route('save_event')}}" enctype="multipart/form-data">
                        @csrf

                    <div class="form-group">
                        <label>Event title</label>
                        <input type="text" name="event_title" class="form-control" placeholder="Event title" required>
                    </div>
                    <div class="form-group">
                        <label>Event Date</label>
                        <input type="date" name="event_date" class="form-control" placeholder="Event Date" required>
                    </div>
                    <div class="form-group">
                        <label>Event City</label>
                        <input type="text" name="event_city" class="form-control" placeholder="Event City" required>
                    </div>
                    <div class="form-group">
                        <label>Event Address</label>
                        <input type="text" name="event_address" class="form-control" placeholder="Event Address" required>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label>Event Poster</label>--}}
                        {{--<input type="file" name="event_poster" class="form-control" required>--}}
                    {{--</div>--}}
                        <div class="form-group">
                            <label>Ticket URL</label>
                            <input type="text" name="ticket_url" class="form-control" placeholder="Ticket Link" required>
                        </div>
                    <div class="form-group">
                        <label>Event Description</label>
                        <textarea name="event_description" id="editor" rows="10"></textarea>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Save Event</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Manage Events') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                                <th>City</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>{{$event->event_date}}</td>
                                <td>{{$event->event_title}}</td>
                                <td>{{$event->event_city}}</td>
                                <td>
                                    <a href="{{route('edit-event',['id' => $event->id])}}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirmation();" href="{{route('delete-event',['id' => $event->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {{$events->links('vendor.pagination.bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
