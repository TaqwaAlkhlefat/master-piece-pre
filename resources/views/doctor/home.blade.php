<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="{{ asset('doctor/doctor.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- <style>
        a {
            text-decoration: none;
            /* color: black */
        }
    </style> --}}
</head>

<body>



<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><x-app-layout></x-app-layout></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                    @foreach ($doctor as $doctors)
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="doctorimage/{{ $doctors->image }}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>D. {{ $doctors->name }}</h4>
                      <p class="text-secondary mb-1">{{ $doctors->specialization }}</p>
                      <p class="text-muted font-size-sm">{{ $doctors->experience }} Year's Experience</p>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    @if($doctors ->admin_approval =='0')
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><p class="m-b-10 f-w-600" style="color:black; font-size: 30px; line-height: 2;">Hello Doctor <span> {{ $doctors->name }} </span>, please wait for the admin approval to join the doctors department</p></h6>
                  </li>

                  @else

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><a class="" href="{{ url('showappointment') }}" style="text-decoration: none;">
                        <p class="m-b-10 f-w-600" style="color:black; font-size: 30px">Show My Appointment</p>
                        </a>
                    </h6>
                  </li>

                  @endif

                </ul>
              </div> 
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <hr>
                  @foreach ($doctor as $doctors)
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $doctors->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $doctors->phone }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Session Price</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $doctors->session_price }} JD
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $doctors->address }}
                    </div>
                  </div>
                  @endforeach
                  <hr>
                  
                </div>
              </div>

               <div class="row gutters-sm">

                @foreach ($doctor as $doctors)

                <div class="col-sm-4 mb-4">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Medical License </i></h6>
                      <img src="doctordocument/{{ $doctors->medical_license }}" alt="Admin" class="img-fluid" width="150">
                    </div>
                  </div>
                </div>

                <div class="col-sm-4 mb-4">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Certification Documents </i></h6>
                      <img src="doctordocument/{{ $doctors->certification_documents }}" alt="Admin" class="img-fluid" width="150">
                    </div>
                  </div>
                </div>

                <div class="col-sm-4 mb-4">
                    <div class="card h-100">
                      <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Educational Certificates </i></h6>
                        <img src="doctordocument/{{ $doctors->educational_certificates }}" alt="Admin" class="img-fluid" width="150">
                      </div>
                    </div>
                  </div>

                  {{-- <div class="col-sm-6 mb-5">
                    <div class="card h-100">
                      <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Professional Affiliation Proof </i></h6>
                        <img src="doctordocument/{{ $doctors->professional_affiliation_proof }}" alt="Admin" class="img-fluid" width="150">
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6 mb-5">
                    <div class="card h-100">
                      <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Continuing Education Certificates </i></h6>
                        <img src="doctordocument/{{ $doctors->continuing_education_certificates }}" alt="Admin" class="img-fluid" width="150">
                      </div>
                    </div>
                  </div> --}}

                  @endforeach

              </div> 



            </div>
          </div>

        </div>
    </div>



</body>

</html>
