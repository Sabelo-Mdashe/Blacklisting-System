@extends('layouts.app')
    @section('content')
        <h1 @class(['mt-3', 'mb-3'])>Add To Blacklisting</h1>
        <form action="{{ route('blacklistings.store') }}" method="POST" @class(['d-flex', 'gap-4', 'flex-column'])>
            <div @class(['form-group'])>
                <label for="name">Student Name</label>
                <input type="text" name="name" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="surname">Last Name</label>
                <input type="text" name="surname" @class(['form-control', 'w-50'])>
            </div>
            <div @class(['form-group'])>
                <label for="province">University</label>
                <input type="text" name="university" @class(['form-control', 'w-50'])>
            </div>
            {{-- <div @class(['form-group'])>
                <textarea name="reason" cols="50" rows="10" placeholder="Reason for blacklisting"></textarea>
            </div> --}}

            <div class="form-group">
                <textarea required name="reason" class="form-control w-50" placeholder="Reason for blacklisting" style="height: 100px"></textarea>
                {{-- <label for="floatingTextarea2">Comments</label> --}}
              </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                @csrf
                <button type="submit" class="btn btn-primary me-md-2">Blacklist</button>
                <a href="/blacklistings" @class(['btn', 'btn-default', 'btn-secondary'])>Cancel</a>
            </div>
        </form>
    @endsection

    <style>
        .btn-primary {
            background-color: blue!important;
        }

        .btn-primary:hover {
            background-color: crimson!important;
            border-color: crimson!important;
        }

        ::placeholder {
            color: crimson!important;
        }
    </style>