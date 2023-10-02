@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>Schools List</h1>
        {{-- <form class="d-flex" role="search">
            <input class="me-2 p-2" type="search" placeholder="Search School" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        <div @class(['d-flex', 'justify-content-end', 'mb-3'])>
            <a href="/schools/create">
                <button @class(['btn', 'btn-default', 'btn-success'])>Add School</button>
            </a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">School Name</th>
                <th scope="col">City</th>
                <th scope="col">Province</th>
                <th scope="col">Created On</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($schools as $school)
                <tr>
                    <th scope="row">{{ $school->id }}</th>
                    <td><a href="/schools/{{ $school->id }}" style="color: blue">{{ $school->name }}</a></td>
                    <td>{{ $school->city }}</td>
                    <td>{{ $school->province }}</td>
                    <td>{{ $school->created_at }}</td>
                    <td>
                        <div @class(['d-flex', 'gap-3'])>
                            <a href="/schools/{{ $school->id }}">
                                <i class="fa-solid fa-eye fa-fade"></i>
                            </a>
                            <a href="/schools/{{$school->id}}/edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('schools.destroy',$school->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                {{-- <button type="submit" @class(['mt-3', 'btn', 'btn-default', 'btn-danger'])>Delete</button> --}}
                                <button type="submit"><i class="fa-solid fa-trash" style="color:red"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    @endsection

{{-- <style>
    .me-2 {
        width: 20%;
        border: 1px solid lightgrey;
        border-radius: .375rem;
    }
</style> --}}