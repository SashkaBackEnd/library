<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Тестовое задание</h1>
    <br>
</p>



### Install with Docker

Update your vendor packages

    docker-compose run --rm php composer update --prefer-dist
    
Run the installation triggers (creating cookie validation code)

    docker-compose run --rm php composer install    

Run the migration

    docker-compose run --rm php yii migrate  
    
Start the container

    docker-compose up -d


    
You can then access the application through the following URL:

http://127.0.0.1:8000

<h2>Примеры запросов</h3>


<b>POST /readers</b>
{
    "full_name": 'Иванов Иван Иванович'
}
<p>Добавить  читателей</p>

<br>

<b>POST /books</b>
{
    "name": 'Триумфальная арка',
    "description": "«Триумфа́льная а́рка» — роман немецкого писателя Эриха Марии Ремарка, впервые опубликованный в США в 1945 году; немецкое издание вышло в 1946."
}
<p>Добавить книгу</p>

<br>

<b>POST /book-reader</b>
{
    "readers_id": 2,
    "books_id": 1,
    "duration": 60
}
<p>У книги должна быть возможность передачу её на чтения и возврат. Во время передачи на чтение надо указывать читателя,  дату выдачи и количество дней на который выдается книга. </p>

<br>

<b>GET /books</b>
<b>GET readers</b>
<p>Надо иметь возможность просматривать списки всех читателей и книг. Список читателей содержит Id фио поиск только  по части или по полному фио. Список книг имеет информацию id название книги поиск по  части или по полному названию книги.</p>

<br>

<b>GET readers/{id}</b>
<p>В подробной странице читателя кроме основной информации о читателе (id и ФИО)  надо иметь информацию о каждой книге которая находится у читателя информация о книге где  также должна следующая быть информация название книги, дату выдачи, дату возврата.</p>

<br>

<b>GET books/{id}</b>
<p>В подробной странице книги надо содержать информацию о книге (id, название книги). А так же если книга передана кому либо на чтение  читатель книги дату выдачи и дата возврата. </p>

P.S. Не выносил в модули и не делал авторизацию из-за нехватки времени