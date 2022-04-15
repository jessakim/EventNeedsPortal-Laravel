<x-admin-master>
    @section('content')
    @if (Session::has('rateCreated'))
    <div class="alert alert-success">{{Session::get('rateCreated')}}</div>
    @endif
    <h1>Rate ( <b>{{$user->name}} - {{$user->stafftype}}</b> )</h1>
    <hr>

    <form action="{{route('user.saverate')}}" method="post" enctype="multipart/form-data">
        @csrf


        <div class="form-group">
            <label for="feedback">Let <b>{{$user->name}}</b> know your feedback</label>
            <textarea
                       name="feedback"
                       class="form-control"
                       id="feedback"
                       cols="30"
                       rows="10"></textarea>
        </div>

        <input type="text" name="event_staff_id" id="event_staff_id" value="{{$user->id}}" hidden>
        <label for="rating">How satisfied are you?</i></b></label>
        <div class="form-group">
            <div class="rating">
                <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                <input type="text" name="rate" id="rate" hidden>
            </div>
        </div>
        <br>


        <button type="submit" class="btn btn-primary">Rate</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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

    <script>
        $(document).ready(function(){
    // Check Radio-box
        $(".rating input:radio").attr("checked", false);

        $('.rating input').click(function () {
            $(".rating span").removeClass('checked');
            $(this).parent().addClass('checked');
        });

        $('input:radio').change(
        function(){
            var userRating = this.value;
            const rating = document.getElementById('rate');
            rating.value = userRating;
        });
    });
    </script>
    @endsection
</x-admin-master>
