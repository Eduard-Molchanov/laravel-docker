<p align="center">
    <a href="https://bitbucket.org/eduard-molchanov/sogasie/src/master/" target="_blank">

![screenshot of sample](resources/readme-img/logo.png)
    </a>
</p>



## Поднятие Laravel в docker



- >Склонируйте  [репозиторий](https://bitbucket.org/eduard-molchanov/sogasie/src/master/).
- >Откройте катлог с клоном в терминале.
- >выполните команду **composer update**.
- >переименуйте файл **.env.example** в **.env**
- >установите в файле **.env** следующие значения:

<p align="center">DB_HOST=mysql</p>

<p align="center">DB_DATABASE=sogasie</p>

<p align="center">DB_PASSWORD=root</p>


- >выполните команду **php artisan key:generate**
- >выполните команду **docker-compose build**
- >выполните команду **docker-compose up -d**
- >выполните коанду **docker ps**
- > должно получиться примерно так:
  ![screenshot of sample](docker/ps.jpg)

- >в файле **hosts**  C:\Windows\System32\drivers\etc добавить запись   **127.0.0.1 sogasie.test**
- >в браузере перейдите по адресу [http://sogasie.test](http://sogasie.test/)
- > должно получиться  так:
  ![screenshot of sample](resources/readme-img/sog.jpg)


## Добавление администратора в систему

- > добавить вручную в колонку **role** таблицы  **roles**  значения:
  > admin
  > user
  > guest
  > system
  
- >выполните команду **php artisan db:seed --class=UserSeeder**
- >выберите в таблице **users** пользователя со значением **roles_id** соответствующего администратору 
- >в верхнем меню сайта выберите **Обновить пароль** и смените пароль для выбранного вами пользователя
