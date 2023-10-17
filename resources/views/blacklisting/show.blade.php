@extends('layouts.app')
    @section('content')
        <a href="/blacklistings" @class(['mt-3', 'btn', 'btn-default', 'btn-light'])>Go Back</a>
        <h1 @class(['mt-3', 'mb-3'])>{{ $blacklisting->candidate_firstname }} {{ $blacklisting->candidate_lastname }}</h1>

        <div class="card" style="width: 18rem; border-color: red;">
            <div class="card-body">
                <h5 class="card-title">University: {{ $blacklisting->school }}</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Blacklisted {{ $blacklisting->created_at->diffForHumans() }}</h6>
                <p class="card-text">Reason:</p>
                <p>{{ $blacklisting->blacklist_reason }}</p>
            </div>
            <div @class(['d-flex', 'gap-3', 'mt-3', 'mb-3', 'justify-content-around'])>
                <a href="/blacklistings/{{$blacklisting->id}}/edit"><button @class(['btn', 'btn-default', 'btn-secondary'])>Edit</button></a>
                <form action="{{ route('blacklistings.destroy', $blacklisting->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" @class(['btn', 'btn-danger'])>Delete</button></a>
                </form>
            </div>
        </div>
        <h2>Blacklisting Evidence</h2>
            <img src="{{ asset('storage/images/'.$blacklisting->image_path) }}" alt="evidence of blacklisting" class="w-50" @required(true)/>
    @endsection

    <style>
        .btn-danger {
            background-color: crimson!important;
        }
    </style>
    