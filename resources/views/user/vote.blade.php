<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Hi</h1>
</body>
</html>
{{-- <div>
    <x-slot:title>
        Home
        </x-slot>
        <x-slot:image_title>
            Election 2022
            </x-slot>
            <div class="my-5">
                <h1 class="text-center">Voting For Good Person</h1>
                <div class="container my-4">
                    <div class="table-responsive">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                <strong>{{ session('success') }}</strong>
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Condidate Name</th>
                                    <th class="text-center">Position</th>
                                    <th class="text-center">Votes</th>
                                    <th class="text-center">Submit vote</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($candidates) > 0)
                                    @foreach ($candidates as $candidate)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $candidate->id }}</td>
                                            <td class="text-center" style="vertical-align: middle"><img
                                                    src="{{ asset('storage') }}/{{ $candidate->image }}" alt=""
                                                    style="width:100px;height:100px;"></td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $candidate->fname }} {{ $candidate->lname }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $candidate->positions->positions }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $candidate->points }}</td>
                                            @php
                                                $isVoted = \App\Models\Votes::where(['user_id' => Auth::user()->id, 'con_id' => $candidate->id])->first();

                                            @endphp

                                            @isset($isVoted)
                                                @if ($isVoted->user_id == Auth::user()->id || $isVoted->con_id == $candidate->id)
                                                    <td class="text-center" style="vertical-align: middle"><button
                                                            disabled class="btn btn-success">Submited</button>
                                                    </td>
                                                @endif
                                            @endisset

                                            @empty($isVoted)
                                                <td class="text-center" style="vertical-align: middle"><button
                                                        class="btn btn-success"
                                                        wire:click='addVote({{ $candidate->id }})'>Submit</button>
                                                </td>
                                            @endempty



                                        </tr>
                                    @endforeach
                                @else
                                    <h3>Record Not Found</h3>
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
 --}}
