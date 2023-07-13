<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div class="container" align="center" style="padding-top: 100px">

    @if(session()->has('message'))

    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ session()->get('message') }}
    </div>

    @endif

    <form action="" method="Post" enctype="multipart/form-data">
        @csrf

        <div style="padding: 15px">
            <label>Greeting</label>
            <input type="text" style="color: black" name="greeting" placeholder="" >
        </div>

        <div style="padding: 15px">
            <label>Body</label>
            <input type="text" style="color: black" name="body" placeholder="" >
        </div>

        <div style="padding: 15px">
            <label>Action Text</label>
            <input type="text" style="color: black" name="actiontext" placeholder="" >
        </div>

        <div style="padding: 15px">
            <label>Action Url</label>
            <input type="text" style="color: black" name="actionurl" placeholder="" >
        </div>

        <div style="padding: 15px">
            <label>End Part</label>
            <input type="text" style="color: black" name="endpart" placeholder="" >
        </div>

        <div style="padding: 15px">
            <input type="submit" class="btn btn-primary">
        </div>


    </form>

</div>
</body>
</html>
