<div class="main-panel">
    <div class="content-wrapper">

      <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                        <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"> {{ $userCount }} </h3>
                            <p class="text-success ml-2 mb-0 font-weight-medium">User</p>
                        </div>
                        </div>
                        <div class="col-3">
                        <div class="icon icon-box-success ">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                        </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Number of users</h6>
                    </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{ $doctorCount }}</h3>
                    <p class="text-success ml-2 mb-0 font-weight-medium">Doctor</p>
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success">
                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Number of Doctors</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{ $appointmentCount }}</h3>
                    <p class="text-success ml-2 mb-0 font-weight-medium">Appointment</p>
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success">
                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Number of Appointment</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{ $voteCount }}</h3>
                    <p class="text-success ml-2 mb-0 font-weight-medium">Vote</p>
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success ">
                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Number of Vote</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Our Clients</h4>
              <div class="table-responsive">
                {{--  --}}
                <div class="row mb-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search-name" placeholder="Search by Name">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search-address" placeholder="Search by Address">
                    </div>
                    <div class="col-md-3" >
                        <select class="form-select" id="search-usertype" style="padding: 5px" style="background-color: black; color:white">
                            <option value="">All User Types</option>
                            <option value="0">User</option>
                            <option value="3">Doctor</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary" id="search-button">Search</button>
                    </div>
                </div>


                {{--  --}}
                <table class="table">
                    <thead>
                        <tr>
                        <th> Client Name </th>
                        <th> Email  </th>
                        <th> Phone </th>
                        <th> Address </th>
                        <th> User Type </th>
                        <th> Created At </th>
                        <th> Action </th>
                        </tr>
                    </thead>

                  <tbody>
                    @foreach ($user as $users)

                    <tr>

                      <td>
                        <img src="doctorimage/{{ $users->image }}" alt="image" />
                        <span class="pl-2">{{ $users->name }}</span>
                      </td>
                      <td> {{ $users->email }} </td>
                      <td> {{ $users->phone }} </td>
                      <td> {{ $users->address }} </td>
                      <td>
                        @if ($users->usertype == 0)
                            User
                        @elseif ($users->usertype == 1)
                            Admin
                        @elseif ($users->usertype == 3)
                            Doctor
                        @else
                            Unknown
                        @endif
                    </td>
                    <td> {{ $users->created_at }} </td>
                      <td>
                        <div class="badge badge-outline-danger"> <a href="{{url('deletClient',$users->id)}}" style="text-decoration: none; color:red">Delete</a></div>
                      </td>
                    </tr>

                  </tbody>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        {{-- <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">DentSan.JO</span> --}}
        {{-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> --}}
      </div>
    </footer>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<script>
document.getElementById('search-button').addEventListener('click', function () {
    var searchName = document.getElementById('search-name').value.toLowerCase();
    var searchAddress = document.getElementById('search-address').value.toLowerCase();
    var searchUserType = document.getElementById('search-usertype').value;

    // Loop through the table rows and hide/show based on search criteria
    var tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(function (row) {
        var name = row.querySelector('td:nth-child(1)').innerText.toLowerCase();
        var address = row.querySelector('td:nth-child(4)').innerText.toLowerCase();
        var userType = row.querySelector('td:nth-child(5)').innerText;

        var nameMatch = name.includes(searchName);
        var addressMatch = address.includes(searchAddress);
        var userTypeMatch = searchUserType === '' || (searchUserType === '3' && userType === 'Doctor') || (searchUserType === '0' && userType === 'User');

        if (nameMatch && addressMatch && userTypeMatch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

//     document.getElementById('search-button').addEventListener('click', function () {
//     console.log("Search button clicked"); // for debugging
// });

</script>
