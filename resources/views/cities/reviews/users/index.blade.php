@extends('layouts.main')
@section('content')
    <h1 class="mb-5">Отзывы от пользователя {{ $user->fio }}</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Заголовок</th>
            <th scope="col">Город</th>
            <th scope="col">Рейтинг</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
        <tr>
            <td>{{ $review->title }}</td>
            <td>{{ \App\Models\City::where('id', $review->city_id)->value('name') }}</td>
            <td>{{ $review->rating }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
