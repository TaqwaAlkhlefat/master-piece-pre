<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .custom-form-group {
            margin-bottom: 10px;
        }

        .btn {
            padding: 5px 15px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show rounded shadow-lg">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background: transparent;">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get('message') }}
            </div>
            @endif

            <form action="{{ url('sendemail', $data->id) }}" method="POST" class="mt-3">
                @csrf

                <div class="form-group custom-form-group">
                    <label for="greeting">Greeting</label>
                    <input type="text" class="form-control" id="greeting" name="greeting" placeholder="Enter greeting">
                </div>

                <div class="form-group custom-form-group">
                    <label for="body">Body</label>
                    <input type="text" class="form-control" id="body" name="body" placeholder="Enter body">
                </div>

                <div class="form-group custom-form-group">
                    <label for="actiontext">Action Text</label>
                    <input type="text" class="form-control" id="actiontext" name="actiontext" placeholder="Enter action text">
                </div>

                <div class="form-group custom-form-group">
                    <label for="actionurl">Action URL</label>
                    <input type="text" class="form-control" id="actionurl" name="actionurl" placeholder="Enter action URL">
                </div>

                <div class="form-group custom-form-group">
                    <label for="endpart">End Part</label>
                    <input type="text" class="form-control" id="endpart" name="endpart" placeholder="Enter end part">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-secondary" href="javascript:history.back()">Back</a>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-w4gtf+3/r81zlimhp+18n8w3/3pamo8F5f5Kf5r5l5uqz5i++5F5F5F5F5F5F5F5F5F5F" crossorigin="anonymous"></script>
</body>
</html>
