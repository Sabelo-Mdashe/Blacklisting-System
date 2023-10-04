@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>Create Student Teacher</h1>
        <form action="{{ route('students.store') }}" method="POST" @class(['d-flex', 'gap-4', 'flex-column'])>
            <div @class(['form-group'])>
                <label for="name">First Name</label>
                <input type="text" name="name" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="surname">Last Name</label>
                <input type="text" name="surname" @class(['form-control', 'w-50'])>
            </div>

            <div @class(['form-group'])>
                <label for="address">Address</label>
                <input type="text" name="address" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="city">City</label>
                <input type="text" name="city" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="province">Province</label>
                <input type="text" name="province" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="university">University</label>
                {{-- <input type="text" name="university" @class(['form-control', 'w-50'])> --}}
                <select name="university" @class(['form-control', 'w-50'])>
                    <option>-- Select School --</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }} {{ $school->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                @csrf
                <button type="submit" class="btn btn-primary me-md-2">Create</button>
                <a href="/students" @class(['btn', 'btn-default', 'btn-secondary'])>Cancel</a>
            </div>
        </form>
    @endsection

    <style>
        .btn-primary {
            background-color: blue!important;
        }
    </style>