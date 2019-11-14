@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{ asset('/storage/' . $file->path ?? '') }}" class="card-img" alt="...">
    </div>
@endsection
