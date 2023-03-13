<div>
    <p>Имя: {{ $user->fio }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Телефон: {{ $user->phone }}</p>
    <p>
        <a href="{{ route('reviews.user.index', $user->id) }}">
            Посмотреть все отзывы автора
        </a>
    </p>
</div>
