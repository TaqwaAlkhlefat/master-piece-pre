<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('doctor/showappointment.css') }}" rel="stylesheet" />
</head>
<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-8 col-lg-6">
            <!-- Section Heading-->
            <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
              <h3>My Appointment</h3>
              <div class="line"></div>
            </div>
          </div>
        </div>
        <div class="row">


          <!-- Single Advisor-->

                <div>
                    <table class="table table-hover">
                        <tr>
                            <th>Customer name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th style="width:120px">Date</th>
                            <th>Time</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Approved</th>
                            <th>Canceled</th>
                            <th>Send Mail</th>
                        </tr>

                        @foreach ($data as $appoint )
                            <tr>
                                <td>{{ $appoint->name }}</td>
                                <td>{{ $appoint->email }}</td>
                                <td>{{ $appoint->phone }}</td>
                                <td>{{ $appoint->date }}</td>
                                <td>{{ $appoint->time }}</td>
                                <td>{{ $appoint->message }}</td>
                                <td>{{ $appoint->status }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approved</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Canceled</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send Mail</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{-- <div><a href="{{url('doctor.home')}}" >Back</a> </div> --}}
                </div>
                <!-- Social Info-->
              </div>
      </div>
      {{-- <h4><x-app-layout></x-app-layout></h4> --}}
</body>
</html>
