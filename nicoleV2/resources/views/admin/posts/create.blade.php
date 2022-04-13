<x-admin-master>
    @section('content')
        <h1>Create Announcement</h1>
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Announcement Title</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="Enter Announcement title">
            </div>
            <div class="form-group">
                <label for="file">Announcement Image</label>
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
                           rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    @endsection
</x-admin-master>