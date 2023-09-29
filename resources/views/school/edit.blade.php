@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>Update Student Teacher</h1>
        <form action="{{ route('schools.update',$school->id) }}" method="POST" @class(['d-flex', 'gap-4', 'flex-column'])>
            <div @class(['form-group'])>
                <label for="name">First Name</label>
                <input type="text" name="name" value="{{ $school->name }}" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="city">City</label>
                <input type="text" name="city" value="{{ $school->city }}" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="province">Province</label>
                <input type="text" name="province" value="{{ $school->province }}" @class(['form-control', 'w-50'])>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                @method('PATCH')
                @csrf
                <button type="submit" class="btn btn-success me-md-2">Update</button>
                <a href="/schools/{{$school->id}}" @class(['btn', 'btn-default', 'btn-secondary'])>Cancel</a>
            </div>
        </form>
    @endsection

    <style>
        .btn-success {
            background-color: #198754!important;
        }
        
    </style>