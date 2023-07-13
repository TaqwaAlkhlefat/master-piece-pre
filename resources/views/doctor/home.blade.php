<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="{{ asset('doctor/doctor.css') }}" rel="stylesheet" />
    <style>
        a {
            text-decoration: none;
            /* color: black */
        }
    </style>
</head>
<body align="center" style="width: 80%; margin:auto">
    <div class="page-content page-container" id="page-content" >
        <div class="padding">
            <div class="row container d-flex justify-content-center">
    <div class="col-xl-6 col-md-12">
                                                    <div class="card user-card-full" >
                                                        <div class="row m-l-0 m-r-0">
                                                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                                                <div class="card-block text-center text-white" >
                                                                    @foreach ($doctor as $doctors)
                                                                    <div  class="m-b-25" style="display: flex; gap:50px;">
                                                                        <div>
                                                                        {{-- <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> --}}
                                                                        <img src="doctorimage/{{ $doctors->image }}" class="img-radius" alt="User-Profile-Image" height="250px">
                                                                        </div>
                                                                        <div>
                                                                        <h6 class="f-w-600" style="font-size: 20px; word-spacing: 20px; letter-spacing: 2px; line-height: 2; "
                                                                        ><x-app-layout></x-app-layout></h6>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-8">

                                                                @if($doctors ->admin_approval =='0')


                                                                <div class="card-block">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <p class="m-b-10 f-w-600" style="color:black; font-size: 30px; line-height: 2;">Hello Doctor <span> {{ $doctors->name }} </span>, please wait for the admin approval to join the doctors department</p>
                                                                            <h6 class="text-muted f-w-400"></h6>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                @else

                                                                <div class="card-block">
                                                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600" style="font-size: 30px"></h6>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <a class="" href="{{ url('showappointment') }}" style="text-decoration: none;">
                                                                            <p class="m-b-10 f-w-600" style="color:black; font-size: 30px">Show My Appointment</p>
                                                                            </a>
                                                                            <h6 class="text-muted f-w-400"></h6>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <a class="" href="{{ url('changeinformation') }}" style="text-decoration: none;">
                                                                                <p class="m-b-10 f-w-600" style="color:black; font-size: 30px">change my information</p>
                                                                            </a>
                                                                            <h6 class="text-muted f-w-400"></h6>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <p class="m-b-10 f-w-600"></p>
                                                                            <h6 class="text-muted f-w-400"></h6>
                                                                        </div>
                                                                    </div>
                                                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                                    </ul>
                                                                </div>

                                                            @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 </div>
                                                    </div>
                                                </div>
</body>
</html>
