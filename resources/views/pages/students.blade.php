@extends('layouts.app')
    @section('content')

        {{-- SEARCH FUNCTION *** STILL NEED TO BE FUNCTIONAL --}}

        {{-- <form class="d-flex mt-5" role="search">
            <input class="me-2 p-2" style="border: 1px lightgrey solid; border-radius: .5em" type="search" placeholder="Search Student" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}

        <h1 @class(['mt-3', 'mb-3'])>Student Teachers</h1>

        {{-- IF STATEMENT *** TO DISPALY A MESSAGE WHEN NOTHING IS FOUNG *** STILL NEED TO MAKE IT WORK --}}
        {{-- @if (count($students > 0)) --}}
        
            <div @class(['d-flex', 'justify-content-end', 'mb-3'])>
                <a href="/students/create">
                    <button @class(['btn', 'btn-default', 'btn-success'])>Add Student Teacher</button>
                </a>
            </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Province</th>
                    <th scope="col">University</th>
                    <th scope="col">Actions</th>
                    {{-- <th></th> --}}
                    {{-- <th>Actions</th> --}}
                  </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        {{-- <form action="{{ route('blacklistings.store') }}" method="POST"> --}}
                            <th scope="row">{{ $student->id }}</th>
                            <td><a href="/students/{{ $student->id }}" style="color: blue">{{ $student->name }}</a></td>
                            <td>{{ $student->surname }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->city }}</td>
                            <td>{{ $student->province }}</td>
                            <td>{{ $student->university }}</td>
                            {{-- <td>{{ $student->created_at }}</td> --}}
                            <td>
                                <div @class(['d-flex', 'gap-3'])>
                                    <a href="/students/{{ $student->id }}">
                                        <i class="fa-solid fa-eye fa-fade"></i>
                                    </a>
                                    <a href="/students/{{$student->id}}/edit">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        {{-- <button type="submit" @class(['mt-3', 'btn', 'btn-default', 'btn-danger'])>Delete</button> --}}
                                        <button type="submit"><i class="fa-solid fa-trash" style="color:red"></i></button>
                                    </form>
                                </div>
                            </td>
                            {{-- <td><button @class(['submit', 'btn', 'btn-default', 'btn-danger']) type="submit">Blacklist</button></td> --}}
                        </form>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        {{-- @else
            <p>No Student Teachers found</p>
        @endif --}}
    @endsection

    <style>
        .submit {
            background-color:crimson!important;
        }
    </style>