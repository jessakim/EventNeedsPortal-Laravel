<x-home-master>
@section('content')
        <br><br>
        <h1 class="my-4">Event Needs Portal
          <small>Announcements</small>
        </h1>

        @foreach($posts as $post)
          <div class="card mb-4">
            <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              <p class="card-text">{{Str::limit($post->body, '150', '...')}}</p>
              <a href="{{route('post', $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on {{$post->created_at->diffForHumans()}}
              <a>| by {{$post->user->name}}</a>
            </div>
          </div>
        @endforeach
        <!-- Blog Post -->


        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>
@endsection
</x-home-master>

