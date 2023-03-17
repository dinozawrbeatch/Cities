# 1. Чтобы подтвердить почту нужно изменить файл .env
````
MAIL_MAILER=вашsmtp
MAIL_HOST=хост
MAIL_PORT=порт
MAIL_USERNAME=имя
MAIL_PASSWORD=пароль
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="example@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
````
# 2. Я использовал сторонние пакеты для определения ip 
``composer install`` - в терминал, чтобы все пакеты подгрузились
# 3. В папке sql_dump в корне приложения, будет код для создания всех городов РФ
Сначала создайте все таблицы ```php artisan migrate```

Затем занесите код в папке в sql запрос
