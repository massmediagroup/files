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
                        <p class="card-text"><small class="text-muted">Дата
                                видалення: {{ $file->delete_after ?? '' }}</small></p>
                        <p class="card-text">
                            <input type="text" disabled value="{{ $file->url ?? '' }}">
                            <form action="{{ route('files.update', $file) }}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-info">Генерувати посилання</button>
                            </form>
                        </p>
                        <form action="{{ route('files.destroy', $file) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Видалити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
