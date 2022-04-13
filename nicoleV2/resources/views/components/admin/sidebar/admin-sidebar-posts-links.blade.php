@if (auth()->user()->approved == 1)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-bullhorn" aria-hidden="true"></i>
        <span>Announcement Section</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Announcements</h6>
            @if (auth()->user()->userHasRole('Admin'))
                <a class="collapse-item" href="{{route('post.create')}}">Create Announcement</a>
            @endif
            <a class="collapse-item" href="{{route('post.index')}}">View Announcements</a>
        </div>
        </div>
    </li>
@endif

