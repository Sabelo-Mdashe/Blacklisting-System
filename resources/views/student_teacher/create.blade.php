@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>Create Student Teacher</h1>
        <form action="{{ route('students.store') }}" method="POST" @class(['d-flex', 'gap-4', 'flex-column'])>
            <div @class(['form-group'])>
                <label for="name">First Name</label>
                <input type="text" name="name" @class(['form-control', 'w-50', 'name']) value="{{ old('name') }}">

                {{-- Error handling for the name field --}}
                @error('name')
                    <p @class(['text-danger'])>{{ $message }}</p>
                    <style>
                        .name {
                            border-color: red;
                        }
                    </style>
                @enderror
            </div>
            <div @class(['form-group'])>
                <label for="surname">Last Name</label>
                <input type="text" name="surname" @class(['form-control', 'w-50', 'surname']) value="{{ old('surname') }}">

                {{-- Error handling for the surname field --}}
                @error('surname')
                    <p @class(['text-danger'])>{{ $message }}</p>
                    <style>
                        .surname {
                            border-color: red;
                        }
                    </style>
                @enderror
            </div>

            <div @class(['form-group'])>
                <label for="address">Address</label>
                <input type="text" name="address" @class(['form-control', 'w-50', 'address']) value="{{ old('address') }}">

                {{-- Error handling for the address field --}}
                @error('address')
                    <p @class(['text-danger'])>{{ $message }}</p>
                    <style>
                        .address {
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
            <div @class(['form-group'])>
                <label for="university">University</label>
                {{-- <input type="text" name="university" @class(['form-control', 'w-50'])> --}}
                <select name="university" @class(['form-control', 'w-50', 'university'])>
                    <option value="">-- Select School --</option>
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>

                {{-- Error handling for the university field --}}
                @error('university')
                    <p @class(['text-danger'])>{{ $message }}</p>
                    <style>
                        .university {
                            border-color: red;
                        }
                    </style>
                @enderror
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