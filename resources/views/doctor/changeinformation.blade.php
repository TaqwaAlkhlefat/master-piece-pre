<!DOCTYPE html>
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
<h1>HI</h1>

@if (session()->has('message'))
    <div class="alert alert-success d-flex justify-content-between align-items-center">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="container" align="center" style="padding:100px">
    {{-- <form action="{{ route('update-doctor') }}" method="POST" enctype="multipart/form-data"> --}}

        @csrf

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
</div>
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
