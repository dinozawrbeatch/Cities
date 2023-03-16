@extends('layouts.main')
@section('content')
    <h1>Welcome page</h1>
    @if($location)
    <div class="modal fade" id="questionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Заголовок модального окна</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                        Ваш город - {{ $location->cityName }}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-dismiss="modal"
                            data-bs-target="#citySelector">
                        Нет, выбрать другой
                    </button>
                    <button type="button" class="btn btn-primary">Да</button>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="modal fade" id="citySelector" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Выберите город</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <form id="form_id" method="get">
                        <select class="form-select form-select-sm" id="selected_city" name="selected_city" aria-label=".form-select-sm example">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <div class="modal-footer align-items-center">
                            <button type="submit" id="choose_city" class="btn btn-primary">Выбрать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    <script src="{{ asset('assets/js/welcomePage.js') }}"></script>
@endsection
