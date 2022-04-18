@if (auth()->user()->approved == 1)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        <span>
            @if (auth()->user()->userHasRole('Admin'))
                View All Event Bookings
            @elseif (auth()->user()->userHasRole('Event Supplier'))
                My Appointments
            @elseif (auth()->user()->userHasRole('Client'))
                My Event Bookings
            @endif

        </span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Event Bookings</h6>
            @if (auth()->user()->userHasRole('Admin'))
                <a class="collapse-item" href="{{route('schedule.index', 'approved')}}">Approved Bookings</a>
                <a class="collapse-item" href="{{route('schedule.index', 'unapproved')}}">Unapproved Bookings</a>
            @elseif (auth()->user()->userHasRole('Event Supplier'))
                <a class="collapse-item" href="{{route('schedule.index', 'esapproved')}}">My Approved Bookings</a>
                <a class="collapse-item" href="{{route('schedule.index', 'esunapproved')}}">Bookings needs to review</a>
            @elseif (auth()->user()->userHasRole('Client'))
                <a class="collapse-item" href="{{route('schedule.index', 'capproved')}}">Approved Event Bookings</a>
                <a class="collapse-item" href="{{route('schedule.index', 'cunapproved')}}">Pending Bookings</a>
            @endif
        </div>
        </div>
    </li>
@endif
