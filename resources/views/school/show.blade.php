@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>{{ $school->name }}</h1>
        <div @class(['mb-3'])>
            <h2 @class(['mb-2'])>School Location:</h2>
            <p>City: {{ $school->city }}</p>
            <p>Province: {{ $school->province }}</p>
        </div>
        <div @class(['d-flex', 'justify-content-between'])>
            <div>
                <a href="/schools/{{ $school->id }}/edit">
                    <button @class(['btn', 'btn-default', 'btn-light', 'mb-2'])>Edit School</button>
                </a>
                <a href="/schools">
                    <button @class(['btn', 'btn-default', 'btn-light', 'mb-2'])>Go Back</button>
                </a>
            </div>
            <div>
                <form action="{{ route('schools.destroy', $school->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" @class(['btn', 'btn-default', 'submit'])>Delete</button>
                </form>
            </div>
        </div>
        <hr>
        @if ($school->blacklistings->count())    
            <h4 style="color: red" @class(['mt-2', 'mb-3'])>Students Teachers Blacklisted at {{ $school->name }}</h4>

            <table class="table table-hover table-dark">
                <thead>
                <tr>
                    {{-- <th scope="col">ID</th> --}}
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Blacklisted</th>
                    {{-- <th scope="col">Province</th>
                    <th scope="col">University_Id</th> --}}
                    
                    {{-- <th></th> --}}
                    {{-- <th>Actions</th> --}}
                </tr>
                </thead>
                <tbody>
                    @foreach ($school->blacklistings as $blacklisting)
                    <tr>
                        {{-- <form action="{{ route('blacklistings.store') }}" method="POST"> --}}
                            {{-- <th scope="row">{{ $student->id }}</th> --}}
                            <td><a>{{ $blacklisting->candidate_firstname }}</a></td>
                            <td>{{ $blacklisting->candidate_lastname }}</td>
                            <td>{{ $blacklisting->blacklist_reason }}</td>
                            <td>{{ $blacklisting->created_at->diffForHumans() }}</td>
                            {{-- <td>{{ $student->province }}</td>
                            <td>{{ $student->university }}</td> --}}
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No Student Teachers are Blacklisted at {{ $school->name }}</p>
        @endif

    @endsection

    <style>
        .submit {
            background-color: crimson!important;
            color: white!important;
        }
    </style>