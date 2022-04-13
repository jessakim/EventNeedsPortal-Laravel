@if (auth()->user()->approved == 1)
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-users" aria-hidden="true"></i>
        <span>System Users</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Users</h6>
        @if (auth()->user()->userHasRole('Admin'))
        <a class="collapse-item" href="{{route('users.index', 'all')}}">All Users</a>
        <a class="collapse-item" href="{{route('users.index', 'unapproved')}}">All Unapproved Users</a>
        <a class="collapse-item" href="{{route('users.index', "admins")}}">All Admin Users</a>
        <a class="collapse-item" href="{{route('users.index', "clients")}}">All Client Users</a>
        @endif
        <a class="collapse-item" href="{{route('users.index', "staffs")}}">All Event Staff Users</a>
        <a class="collapse-item" href="{{route('users.index', "eorgs")}}">Event Organizer Users</a>
        <a class="collapse-item" href="{{route('users.index', "hosts")}}">Host Users</a>
        <a class="collapse-item" href="{{route('users.index', "eplace")}}">Event Place Users</a>
        <a class="collapse-item" href="{{route('users.index', "foods")}}">Food Users</a>
        <a class="collapse-item" href="{{route('users.index', "entertainers")}}">Entertainer Users</a>
        <a class="collapse-item" href="{{route('users.index', "lands")}}">Light && Sounds Users</a>
        <a class="collapse-item" href="{{route('users.index', "iands")}}">Inv. && Stationary Users</a>
        <a class="collapse-item" href="{{route('users.index', "vandp")}}">Vids && Photos Users</a>
        <a class="collapse-item" href="{{route('users.index', "decors")}}">Decorations Users</a>
    </div>
    </div>
</li>
@endif

