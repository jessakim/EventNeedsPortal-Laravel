<x-home-master>
@section('content')
    <br><br>
    <h1 class="mt-4">{{$post->title}}</h1>

<p class="lead">
  by
  <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<p>Posted on {{$post->created_at->diffForHumans()}}</p>

<hr>

<img class="img-fluid rounded" src="{{$post->post_image}}" alt="">

<hr>

<p class="lead">{{$post->body}}</p>

<hr>


@endsection
</x-home-master>
