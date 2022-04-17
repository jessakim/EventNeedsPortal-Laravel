<x-admin-master>
    @section('content')
        <style>
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
                    <div class="chart-pie">
                      <div id="circle">

                      </div>
                    </div>
                    <hr>
                    Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.
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
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="admin">Admin Users</label>
                            <div id="circle1"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Event Staff Users</label>
                            <div id="circle2"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Client Users</label>
                            <div id="circle3"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="admin">Event Organizers</label>
                            <div id="circle4"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Hosts</label>
                            <div id="circle5"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Event Places</label>
                            <div id="circle6"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="admin">Foods</label>
                            <div id="circle7"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Entertainers</label>
                            <div id="circle8"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Lights and Sounds</label>
                            <div id="circle9"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="admin">Invitation and Stationary</label>
                            <div id="circle10"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Video and Photography</label>
                            <div id="circle11"></div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="admin">Decorations and other stuffs</label>
                            <div id="circle12"></div>
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
                    <div class="chart-pie">
                      <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                    Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.
                  </div>
                </div>
              </div>

            </div>

          </div>
    @endsection
</x-admin-master>

