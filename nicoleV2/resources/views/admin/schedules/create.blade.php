<x-admin-master>
    @section('content')
        <h1>Book ( <b>{{$user->name}} - {{$user->stafftype}}</b>) for your Event</h1>
        <h5>Talent Fee: <b>{{$user->fee}}</b></h5>
        <hr>
        <form action="{{route('schedule.bookevent')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="event_staff_id" id="event_staff_id" value="{{$user->id}}" hidden>
            <div class="form-group">
                <label for="booking_title">Subject for your event booking <b><i>(ex: Event Place for my daughter's 18th  debut)</i></b></label>
                    <input type="text" name="booking_title" class="form-control" id="booking_title" aria-describedby="" placeholder="Enter Booking Subject">
            </div>

            <div class="form-group">
                <label for="conntent">Description</label>
                <textarea
                           name="conntent"
                           class="form-control"
                           id="conntent"
                           cols="30"
                           rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="event_date">Event Date</i></b></label>
                    <input type="date" name="event_date" class="form-control" id="event_date" aria-describedby="" placeholder="Enter Booking Subject">
            </div>

            <div class="form-group">
                <label for="event_time">Event Time</i></b></label>
                    <input type="time" name="event_time" class="form-control" id="event_time" aria-describedby="" placeholder="Enter Booking Subject">
            </div>


            <button type="submit" class="btn btn-primary">Book</button>
        </form>
    @endsection
</x-admin-master>
