@extends('layout.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>{{ $school->name }}</h1>
        <div @class(['mb-3'])>
            <h2 @class(['mb-2'])>School Location:</h2>
            <p>City: {{ $school->city }}</p>
            <p>Province: {{ $school->province }}</p>
        </div>
        <div @class(['d-flex', 'justify-content-end', 'gap-3'])>
            <a href="/schools/{{ $school->id }}/edit">
                <button @class(['btn', 'btn-default', 'btn-light', 'mb-2'])>Edit School</button>
            </a>
            <a href="/schools">
                <button @class(['btn', 'btn-default', 'btn-light', 'mb-2'])>Go Back</button>
            </a>
        </div>
        <hr>

        <h4 style="color: red" @class(['mt-2', 'mb-3'])>Students Teachers Blacklisted at {{ $school->name }}</h4>
    @endsection