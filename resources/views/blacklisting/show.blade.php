@extends('layouts.app')
    @section('content')
        <a href="/blacklistings" @class(['mt-3', 'btn', 'btn-default', 'btn-light'])>Go Back</a>
        <h1 @class(['mt-3', 'mb-3'])>{{ $blacklisting->candidate_firstname }} {{ $blacklisting->candidate_lastname }}</h1>

        <div class="card d-flex mb-3" style="border-color: red;">
            <div class="card-body">
                <div @class(['d-flex', 'justify-content-between'])>
                    <h3 class="card-title"><b>University:</b> {{ $blacklisting->school }}</h3>
                    <h6 class="card-subtitle text-body-secondary">Blacklisted {{ $blacklisting->created_at->diffForHumans() }}</h6>
                </div>
                <h4 class="card-text">Reason: {{ $blacklisting->blacklist_reason }}</h4>
                <p></p>
                <div @class(['d-flex', 'gap-3', 'mt-3', 'mb-3'])>
                    <a href="/blacklistings/{{$blacklisting->id}}/edit"><button @class(['btn', 'btn-default', 'btn-secondary'])>Edit</button></a>
                    <form action="{{ route('blacklistings.destroy', $blacklisting->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" @class(['btn', 'btn-danger'])>Delete</button></a>
                    </form>
                </div>
            </div>
            <div>
                <h2>Blacklisting Evidence</h2>
                    <img src="{{ asset('storage/images/'.$blacklisting->image_path) }}" alt="evidence of blacklisting" class="w-25" @required(true)/>
            </div>
        </div>
    @endsection

    <style>
        .btn-danger {
            background-color: crimson!important;
        }
    </style>
    