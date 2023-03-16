@extends('layouts.main')
@section('content')
    <h1 class="text-center mb-3">Мои отзывы</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Заголовок</th>
            <th scope="col">Город</th>
            <th scope="col">Отзыв</th>
            <th scope="col">Рейтинг</th>
            <th scope="col">Фото прикрепленное к отзыву</th>
            <th scope="col" class="text-center" colspan="2">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->title }}</td>
                <td>{{ \App\Models\City::where('id', $review->city_id)->value('name') }}</td>
                <td>{{ $review->text }}</td>
                <td>{{ $review->rating }}</td>
                @if($review->image != null)
                    <td>
                        <img class="w-25" src="{{ asset('storage/' . $review->image) }}">
                    </td>
                @else
                    <td>Фото отсутсвует</td>
                @endif
                <td>
                    <a href="{{ route('review.edit', $review->id) }}">
                        Изменить
                    </a>
                </td>
                <td>
                    <form action="{{ route('review.delete', $review->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button id="deleteBtn" class="text-danger border-0 bg-transparent" type="submit">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <script src="{{ asset('assets/js/preloader.js') }}"></script>
@endsection
