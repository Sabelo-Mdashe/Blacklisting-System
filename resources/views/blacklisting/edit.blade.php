@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>Edit Blacklisting</h1>
        <form action="{{ route('blacklistings.update',$blacklisting->id) }}" method="POST" @class(['d-flex', 'gap-4', 'flex-column'])>
            <div @class(['form-group'])>
                <label for="name">First Name</label>
                <input type="text" name="name" value="{{ $blacklisting->candidate_firstname }}" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group', 'font-bold' => true])>
                <label for="surname">Last Name</label>
                <input type="text" name="surname" value="{{ $blacklisting->candidate_lastname }}" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="university">University</label>
                {{-- <input type="text" name="university" @class(['form-control', 'w-50'])> --}}
                <select name="university" @class(['form-control', 'w-50'])>
                    <option>{{ $blacklisting->school }}</option>
                    @foreach ($schools as $school)
                        <option>{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
            <div @class(['form-group'])>
                <textarea required name="reason" class="form-control w-50" placeholder="Reason for blacklisting" style="height: 100px">{{ $blacklisting->blacklist_reason }}</textarea>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                @method('PATCH')
                @csrf
                <button type="submit" class="btn btn-primary me-md-2">Save Changes</button>
                <a href="/blacklistings/{{ $blacklisting->id }}" @class(['btn', 'btn-default', 'btn-secondary'])>Cancel</a>
            </div>
        </form>
    @endsection

    <style>
        .btn-primary {
            background-color: blue!important;
        }
    </style>