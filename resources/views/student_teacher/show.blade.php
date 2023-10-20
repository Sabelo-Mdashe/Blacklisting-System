@extends('layouts.app')
    @section('content')
    <h1 @class(['mt-3', 'mb-2'])>Student Teacher Details</h1>
    <div @class(['d-flex', 'justify-content-between'])>
        <div @class(['d-flex', 'gap-2'])>
            <a href="/students"><button @class(['mt-3', 'btn', 'btn-default', 'btn-light'])>Go Back</button></a>
            <a><button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal" @class(['mt-3', 'btn', 'btn-default', 'btn-danger'])>Blacklist</button></a>
        </div>
        <form action="{{ route('students.destroy',$student->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" @class(['mt-3', 'btn', 'btn-default', 'btn-danger'])>Delete</button>
        </form>
    </div>
    <hr>

    <div @class(['mt-3'])>
        <h2>{{--{{ $student->name }} {{ $student->surname }}--}} Personal Information:</h2>
        {{-- <p>First Name: {{ $student->name }}</p> --}}

        <div class="card text-center mt-5">
            <div class="card-header">
              <b>ID : {{ $student->id }}</b>
            </div>
            <div class="card-body">
              <h5 class="card-title"><b>Name:</b> {{ $student->name }} {{ $student->surname }}</h5>
              <h5 class="card-title"><b>Institution:</b> {{ $student->school->name }}</h5>
              <p class="card-text"><b>Location: </b>{{ $student->address }}, {{ $student->city }}, {{ $student->province }}</p>
              <a href="/students/{{$student->id}}/edit"><button @class(['mt-3', 'btn', 'btn-default', 'btn-light'])>Edit Teacher</button></a>
              {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
            </div>
            <div class="d-flex justify-content-around card-footer text-body-secondary">
            <span><b>Last Updated on</b> {{ $student->updated_at }}</span>
            <span><b>Created on</b> {{ $student->created_at }}</span>
            </div>
          </div>
          {{-- Blacklisted by: --}}
          {{-- <p>{{ $student->blacklistings->school }}</p> --}}
    </div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Reason for Blacklisting</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('blacklistings.store') }}" method="POST" @class(['d-flex', 'gap-4', 'flex-column']) enctype="multipart/form-data">
                <div @class(['form-group'])>
                    <label for="name">Student Name</label>
                    <input type="text" name="name" @class(['form-control']) value="{{ $student->name }}" readonly>
                </div>
                <div @class(['form-group'])>
                    <label for="surname">Last Name</label>
                    <input type="text" name="surname" @class(['form-control']) value="{{ $student->surname }}" readonly>
                </div>
                <div @class(['form-group'])>
                    <label for="university">University</label>
                    <input type="text" name="university_id" @class(['form-control']) value="{{ $student->university }}" hidden>
                    <input type="text" name="university" value="{{ $student->school->name }}" @class(['form-control']) readonly>

                </div>
                {{-- <div @class(['form-group'])>
                    <textarea name="reason" cols="50" rows="10" placeholder="Reason for blacklisting"></textarea>
                </div> --}}
    
                <div class="form-group">
                    <textarea required name="reason" class="form-control" placeholder="Reason for blacklisting" style="height: 100px"></textarea>
                    {{-- <label for="floatingTextarea2">Comments</label> --}}
                  </div>

                  <div @class(['form-group'])>
                    <label for="image">Upload Image</label>
                    <input type="file" name="image" @class(['form-control']) required>

                    @error('image')
                        <p>{{ $message }}</p>
                    @enderror
                  </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    @csrf
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger me-md-2">Blacklist</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
    @endsection

    <style>
        .btn-danger {
            background-color: crimson!important;
        }

        .btn-secondary {
            background-color: gray!important;
        }

        ::placeholder {
            color: crimson!important;
        }
    </style>