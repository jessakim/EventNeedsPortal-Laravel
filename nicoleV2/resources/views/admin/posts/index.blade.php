<x-admin-master>
    @section('content')
        <h1>All Announcements</h1>

        @if (Session::has('messageDeleted'))
            <div class="alert alert-danger">{{Session::get('messageDeleted')}}</div>
        @elseif (Session::has('messageAdded'))
            <div class="alert alert-success">{{Session::get('messageAdded')}}</div>
        @elseif (Session::has('announcementUpdated'))
            <div class="alert alert-success">{{Session::get('announcementUpdated')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Announcements</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Cover Photo</th>
                      <th>Author</th>
                      <th>Title</th>
                      <th>Description</th>
                      <th>Announced Date</th>
                      @if (auth()->user()->userHasRole('Admin'))
                        <th>Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($posts as $post)

                        <tr>
                            <td>
                                <a href="{{route('post.edit', $post->id)}}"><img height="40px" src="{{$post->post_image}}" alt=""></a>
                            </td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                            @if (auth()->user()->userHasRole('Admin'))
                                <td>
                                    @can('view', $post)
                                        <form action="{{route('post.remove', $post->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            @endif
                        </tr>

                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="d-flex">
              <div class="mx-auto">
                <!--$posts->links()}}-->
              </div>
          </div>

    @endsection

    @section('script')
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
