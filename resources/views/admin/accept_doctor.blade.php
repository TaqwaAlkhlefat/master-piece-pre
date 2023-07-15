<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style type="text/css">
    label {
      display: inline-block;
      width: 200px;
    }
  </style>

  @include('admin.css')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar')

    {{-- <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" method="GET" action="{{ route('acceptview') }}">
        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ $search }}">
    </form> --}}
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <div class="container" align="center" style="padding-top: 60px; display: flex; flex-wrap: wrap; justify-content: center;">
        <form>
          @csrf
          <div class="container" align="center" style="padding-top: 60px; display: flex; flex-wrap: wrap; justify-content: center;">
            @foreach ($doctor as $doctors)
            <div class="card-container" style="max-height: 1600px; max-width: 1600px;">
              <div class="card" style="width: 18rem; border: 2px solid #ccc; border-radius: 5px; margin: 50px;">
                <img class="img-fluid rounded" src="doctorimage/{{ $doctors->image }}" alt="" style="max-height: 250px;">
                <div class="card-body" style="max-height: 180px;">
                  <h5 class="card-title"><div>{{ $doctors->name }}</div></h5>
                  <p class="card-text">
                    <p>Specialization: {{ $doctors->specialization }}</p>
                    <p>{{ $doctors->experience }} Years Experience</p>
                    <p>
                        @if ($doctors->admin_approval == 0)
                          In process
                        @elseif ($doctors->admin_approval == 1)
                          Approved
                        @endif
                      </p>
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->medical_license }}" alt=""></li>
                  <li class="list-group-item"><img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->certification_documents }}" alt=""></li>
                  <li class="list-group-item"><img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->educational_certificates }}" alt=""></li>
                  <li class="list-group-item"><img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->professional_affiliation_proof }}" alt=""></li>
                  <li class="list-group-item"><img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->continuing_education_certificates }}" alt=""></li>
                </ul>
                <div class="card-body">
                    <a href="{{url('acceptDoctor',$doctors->id)}}" class="btn btn-success btn-sm">Accept</a>
                    <a href="{{url('deletDoctor',$doctors->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </form>
      </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->

    <script>
        function acceptDoctor(doctorId) {
            fetch('/accept_doctor', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    doctor_id: doctorId
                })
            })
            .then(response => {
                if (response.ok) {
                    // Doctor accepted successfully, you can perform any additional actions or update the UI
                    console.log('Doctor accepted successfully');
                } else {
                    // Handle error case
                    console.error('Error accepting the doctor');
                }
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
        }
    </script>

  </body>
</html>
