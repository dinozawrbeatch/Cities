@extends('layouts.main')

@section('content')
    <h1 class="mb-5">Отзывы о городе {{ $city->name }}</h1>
    @guest()
    <h5 class="mb-5 text-danger">Чтобы увидеть полноценные отзывы авторизуйтесь</h5>
    @endguest
    @auth()
    <div class="container">
        <div class="modal fade" id="authorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Информация об авторе</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body" id="author-info">

                    </div>
                </div>
            </div>
        </div>
        @endauth
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Заголовок</th>
                @auth()
                <th scope="col">Автор</th>
                <th scope="col">Отзыв</th>
                <th scope="col">Рейтинг</th>
                <th scope="col">Фото прикрепленные к отзыву</th>
                @endauth
            </tr>
            </thead>
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->title }}</td>
                    @auth()
                    <td>
                        <a href="#" class="text author-link" data-bs-toggle="modal"
                           data-bs-target="#authorModal"
                           data-user-id="{{ $review->user_id }}">
                            {{ \App\Models\User::where('id', $review->user_id)->value('fio') }}
                        </a>
                    </td>
                    <td>{{ $review->text }}</td>
                    <td>{{ $review->rating }}</td>
                    @if($review->image != null)
                    <td>
                        <img class="w-25" src="{{ asset('storage/' . $review->image) }}">
                    </td>
                    @else
                        <td>Фото отсутсвует</td>
                    @endif
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('assets/js/authorModal.js') }}"></script>
@endsection
