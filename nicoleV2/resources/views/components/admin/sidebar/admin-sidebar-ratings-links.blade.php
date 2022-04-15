@if (auth()->user()->approved == 1)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-comments" aria-hidden="true"></i>
        <span>
            @if (auth()->user()->userHasRole('Admin'))
                Ratings and Feedbacks
            @elseif (auth()->user()->userHasRole('Event Staff'))
                My Ratings and Feedbacks
            @elseif (auth()->user()->userHasRole('Client'))
                Event Staff Ratings
            @endif

        </span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Event Bookings</h6>
            @if (auth()->user()->userHasRole('Admin') || auth()->user()->userHasRole('Client'))
                <a class="collapse-item" href="{{route('user.rating', 'view')}}">Event Staff Ratings</a>
            @elseif (auth()->user()->userHasRole('Event Staff'))
                <a class="collapse-item" href="{{route('user.rating', 'eventstaff')}}">My Ratings</a>
            @endif
        </div>
        </div>
    </li>
@endif
