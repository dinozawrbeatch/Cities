@extends('layouts.main')
@section('content')
    <h1>Города</h1>
    @auth()
        @if(auth()->user()->email_verified_at)
        <div class="text-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createReview">
                Оставьте свой отзыв
            </button>
        </div>
        @else
            <h5 class="text-danger text-center">Подтвердите почту, чтобы оставлять отзывы</h5>
        @endif
        <div class="container">
            <div class="modal fade" id="createReview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Заполните форму</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right" for="title">Заголовок</label>
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" name="title" id="title" class="form-control validate">
                                </div>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right" for="text">Отзыв</label>
                                    <i class="fas fa-envelope prefix grey-text"></i>
                                    <textarea class="form-control" id="text" name="text" rows="3"></textarea>
                                </div>

                                @error('text')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="rating">
                                    <div class="md-form mb-4">
                                        <label data-error="wrong" data-success="right" for="rating">Рейтинг</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio1"
                                                   value="1">
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio2"
                                                   value="2">
                                            <label class="form-check-label" for="inlineRadio2">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio1"
                                                   value="3">
                                            <label class="form-check-label" for="inlineRadio3">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio2"
                                                   value="4">
                                            <label class="form-check-label" for="inlineRadio4">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio1"
                                                   value="5">
                                            <label class="form-check-label" for="inlineRadio5">5</label>
                                        </div>
                                    </div>
                                </div>

                                @error('rating')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="mb-5">
                                    <label for="image" class="form-label">Можете прикрепить фото(необязательно)</label>
                                    <input class="form-control form-control-sm" id="image"

                                           name="image" type="file">
                                </div>

                                <label>Выберите города</label>
                                <select class="select2" multiple="multiple" name="city_ids[]"
                                        data-placeholder="Select a State"
                                        style="width: 100%;">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>

                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                <div class="modal-footer align-items-center">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endauth
            @guest()
                <div class="text-end text-center mb-3">
                    Чтобы оставить отзыв <a href="{{ route('login') }}">
                        авторизуйтесь
                    </a>
                </div>
            @endguest
            <ul class="list-group">
                @foreach($pageCities as $city)
                    <a href="{{ route('city.reviews.index', $city->id) }}">
                        <li class="list-group-item mb-1">{{ $city->name }}</li>
                    </a>
                @endforeach
            </ul>
            <div class="mt-3 mx-auto ">
                {{ $pageCities->links() }}
            </div>
        </div>
@endsection
