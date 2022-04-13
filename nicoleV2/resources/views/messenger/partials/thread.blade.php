<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="media alert {{ $class }}">
    <h5 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h5>
    <p>
        &nbsp;&nbsp;&nbsp;&nbsp;<p>| <b>Latest message: </b></p> &nbsp;&nbsp; <p>{{ $thread->latestMessage->body }}</p>
    </p>
    <p>
        &nbsp;&nbsp;<p>| <b>Author:</b></p> &nbsp;&nbsp; <p> {{ $thread->creator()->name }} </p>
    </p>
    <!--<p>
        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>-->
</div>
