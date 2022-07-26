# How to Run this project

## Step 1:

```
$ git clone https://github.com/ThusharaX/Laravel-Product-CRUD.git

$ cd Laravel-Product-CRUD
```

## Step 2:

* ### Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows

* ### Open XAMPP and start Apache server and MySQL server

* ### Open phpMyAdmin and create a database called "product_db"

*  ### Open your .env file and change the database name (DB_DATABASE) to "product_db"

## Step 3:

```
$ composer install

$ php artisan key:generate

$ php artisan migrate

$ php artisan db:seed

$ npm install

$ npm run dev
```

* ### Open another terminal and type "php artisan serve"

```
$ php artisan serve
```


* ### Open your browser and type localhost:8000 OR 127.0.0.1:8000

## Screenshots :

![image](https://user-images.githubusercontent.com/47711719/181063620-28453d4d-e381-4439-b212-931928b035db.png)

![image](https://user-images.githubusercontent.com/47711719/181063667-12f3b19c-4519-41c5-83e0-60f65bd5ee1a.png)

![image](https://user-images.githubusercontent.com/47711719/181063702-b9bf62fa-f417-4341-9a31-0045abc01272.png)
