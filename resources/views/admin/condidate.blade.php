<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" defer></script>


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
        <div class="container" align="center" style="padding-top: 100px">
            @if (session()->has('message'))
                <div class="alert alert-success d-flex justify-content-between align-items-center">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('upload_condidate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px;">
                    <label>Doctor First Name</label>
                    <input type="text" style="color: black" name="fname">
                </div>

                <div style="padding: 15px;">
                    <label>Doctor Last Name</label>
                    <input type="text" style="color: black" name="lname">
                </div>

                <div style="padding: 15px;">
                    <label>Doctor Email</label>
                    <input type="text" style="color: black" name="email">
                </div>

                <div style="padding: 15px;">
                    <label>positions </label>
                    <select name="pos_id" style="color: black; width:200px;">
                        <option value="0">--Select--</option>
                        <option value="1">Pediatric</option>
                        <option value="2">Surgery</option>
                        <option value="3">Orthodontics</option>
                    </select>
                </div>

                <div style="padding: 15px;">
                    <label>Doctor Image</label>
                    <input type="file"  name="image">
                </div>

                <div style="padding: 15px;">
                    <input type="hidden"  name="points" value="0">
                </div>

                <div style="padding: 15px;">
                    <input type="submit" class="btn btn-primary">
                </div>

            </form>
        </div>

        <br>

        {{--  --}}


            <div  align="center">
              <form>
                @csrf
                <div  align="center" style="padding-top: 60px; display: flex; flex-wrap: wrap; justify-content: center;">
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
                          <a href="{{url('deletcandidate',$candidates->id)}}" class="btn btn-danger btn-sm">Delete</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </form>
            </div>


        {{--  --}}


    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->



  </body>
</html>
