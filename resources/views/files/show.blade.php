@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset('/storage/' . $file->path) }}" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $file->name }}</h5>
                        <p class="card-text">{{ $file->comment ?? '' }}</p>
                        <p class="card-text"><small class="text-muted">Дата видалення: {{ $file->delete_after ?? '' }}</small></p>
                        <a href="{{ route('files.destroy', $file) }}" class="btn btn-danger">Видалити</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
