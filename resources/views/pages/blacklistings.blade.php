@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-5'])>Blacklistings</h1>
        {{-- @foreach ($blacklistings as $blacklisting)
        <p>{{ $blacklisting->candidate_firstname }}</p>
            
        @endforeach --}}
        {{-- <p>{{ $blacklisting->candidate_firstname }}</p> --}}

        {{-- <div @class(['d-flex', 'justify-content-end', 'mb-3'])>
            <a href="/blacklistings/create">
                <button @class(['btn', 'btn-default', 'btn-success'])>Add Blacklisting</button>
            </a>
        </div> --}}
        @if ($blacklistings->count())    
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">University</th>
                <th scope="col">Reason</th>
                <th scope="col">Blacklisted</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blacklistings as $blacklisting)
                <tr>
                    <th scope="row">{{ $blacklisting->id }}</th>
                    <td>
                        <a style="color: red" href="/blacklistings/{{ $blacklisting->id }}">
                            {{ $blacklisting->candidate_firstname }}
                        </a>
                    </td>
                    <td>{{ $blacklisting->candidate_lastname }}</td>
                    <td>{{ $blacklisting->school }}</td>
                    <td>{{ $blacklisting->blacklist_reason }}</td>
                    <td>{{ $blacklisting->created_at->diffForHumans() }}</td>
                    <td>
                        <div @class(['d-flex', 'gap-3'])>
                            <a href="/blacklistings/{{ $blacklisting->id }}">
                                <i class="fa-solid fa-eye fa-fade"></i>
                            </a>
                            <a href="/blacklistings/{{$blacklisting->id}}/edit">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="{{ route('blacklistings.destroy',$blacklisting->id) }}" method="POST">
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
        @else
            No Students are blacklisted
        @endif
    @endsection