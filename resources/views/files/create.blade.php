@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Коментар:</label>
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Виберіть файл:</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <div class="form-group">
                <label for="">Виберіть дату видалення файлу:</label>
                <input type="date" name="delete_after" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Завантаження</button>
        </form>
    </div>
@endsection
