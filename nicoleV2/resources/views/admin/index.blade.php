<x-admin-master>
    @section('content')


        <img src="{{asset('storage/images/Untitled.png')}}" width="700px" alt="">
        <hr>
        @if (($user->valid == "http://127.0.0.1:8000/storage" && $user->avatar == "http://127.0.0.1:8000/storage") || $user->approved == 0)
             <h1>Congratulations! You're done with the initial registration, go to your Profile and upload your Avatar and Valid ID so the Admin can validate and approve your account before you can fully use the application. Thanks!</h1>
        @endif
    @endsection
</x-admin-master>

