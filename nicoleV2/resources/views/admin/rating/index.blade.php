<x-admin-master>
    @section('content')
        <h1>Ratings</h1><div class="card shadow mb-4">

        @if (Session::has('scheduleApproved'))
            <div class="alert alert-success">{{Session::get('scheduleApproved')}}</div>
        @endif

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    @if (auth()->user()->userHasRole('Admin'))
                        <th>Rated By</th>
                        <th>Event Staff</th>
                        <th>Event Category</th>
                    @endif
                    @if (auth()->user()->userHasRole('Event Staff'))
                        <th>Rate By</th>
                    @endif
                    @if (auth()->user()->userHasRole('Client'))
                        <th>Event Staff</th>
                        <th>Staff Type</th>
                    @endif
                    <th>Feedback</th>
                    <th>Rating</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($ratings as $rating)

                    <tr>
                        @php
                            $client_name = auth()->user()->getInstance($rating->user_id);
                            $staff_name = auth()->user()->getInstance($rating->event_staff_id);
                        @endphp
                        @if (auth()->user()->userHasRole('Admin'))
                            <td>{{$client_name->name}}</td>
                            <td>{{$staff_name->name}}</td>
                            <td>{{$staff_name->stafftype}}</td>
                        @endif
                        @if (auth()->user()->userHasRole('Event Staff'))
                            <td>{{$client_name->name}}</td>
                        @endif
                        @if (auth()->user()->userHasRole('Client'))
                            <td>{{$staff_name->name}}</td>
                            <td>{{$staff_name->stafftype}}</td>
                        @endif
                        <td>{{$rating->feedback}}</td>
                        <td>
                            <div class="rating">
                                @if ($rating->rate == 5)
                                    <span class="checked"><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                                @elseif ($rating->rate == 4)
                                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                                    <span class="checked"><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                                @elseif ($rating->rate == 3)
                                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                                    <span class="checked"><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                                @elseif ($rating->rate == 2)
                                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                                    <span class="checked"><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                                @elseif ($rating->rate == 1)
                                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                                    <span class="checked"><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                                @endif

                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>

        <div class="d-flex">
            <div class="mx-auto">
            <!--$users->links()}}-->
            </div>
        </div>



        <style>
            .rating {
                float:left;
                width:300px;
            }
            .rating span { float:right; position:relative; }
            .rating span input {
                position:absolute;
                top:0px;
                left:0px;
                opacity:0;
            }
            .rating span label {
                display:inline-block;
                width:30px;
                height:30px;
                text-align:center;
                color:#FFF;
                background:#ccc;
                font-size:30px;
                margin-right:2px;
                line-height:30px;
                border-radius:50%;
                -webkit-border-radius:50%;
            }
            .rating span:hover ~ span label,
            .rating span:hover label,
            .rating span.checked label,
            .rating span.checked ~ span label {
                background:#F90;
                color:#FFF;
            }
        </style>

    @endsection

    @section('script')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>
