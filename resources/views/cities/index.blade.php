@extends('layouts.main')
@section('content')

    <div class="flex-row ">
        <h1>Города</h1>
        <div class="text-end mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createReview">
                Оставьте свой отзыв
            </button>
        </div>
    </div>
    <div class="container">
        <div class="modal fade" id="createReview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Заполните форму</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post">
                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="title">Заголовок</label>
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="text" id="title" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <label data-error="wrong" data-success="right" for="text">Отзыв</label>
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <textarea class="form-control" id="text" name="text" rows="3"></textarea>
                            </div>

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
                            <div class="mb-5">
                                <label for="formFileSm" class="form-label">Можете прикрепить фото(необязательно)</label>
                                <input class="form-control form-control-sm" id="image" type="file">
                            </div>

                            <label>Выберите города</label>
                            <select class="form-select form-select-sm" multiple aria-label="multiple select example">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>

                            <div class="modal-footer align-items-center">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <ul class="list-group">
            @foreach($pageCities as $city)
                <a href="{{ route('city.reviews.index', $city->id) }}">
                    <li class="list-group-item">{{ $city->name }}</li>
                </a>
            @endforeach
        </ul>
        <div class="mt-3 mx-auto ">
            {{ $pageCities->links() }}
        </div>
    </div>
@endsection
