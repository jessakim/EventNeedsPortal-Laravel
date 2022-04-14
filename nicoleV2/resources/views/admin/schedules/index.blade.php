<x-admin-master>
    @section('content')
        <h1>Schedules</h1><div class="card shadow mb-4">

        @if (Session::has('scheduleApproved'))
            <div class="alert alert-success">{{Session::get('scheduleApproved')}}</div>
        @endif

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    @if (auth()->user()->userHasRole('Admin'))
                        <th>Client</th>
                        <th>Event Staff</th>
                        <th>Event Category</th>
                    @endif
                    @if (auth()->user()->userHasRole('Event Staff'))
                        <th>Client</th>
                    @endif
                    @if (auth()->user()->userHasRole('Client'))
                        <th>Event Staff</th>
                        <th>Staff Type</th>
                    @endif
                    <th>Event Title</th>
                    <th>Event Description</th>
                    <th>Event Date</th>
                    <th>Event Time</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)

                    <tr>
                        @php
                            $client_name = auth()->user()->getInstance($schedule->user_id);
                            $staff_name = auth()->user()->getInstance($schedule->event_staff_id);
                        @endphp
                        @if (auth()->user()->userHasRole('Admin'))
                            <td>{{$client_name->name}}</td>
                            <td>{{$staff_name->name}}</td>
                            <td>{{$staff_name->stafftype}}</td>
                        @endif
                        @if (auth()->user()->userHasRole('Event Staff'))
                            <td>{{$client_name->name}}</td>
                        @endif
                        @if (auth()->user()->userHasRole('Client'))
                            <td>{{$staff_name->name}}</td>
                            <td>{{$staff_name->stafftype}}</td>
                        @endif
                        <td>{{$schedule->booking_title}}</td>
                        <td>{{$schedule->conntent}}</td>
                        <td>{{$schedule->event_date}}</td>
                        <td>{{date('h:i a', strtotime($schedule->event_time))}}<td>
                        <form action="{{route('schedule.approve', $schedule->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            @if (auth()->user()->userHasRole('Event Staff') && $schedule->approved == 0)
                            <button type="submit" class="btn btn-primary">Approve</button>
                            @endif
                        </form>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>

        <div class="d-flex">
            <div class="mx-auto">
            <!--$users->links()}}-->
            </div>
        </div>

    @endsection

    @section('script')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
