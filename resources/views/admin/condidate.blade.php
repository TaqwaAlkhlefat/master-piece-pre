<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" defer></script>

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
    <!-- partial -->



    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center" style="padding-top: 100px;">
            @if (session()->has('message'))
                <div class="alert alert-success d-flex justify-content-between align-items-center">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('upload_condidate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fname" class="form-label">Doctor First Name</label>
                                <input type="text" class="form-control" id="fname" name="fname" style="color: rgb(255, 255, 255);">
                            </div>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Doctor Last Name</label>
                                <input type="text" class="form-control" id="lname" name="lname" style="color: rgb(255, 255, 255);">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Doctor Email</label>
                                <input type="text" class="form-control" id="email" name="email" style="color: rgb(255, 255, 255);">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pos_id" class="form-label">Positions</label>
                                <select class="form-select" id="pos_id" name="pos_id" style="color: black;">
                                    <option value="0">--Select--</option>
                                    <option value="1">Pediatric</option>
                                    <option value="2">Surgery</option>
                                    <option value="3">Orthodontics</option>
                                    <option value="4">Periodontics</option>
                                    <option value="5">Endodontics</option>
                                    <option value="6">Prosthodontics</option>
                                    <option value="7">Oral Pathology</option>
                                    <option value="8">Oral Medicine</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Doctor Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <input type="hidden" name="points" value="0">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

            <div class="mt-4">
                <button id="startVoteBtn" onclick="return confirm('are you sure to Start a new vote ?')" class="btn btn-primary">Start a new vote</button>
            </div>


        {{-- </div> --}}

        <br>

        {{--  --}}


            <div  align="center">
              <form>
                @csrf
                <div  align="center" style="padding-top: 60px; display: flex; flex-wrap: wrap; justify-content: center; padding-bottom:50px">
                  @foreach ($candidate as $candidates)
                  <div class="card-container" style="max-height: 600px; max-width: 600px;">
                    <div class="card" style="width: 18rem; border: 2px solid #ccc; border-radius: 5px; margin: 50px;">
                      <img class="img-fluid rounded" src="doctorimage/{{ $candidates->image }}" alt="" style="max-height: 250px;">
                      <div class="card-body" style="max-height: 180px;">
                        <h5 class="card-title"><div>{{ $candidates->fname }} {{ $candidates->lname }}</div></h5>
                        <p class="card-text">
                          <p> {{ $candidates->email }}</p>
                          <p>
                            @if ($candidates->pos_id == 1)
                            Pediatric
                            @elseif ($candidates->pos_id == 2)
                            Surgery
                              @else
                              Orthodontics
                            @endif
                          </p>
                        </p>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"> point : {{ $candidates->points }}</li>
                      </ul>
                      <div class="card-body">
                          <a href="{{url('deletcandidate',$candidates->id)}}" onclick="return confirm('are you sure to delete this')" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </form>
            </div>

    </div>
    </div>

    {{--  --}}

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("button.btn-primary").click(function () {
                // Trigger a click event on the "Start a new vote" button
                $("#startVoteBtn").click();
            });

            // Handle the "Start a new vote" button click separately
            $("#startVoteBtn").click(function () {
                $.ajax({
                    url: "{{ route('start.new.vote') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        alert(response.message);
                        // You can optionally reload the page or perform other actions here
                    },
                    error: function (error) {
                        console.error(error);
                        alert("Failed to start a new vote.");
                    },
                });
            });
        });
    </script>



  </body>
</html>
