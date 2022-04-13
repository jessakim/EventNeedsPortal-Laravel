<x-admin-master>
    @section('content')

        <h1 class="h3 mb-4 text-gray-800">{{$user->roles()->first()->name}} Dashboard</h1>

    @endsection
</x-admin-master>
