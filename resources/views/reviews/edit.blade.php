@extends('layouts.main')
@section('content')
    <h1 class="text-center">Изменить отзыв</h1>
    <form action="{{ route('review.update', $review->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="title">Заголовок</label>
            <i class="fas fa-user prefix grey-text"></i>
            <input type="text" name="title" id="title" class="form-control validate" value="{{ $review->title }}">
        </div>

        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="md-form mb-5">
            <label data-error="wrong" data-success="right" for="text">Отзыв</label>
            <i class="fas fa-envelope prefix grey-text"></i>
            <textarea class="form-control" id="text" name="text" rows="3">{{ $review->text }}</textarea>
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
            <input class="form-control form-control-sm" id="image" value="{{ $review->image }}" name="image"
                   type="file">
        </div>

        <label>Выберите города</label>
        <select class="select2" name="city_ids[]" multiple="multiple"
                data-placeholder="Города"
                style="width: 100%;">
            @foreach($cities as $city)
                <option
                    {{ is_array($review->cities->pluck('id')->toArray()) && in_array($city->id, $review->cities->pluck('id')->toArray()) ? ' selected' : '' }}
                    value="{{$city->id}}">{{$city->name}}
                </option>
            @endforeach
        </select>

        <div class="my-2">
            <button id="updateBtn" type="submit" class="btn btn-primary">Обновить</button>
        </div>
        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
    </form>
@endsection
