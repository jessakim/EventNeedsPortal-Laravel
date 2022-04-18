<x-admin-master>
    @section('content')
        <style>
            #circleAnnouncement {
                background: #dc3545;
                border-radius: 10%;
                width: 300px;
                height: 300px;
            }
            #circleEvents1 {
                background: #198754;
                border-radius: 10%;
                width: 200px;
                height: 200px;
            }
            #circleEvents2 {
                background: #20c997;
                border-radius: 10%;
                width: 200px;
                height: 200px;
            }
            #circle1 {
                background: #0d6efd;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle2 {
                background: #6610f2;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle3 {
                background: #6f42c1;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle4 {
                background: #d63384;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle5 {
                background: #dc3545;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle6 {
                background: #fd7e14;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle7 {
                background: #ffc107;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle8 {
                background: #198754;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle9 {
                background: #20c997;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle10 {
                background: #0dcaf0;
                border-radius: 100%;
                width: 100px;
                height: 100px;
                text-align: center;
            }
            #circle11 {
                background: #adb5bd;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
            #circle12 {
                background: lightblue;
                border-radius: 100%;
                width: 100px;
                height: 100px;
            }
        </style>

        <img src="{{asset('storage/images/Untitled.png')}}" width="600px" alt="">
        <hr>
        @if (($user->valid == "http://127.0.0.1:8000/storage" && $user->avatar == "http://127.0.0.1:8000/storage") || $user->approved == 0)
             <h1>Congratulations! You're done with the initial registration, go to your Profile and upload your Avatar and Valid ID so the Admin can validate and approve your account before you can fully use the application. Thanks!</h1>
        @endif

        @if ($user->approved == 1)
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Welcome to weHunt Dashboard</h1>
            <p class="mb-4">In this section you'll see the summary of <b> <u> Total number of Announcements posted by the Admin, Total number of System  users and Total number of Events Scheduled in the this Application </u> </b>.</p>

            <div class="row">



              <div class="col-xl-4">
                <div class="card shadow">
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Announcements Summary</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <center>
                        <div class="form-col">
                            <div class="form-group">
                                <center>
                                    <div id="circleAnnouncement">
                                        <br><br><br><br>
                                        <h1 style="color:black; font-size:100px;">{{$posts}}</h1>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </center>
                    <hr>
                    Number of Announcements by Admins.
                  </div>
                </div>
              </div>

              <div class="col-xl-4">
                <div class="card shadow">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">System Users Summary</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <center>
                    @if (auth()->user()->userHasRole('Admin'))
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="admin">Admins</label>
                                <div id="circle1">
                                    <br>
                                    <h1 style="color:black">{{$admins}}</h1>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="admin">Event Suppliers</label>
                                <div id="circle2">
                                    <br>
                                    <h1 style="color:black">{{$staffs}}</h1>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="admin">Clients</label>
                                <div id="circle3">
                                    <br>
                                    <h1 style="color:black">{{$clients}}</h1>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="admin">Organizers</label>
                            <div id="circle4">
                                <br>
                                <h1 style="color:black">{{$eorgs}}</h1>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Hosts</label>
                            <div id="circle5">
                                <br>
                                <h1 style="color:black">{{$hosts}}</h1>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Venues</label>
                            <div id="circle6">
                                <br>
                                <h1 style="color:black">{{$eplaces}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="admin">Foods and Beverages</label>
                            <div id="circle7">
                                <br>
                                <h1 style="color:black">{{$foods}}</h1>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Entertainers for Events</label>
                            <div id="circle8">
                                <br>
                                <h1 style="color:black">{{$etainers}}</h1>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Lights and Sounds Users</label>
                            <div id="circle9">
                                <br>
                                <h1 style="color:black">{{$lands}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="admin">Invitations and Stationary</label>
                            <div id="circle10">
                                <br>
                                <h1 style="color:black">{{$iands}}</h1>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Photographers and Artists</label>
                            <div id="circle11">
                                <br>
                                <h1 style="color:black">{{$vandp}}</h1>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Equipments and Decorations</label>
                            <div id="circle12">
                                <br>
                                <h1 style="color:black">{{$decors}}</h1>
                            </div>
                        </div>
                    </div>
                    </center>
                    <hr>
                    Numbers of System users per each category.
                  </div>
                </div>
              </div>

              <div class="col-xl-4">
                <div class="card shadow">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Events Summarry</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <center>
                        <div class="form-row">

                                <div class="form-group col-md-4">
                                <label for="admin">Approved Events</label>
                                <div id="circleEvents1">
                                    <br><br>
                                    <h1 style="color:black; font-size:100px;">{{$approvedschedules}}</h1>
                                </div>
                                </div>
                                <div class="form-group col-md-8">
                                <label for="admin">Events needs Approval</label>
                                <div id="circleEvents2">
                                    <br><br>
                                    <h1 style="color:black; font-size:100px;">{{$unapprovedschedules}}</h1>
                                </div>
                                </div>
                        </div>
                    </center>
                    <hr>
                    Number of Scheduled Events, Approved and Unapproved Events.
                  </div>
                </div>
              </div>

            </div>

          </div>
        @endif

    @endsection
</x-admin-master>

