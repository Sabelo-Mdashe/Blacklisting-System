@extends('layout.app')
    @section('content')
        <form class="d-flex mt-5" role="search">
            <input class="me-2 p-2" style="border: 1px lightgrey solid; border-radius: .5em" type="search" placeholder="Search Student" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        Students Page
    @endsection

    {{-- <style>
        .me-2 {
            : 
        }
    </style> --}}