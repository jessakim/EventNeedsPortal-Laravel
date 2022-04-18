<x-admin-master>
    @section('content')
        <h1>Users</h1><div class="card shadow mb-4">

        @if (Session::has('messageDeleted'))
            <div class="alert alert-danger">{{Session::get('messageDeleted')}}</div>
        @elseif (Session::has('messageAdded'))
            <div class="alert alert-success">{{Session::get('messageAdded')}}</div>
        @elseif (Session::has('userUpdated'))
            <div class="alert alert-success">{{Session::get('userUpdated')}}</div>
        @elseif (Session::has('userApproved'))
            <div class="alert alert-success">{{Session::get('userApproved')}}</div>
        @endif

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Avatar</th>
                    <th>User Type</th>
                    <th>Name</th>
                    <th>Valid ID</th>
                    <th>Talent Fee</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)

                    <tr>
                        <td>
                            <a href="{{route('user.profile.show', $user->id)}}"><img height="40px" src="{{$user->avatar}}" alt=""></a>
                        </td>
                        <td>{{$user->roles()->first()->name}} | {{$user->stafftype}}</td>
                        <td>{{$user->name}}</td>
                        <td><img height="40px" src="{{$user->valid}}" alt=""></td>
                        <td>
                            @if (auth()->user()->userHasRole('Event Supplier'))
                                You're not allowed to see this
                            @else
                                {{$user->fee}}
                            @endif
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->contact}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            <!--can('view', $post)-->
                                <form action="{{route('user.remove', $user->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    @if (auth()->user()->userHasRole('Admin'))
                                        <a><button type="submit" class="btn btn-danger">Delete</button></a>
                                    @endif
                                </form>
                                <form action="{{route('user.approve', $user->id)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    @if ($user->approved == 0 && auth()->user()->userHasRole('Admin'))
                                        <a><button type="submit" class="btn btn-primary">Approve</button></a>
                                    @endif
                                </form>
                                @if (auth()->user()->userHasRole('Client'))
                                        <a href="{{route('schedule.book', $user)}}"><button type="submit" class="btn btn-info">Book Event</button></a>
                                        <a href="{{route('user.location', $user)}}"><button type="submit" class="btn btn-secondary">Map Location</button></a>
                                        <a href="{{route('messages.create', $user)}}"><button type="submit" class="btn btn-primary">Message</button></a>
                                @endif
                            <!--endcan-->
                        </td>
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
