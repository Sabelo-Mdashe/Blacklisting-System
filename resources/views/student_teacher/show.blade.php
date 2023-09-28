@extends('layout.app')
    @section('content')
    <a href="/students"><button @class(['mt-3', 'btn', 'btn-default', 'btn-light'])>Back</button></a>
        <h1 @class(['mt-3'])>{{ $student->name }} {{ $student->surname }}</h1>
        <a href="/students/{{$student->id}}/edit"><button @class(['mt-3', 'btn', 'btn-default', 'btn-light'])>Edit</button></a>
    @endsection