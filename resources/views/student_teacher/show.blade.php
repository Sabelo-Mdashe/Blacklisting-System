@extends('layouts.app')
    @section('content')
    <h1 @class(['mt-3', 'mb-2'])>Student Teacher Details</h1>
    <div @class(['d-flex', 'justify-content-between'])>
        <div @class(['d-flex', 'gap-2'])>
            <a href="/students"><button @class(['mt-3', 'btn', 'btn-default', 'btn-light'])>Go Back</button></a>
            <a href="/blacklistings/create"><button @class(['mt-3', 'btn', 'btn-default', 'btn-danger'])>Blacklist</button></a>
        </div>
        <form action="{{ route('students.destroy',$student->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" @class(['mt-3', 'btn', 'btn-default', 'btn-danger'])>Delete</button>
        </form>
    </div>
    <hr>

    <div @class(['mt-3'])>
        <h2>{{--{{ $student->name }} {{ $student->surname }}--}} Personal Information:</h2>
        {{-- <p>First Name: {{ $student->name }}</p> --}}

        <div class="card text-center mt-5">
            <div class="card-header">
              <b>ID : {{ $student->id }}</b>
            </div>
            <div class="card-body">
              <h5 class="card-title"><b>Name:</b> {{ $student->name }} {{ $student->surname }}</h5>
              <h5 class="card-title"><b>Institution:</b> {{ $student->university }}</h5>
              <p class="card-text"><b>Location: </b>{{ $student->address }}, {{ $student->city }}, {{ $student->province }}</p>
              <a href="/students/{{$student->id}}/edit"><button @class(['mt-3', 'btn', 'btn-default', 'btn-light'])>Edit Teacher</button></a>
              {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            </div>
            <div class="d-flex justify-content-around card-footer text-body-secondary">
            <span><b>Last Updated on</b> {{ $student->updated_at }}</span>
            <span><b>Created on</b> {{ $student->created_at }}</span>
            </div>
          </div>
    </div>
    @endsection

    <style>
        .btn-danger {
            background-color: crimson!important;
        }
    </style>