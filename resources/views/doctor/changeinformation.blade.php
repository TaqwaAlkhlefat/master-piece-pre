{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        label{
            display: inline-block;
            width: 200px;
        }
    </style>

</head>
<body>

@if (session()->has('message'))
    <div class="alert alert-success d-flex justify-content-between align-items-center">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}

{{--  --}}
{{-- @foreach ($doctor as $doctors)


<div id="editProfileModal" class="modal">
    <div class="modal-content"  style="padding: 50px">
        <h2>Edit Profile</h2>
        <form id="editProfileForm" method="POST" action="{{ route('editdoctor', ['id' => Auth::user()->id]) }}" class="edit-profile-form" enctype="multipart/form-data">
            @csrf --}}
            {{-- @method('PUT') --}}
            <!-- Add form fields for editing profile information -->
            {{-- <div class="form-group" style="padding: 15px;">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $doctors->name }}" class="form-control">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="{{ $doctors->address }}" class="form-control">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="{{ $doctors->email }}" class="form-control">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="{{ $doctors->phone }}" class="form-control">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="specialization">Specialization:</label>
                <input type="text" id="specialization" name="specialization" value="{{ $doctors->specialization }}" class="form-control">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="experience">Experience:</label>
                <input type="text" id="experience" name="experience" value="{{ $doctors->experience }}" class="form-control">
            </div>
            <div class="form-group mb-3" style="padding: 15px;">
                <label class="form-label" for="medical_license">Medical License:</label>
                <img height="150px" width="200px" src="doctordocument/{{ $doctors->medical_license }}">
                <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                <input class="form-control" type="file" id="medical_license" name="medical_license">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="certification_documents">Certification Documents:</label>
                <img height="150px" width="200px" src="doctordocument/{{ $doctors->certification_documents }}">
                <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                <input type="file" id="certification_documents" name="certification_documents" class="form-control">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="educational_certificates">Educational Certificates:</label>
                <img height="150px" width="200px" src="doctordocument/{{ $doctors->educational_certificates }}">
                <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                <input type="file" id="educational_certificates" name="educational_certificates" class="form-control">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="professional_affiliation_proof">Professional Affiliation Proof:</label>
                <img height="150px" width="200px" src="doctordocument/{{ $doctors->professional_affiliation_proof }}">
                <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                <input type="file" id="professional_affiliation_proof" name="professional_affiliation_proof" class="form-control">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="continuing_education_certificates">Continuing Education Certificates:</label>
                <img height="150px" width="200px" src="doctordocument/{{ $doctors->continuing_education_certificates }}">
                <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                <input type="file" id="continuing_education_certificates" name="continuing_education_certificates" class="form-control">
            </div>
            <div class="form-group" style="padding: 15px;">
                <label for="image">Your Image:</label>
                <img height="150px" width="150px" src="doctorimage/{{ $doctors->image }}">
                <img src="https://img.icons8.com/?size=1x&id=24373&format=png" height="30px" style="margin-right: 5px;">
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn mybutton">Save</button>
            </div>
        </form>
    </div>
</div>


@endforeach --}}

{{--  --}}


{{-- <div class="container" align="center" style="padding:100px"> --}}
    {{-- <form action="{{ route('update-doctor') }}" method="POST" enctype="multipart/form-data"> --}}

        {{-- @csrf --}}

        {{-- <div style="padding: 15px">
            <label>Name</label>
            <input type="text" name="name" value="{{ $data->name }}">
        </div>

        <div style="padding: 15px">
            <label>phone</label>
            <input type="text" name="phone" value="{{ $data->phone }}">
        </div>

        <div style="padding: 15px">
            <label>address</label>
            <input type="text" name="address" value="{{ $data->address }}">
        </div>

        <div style="padding: 15px">
            <label>specialization</label>
            <input type="text" name="specialization" value="{{ $data->specialization }}">
        </div>

        <div style="padding: 15px">
            <label>experience</label>
            <input type="text" name="experience" value="{{ $data->experience }}">
        </div>

        <div style="padding: 15px">
            <label>Image</label>
            <img src="doctorimage/{{ $data->image }}" style="max-height: 150px;">
        </div>

        <div style="padding: 15px">
            <label>Change Image</label>
            <input type="file" name="image">
        </div>

        <div style="padding: 15px">
            <label>medical_license</label>
            <input type="text" name="medical_license" value="{{ $data->medical_license }}">
        </div>

        <div style="padding: 15px">
            <label>certification_documents</label>
            <input type="text" name="certification_documents" value="{{ $data->certification_documents }}">
        </div>

        <div style="padding: 15px">
            <label>educational_certificates</label>
            <input type="text" name="educational_certificates" value="{{ $data->educational_certificates }}">
        </div>

        <div style="padding: 15px">
            <label>professional_affiliation_proof</label>
            <input type="text" name="professional_affiliation_proof" value="{{ $data->professional_affiliation_proof }}">
        </div>

        <div style="padding: 15px">
            <label>continuing_education_certificates</label>
            <input type="text" name="continuing_education_certificates" value="{{ $data->continuing_education_certificates }}">
        </div> --}}

        {{-- <div style="padding: 15px">
            <input type="submit" class="btn btn-primary">
        </div>
    </form> --}}
{{-- </div> --}}
<!-- Form for editing user data -->
{{-- {{ $data->name }}
{{ $data->phone }}
{{ $data->address }}
{{ $data->specialization }}
{{ $data->experience }}
{{ $data->medical_license }}
{{ $data->certification_documents }}
{{ $data->educational_certificates }}
{{ $data->professional_affiliation_proof }}
{{ $data->continuing_education_certificates }} --}}

</body>
</html>
