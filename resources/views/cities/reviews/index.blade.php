@extends('layouts.main')
@section('content')
    <h1>Отзывы о городе {{ $city->name }}</h1>
    <div class="container">
        <div class="modal fade" id="createReview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Выберите город</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="get">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <div class="modal-footer align-items-center">
                                <button type="button" class="btn btn-primary btn-close">Выбрать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <ul class="list-group">
            @foreach($cities as $city)
                <a href="{{ route('review.show', $city->id) }}">
                    <li class="list-group-item">{{ $city->name }}</li>
                </a>
            @endforeach
        </ul>
        <div class="mx-auto ">
            {{ $cities->links() }}
        </div>
    </div>
@endsection
