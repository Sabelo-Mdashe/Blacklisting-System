@extends('layout.app')
    @section('content')
        {{-- <form class="d-flex mt-5" role="search">
            <input class="me-2 p-2" style="border: 1px lightgrey solid; border-radius: .5em" type="search" placeholder="Search Student" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        <h1 @class(['mt-3', 'mb-3'])>Student Teachers</h1>
        {{-- @if (count($students > 0)) --}}
            {{-- <div @class(['d-flex', 'justify-content-end', 'mb-3'])>
                <a href="/create">
                    <button @class(['btn', 'btn-default', 'btn-success'])>Add Student Teacher</button>
                </a>
            </div> --}}
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Province</th>
                    <th scope="col">University</th>
                    <th scope="col">Created On</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td><a href="/students/{{ $student->id }}" style="color: blue">{{ $student->name }}</a></td>
                        <td>{{ $student->surname }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->city }}</td>
                        <td>{{ $student->province }}</td>
                        <td>{{ $student->university }}</td>
                        <td>{{ $student->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        {{-- @else
            <p>No Student Teachers found</p>
        @endif --}}
    @endsection

    {{-- <style>
        .me-2 {
            : 
        }
    </style> --}}