@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5 mb-3">
                <div class="card-header" style="color: red; text-transform:uppercase; font-weight:bold">{{ __('Blacklisted Student Teachers') }}</div>

                <div class="card-body bg-dark">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- @foreach ($blacklistings as $blacklisting)
                        <p>{{ $blacklisting->candidate_firstname }}</p>
                    @endforeach --}}
                    {{-- {{ __('You are logged in!') }} --}}

                    <table class="table table-dark">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
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
                      <a href="/blacklistings" @class(['btn', 'btn-default', 'btn-primary'])>View More</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
