
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    <style type="text/css">
    label
    {
        display: inline-block;
        width:200px;
    }
    </style>

    @include('admin.css')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->


        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top: 60px; display: flex; flex-wrap: wrap; justify-content: center;">
                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container" align="center" style="padding-top: 60px; display: flex; flex-wrap: wrap; justify-content: center;">
                        @foreach ($doctor as $doctors)
                          <div class="card-container" style="max-height: 1600px; max-width: 1600px;">
                            <div class="card" style="width: 18rem;  border: 2px solid #ccc; border-radius: 5px; margin: 50px;">
                                <img class="img-fluid rounded" src="doctorimage/{{ $doctors->image }}" alt="">
                              <div class="card-body" style="max-height: 150px;">
                                <h5 class="card-title"><div>{{ $doctors->name }}</div></h5>
                                <p class="card-text">
                                  <p>Specialization: {{ $doctors->specialization }}</p>
                                  <p>{{ $doctors->experience }} Years Experience</p>
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
                                <a href="#" class="btn btn-success">Edit Doctor</a>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>



                    {{--  --}}
                        {{-- <div class="data-item">
                            <label>Accept</label>
                            <div>{{ $doctors->admin_approval }}</div>
                        </div>

                        <div class="data-item">
                            <label>Image</label>
                            <img style="max-height: 150px; max-width: 150px;" class="img-fluid rounded-top" src="doctorimage/{{ $doctors->image }}" alt="">
                        </div>

                        <div class="data-item">
                            <label>Doctor Name</label>
                            <div>{{ $doctors->name }}</div>
                        </div>

                        <div class="data-item">
                            <label>Specialization</label>
                            <?php if (!empty($doctors->specialization)): ?>
                            {{ $doctors->specialization }}
                            <?php else: ?>
                            No Specialization Added
                            <?php endif; ?>
                        </div>

                        <div class="data-item">
                            <label>Experience</label>
                            <?php if (!empty($doctors->experience)): ?>
                            {{ $doctors->experience }}
                            <?php else: ?>
                            No Experience Added
                            <?php endif; ?>
                        </div>

                        <div class="data-item">
                            <label>Medical License</label>
                            <?php if (!empty($doctors->medical_license)): ?>
                            <img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->medical_license }}" alt="">
                            <?php else: ?>
                            No Medical License Added
                            <?php endif; ?>
                        </div>

                        <div class="data-item">
                            <label>Certification Documents</label>
                            <?php if (!empty($doctors->certification_documents)): ?>
                            <img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->certification_documents }}" alt="">
                            <?php else: ?>
                            No Certification Documents Added
                            <?php endif; ?>
                        </div>

                        <div class="data-item">
                            <label>Educational Certificates</label>
                            <?php if (!empty($doctors->educational_certificates)): ?>
                            <img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->educational_certificates }}" alt="">
                            <?php else: ?>
                            No Educational Certificates Added
                            <?php endif; ?>
                        </div>

                        <div class="data-item">
                            <label>Professional Affiliation Proof</label>
                            <?php if (!empty($doctors->professional_affiliation_proof)): ?>
                            <img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->professional_affiliation_proof }}" alt="">
                            <?php else: ?>
                            No Professional Affiliation Proof Added
                            <?php endif; ?>
                        </div>

                        <div class="data-item">
                            <label>Continuing Education Certificates</label>
                            <?php if (!empty($doctors->continuing_education_certificates)): ?>
                            <img style="max-height: 200px; max-width: 200px;" class="img-fluid rounded-top" src="doctordocument/{{ $doctors->continuing_education_certificates }}" alt="">
                            <?php else: ?>
                            No Continuing Education Certificates Added
                            <?php endif; ?>
                        </div>

                        <div style="padding: 15px">
                            <button id="openEditDoctorModal" class="btn btn-success">Edit Doctor</button>
                        </div> --}}


                </form>
            </div>
        </div>



    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>


{{--



    --}}
