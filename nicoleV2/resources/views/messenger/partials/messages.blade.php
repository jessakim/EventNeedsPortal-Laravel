<div class="media">
    <a class="pull-left" href="#">
        <img width="50px" height="50px" src="{{ $message->user->avatar }}"
             alt="{{ $message->user->name }}" class="rounded">
    </a>&nbsp;&nbsp;&nbsp;
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->name }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Sent {{ $message->created_at->diffForHumans() }}</small>
        </div>
        <hr>
    </div>
</div>
