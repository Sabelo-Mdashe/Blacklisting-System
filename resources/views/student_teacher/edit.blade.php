@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>Update Student Teacher</h1>
        <form action="{{ route('students.update',$student->id) }}" method="POST" @class(['d-flex', 'gap-4', 'flex-column'])>
            <div @class(['form-group'])>
                <label for="name">First Name</label>
                <input type="text" name="name" value="{{ $student->name }}" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="surname">Last Name</label>
                <input type="text" name="surname" value="{{ $student->surname }}" @class(['form-control', 'w-50'])>
            </div>

            <div @class(['form-group'])>
                <label for="address">Address</label>
                <input type="text" name="address" value="{{ $student->address }}" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="city">City</label>
                <input type="text" name="city" value="{{ $student->city }}" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="province">Province</label>
                <input type="text" name="province" value="{{ $student->province }}" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="province">University</label>
                <input type="text" name="university" value="{{ $student->university }}" @class(['form-control', 'w-50'])>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                @method('PATCH')
                @csrf
                <button type="submit" class="btn btn-success me-md-2">Update</button>
                <a href="/students/{{$student->id}}" @class(['btn', 'btn-default', 'btn-secondary'])>Cancel</a>
            </div>
        </form>
    @endsection

    <style>
        .btn-success {
            background-color: #198754!important;
        }
        
    </style>