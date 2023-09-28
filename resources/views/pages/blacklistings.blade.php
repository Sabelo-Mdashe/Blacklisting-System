@extends('layout.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>Blacklistings</h1>
        {{-- @foreach ($blacklistings as $blacklisting)
        <p>{{ $blacklisting->candidate_firstname }}</p>
            
        @endforeach --}}
        {{-- <p>{{ $blacklisting->candidate_firstname }}</p> --}}

        <div @class(['d-flex', 'justify-content-end', 'mb-3'])>
            <a href="/blacklistings/create">
                <button @class(['btn', 'btn-default', 'btn-success'])>Add Blacklisting</button>
            </a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">University</th>
                <th scope="col">Reason</th>
                <th scope="col">Created On</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($blacklistings as $blacklisting)
                <tr>
                    <th scope="row">{{ $blacklisting->id }}</th>
                    <td>
                        <a style="color: blue" href="/blacklistings/{{ $blacklisting->id }}">
                            {{ $blacklisting->candidate_firstname }}
                        </a>
                    </td>
                    <td>{{ $blacklisting->candidate_lastname }}</td>
                    <td>{{ $blacklisting->school }}</td>
                    <td>{{ $blacklisting->blacklist_reason }}</td>
                    <td>{{ $blacklisting->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    @endsection