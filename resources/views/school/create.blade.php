@extends('layouts.app')
    @section('content')
    <h1 @class(['mt-3', 'mb-3'])>Create School</h1>
    <form action="{{ route('schools.store') }}" method="POST" @class(['d-flex', 'gap-4', 'flex-column'])>
        <div @class(['form-group'])>
            <label for="name">School Name</label>
            <input type="text" name="name" @class(['form-control', 'w-50', 'name']) value="{{ old('name') }}">

            {{-- Error handling for the school name field --}} 
            @error('name')
                <p @class(['text-danger'])>{{ $message }}</p>
                <style>
                    .name{
                        border-color: red;
                    }
                </style>
            @enderror
        </div>

        <div @class(['form-group'])>
            <label for="city">City</label>
            <input type="text" name="city" @class(['form-control', 'w-50', 'city']) value="{{ old('city') }}">

            {{-- Error handling for the city field --}}
            @error('city')
                <p @class(['text-danger'])>{{ $message }}</p>
                <style>
                    .city {
                        border-color: red;
                    }
                </style>
            @enderror
        </div>

        <div @class(['form-group'])>
            <label for="province">Province</label>
            <input type="text" name="province" @class(['form-control', 'w-50', 'province']) value="{{ old('province') }}">

            {{-- Error handling for the province field --}}
            @error('province')
                <p @class(['text-danger'])>{{ $message }}</p>
                <style>
                    .province {
                        border-color: red;
                    }
                </style>
            @enderror
        </div>

        {{-- <div @class(['form-group'])>
            <label for="province">University</label>
            <input type="text" name="university" @class(['form-control', 'w-50'])>
        </div> --}}
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            @csrf
            <button type="submit" class="btn btn-primary me-md-2" @style([
                'background-color: rgb(8, 165, 8)!important',
                'border-color: rgb(8, 165, 8)!important',
            ])>Create</button>
            <a href="/schools" @class(['btn', 'btn-default', 'btn-secondary'])>Cancel</a>
        </div>
    </form>
    @endsection