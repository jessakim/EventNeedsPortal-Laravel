<x-admin-master>
    @section('content')

        <h1>User Profile: {{$user->name}}</h1>
        @if (Session::has('userUpdated'))
            <div class="alert alert-success">{{Session::get('userUpdated')}}</div>
        @endif

        <div class="row">
            <div class="col-sm-6">
                <form action="{{route('user.profile.update', $user)}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <img class="img-profile rounded" height="250px" width="250px" src="{{$user->avatar}}" alt="">
                    </div>

                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>

                    <input type="text" name="usertype" id="usertype" value="{{$user->roles()->first()->name}}" hidden>

                    <div class="form-group">
                        <label for="username">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{$user->username}}">

                            @error('username')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('username') is-invalid @enderror" id="name" value="{{$user->name}}">

                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    @if (auth()->user()->userHasRole('Event Staff'))
                    <div class="form-group">
                        <label for="stafftype">Staff Type</label>
                            <input type="text" name="stafftype" class="form-control @error('stafftype') is-invalid @enderror" id="stafftype" value="{{$user->stafftype}}">

                            @error('stafftype')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="fee">Talent Fee</label>
                            <input type="number" name="fee" class="form-control @error('fee') is-invalid @enderror" id="fee" value="{{$user->fee}}">
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="address">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{$user->address}}">

                            @error('address')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">Email Address</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">

                            @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('username') is-invalid @enderror" id="password">

                            @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('username') is-invalid @enderror" id="password_confirmation">

                            @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="valid">Your valid ID</label>
                        <img class="img-profile rounded" height="250px" width="250px" src="{{$user->valid}}" alt="">
                    </div>

                    <div class="form-group">
                        <label for="valid">Upload your valid ID</label>
                        <input type="file" name="valid">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Options</th>
                            <th>Role</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)

                            <tr>
                                <td><input type="checkbox"
                                    @foreach ($user->roles as $user_role)
                                        @if ($user_role->slug == $role->slug)
                                            checked
                                        @endif
                                    @endforeach
                                    disabled
                                    ></td>
                                <td>{{$role->name}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
