@extends('layout.app')
    @section('content')
        <h1 @class(['mt-3'])>{{ $student->name }} {{ $student->surname }}</h1>
    @endsection