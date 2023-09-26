@extends('layout.app')
    @section('content')
        <h1 @class(['mt-5'])>Schools</h1>
        <form class="d-flex" role="search">
            <input class="me-2 p-2" type="search" placeholder="Search School" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    @endsection

<style>
    .me-2 {
        width: 20%;
        border: 1px solid lightgrey;
        border-radius: .375rem;
    }
</style>