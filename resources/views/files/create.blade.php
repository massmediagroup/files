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
                <div class="d-flex flex-row">
                    <input type="file" class="form-control-file" id="file" name="file">
                    @if($errors->get('file'))
                        @include('files.errors.errors', ['errors' => $errors->first('file')])
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="">Виберіть дату видалення файлу:</label>
                <div class="d-flex flex-row">
                    <input type="date" name="delete_after" class="form-control">
                    @if($errors->get('delete_after'))
                        @include('files.errors.errors', ['errors' => $errors->first('delete_after')])
                    @endif
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Завантаження</button>
        </form>
    </div>
@endsection
