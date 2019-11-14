@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Кількість переглядів файлів: {{ $countView ?? 0 }}</h2>
        <h2>Кількість файлів: {{ $countFiles ?? 0 }}</h2>
        <h2>Кількість видалених файлів: {{ $countDelete ?? 0 }}</h2>
    </div>
@endsection
