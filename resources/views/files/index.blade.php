@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('files.create') }}" class="btn btn-success">Завантажити новий файл</a><br><br>
        <h4>Кількість файлів: {{ $count }}</h4>
        <table class="table">
            <thead>
                <tr>
                    <td>Імя</td>
                    <td class="text-right">Дії</td>
                </tr>
            </thead>
            <tbody>
            @forelse($files as $file)
                <tr>
                    <td>{{ $file->name ?? '' }}</td>
                    <td><a href="{{ route('files.show', $file) }}" class="btn btn-link">Перегляд</a></td>
                </tr>
            </tbody>
            <tfoot>
            @empty
                <tr>
                    <td colspan="2">Даних немає</td>
                </tr>
            </tfoot>
            @endforelse
        </table>
    </div>
@endsection
