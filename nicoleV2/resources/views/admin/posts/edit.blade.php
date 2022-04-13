<x-admin-master>
    @section('content')
        <h1>Update Announcement</h1>
        <form action="{{route('post.update', $posts->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Announcement Title</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter Announcement title" value="{{$posts->title}}">
            </div>
            <div class="form-group">
                <label for="file">Announcement Image</label>
                <div><img src="{{$posts->post_image}}" height="100px" alt=""></div>
                    <input type="file"
                           name="post_image"
                           class="form-control-file"
                           id="post_image">
            </div>
            <div class="form-group">
                <textarea
                           name="body"
                           class="form-control"
                           id="body"
                           cols="30"
                           rows="10">{{$posts->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    @endsection
</x-admin-master>
