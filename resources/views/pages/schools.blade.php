@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>Schools List</h1>
        @if ($schools->count())
            <div @class(['d-flex', 'justify-content-between'])>
                    <div @class(['d-flex', 'gap-3', 'align-items-center'])>
                        <form action="#" method="GET" class="d-flex gap-2" role="search">
                            <input name="searchschool" class="p-2" type="search" placeholder="Search School" aria-label="Search" value="{{ request('searchschool') }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <a href="/schools"><i class="fa-solid fa-arrow-rotate-right fs-3"></i></a>
                    </div>
        @endif
                <div @class(['d-flex', 'justify-content-end'])>
                    <a href="/schools/create">
                        <button @class(['btn', 'btn-default', 'btn-success'])>Add School</button>
                    </a>
                </div>
            </div>
        @if ($schools->count())
            
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">School Name</th>
                <th scope="col">City</th>
                <th scope="col">Area/Borough</th>
                <th scope="col">Created</th>
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
                    <td>{{ $school->created_at->diffForHumans() }}</td>
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
        @if (request(['searchschool']))
            
        @else  
            {{ $schools->links() }}
        @endif
        @else
            <p>No Student Teachers found on the System. Please add Students</p>
        @endif
    @endsection

<style>
    input {
        /* width: 20%; */
        border: 1px solid lightgrey;
        border-radius: .375rem;
    }

    p {
        text-align: center;
        font-size: 1.5rem;
    }

    .flex {
        justify-content: space-between;
        gap: .5rem
    }

    .hidden {
        gap: .5rem;
    }

    .rounded-md {
        border-radius: .5rem;
    }
</style>