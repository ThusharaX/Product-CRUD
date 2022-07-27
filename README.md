<h1>How to Run this project</h1>

## **Steps to run Laravel Application**

## Step 1:

```
$ git clone https://github.com/ThusharaX/Product-CRUD.git

$ cd Product-CRUD/Laravel-Product-CRUD
```

## Step 2:

* ### Copy .env.example file to .env on the "Laravel-Product-CRUD" folder. You can type copy .env.example .env if using command prompt Windows

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


* ### Open your browser and type *http://localhost:8000/* OR *http://127.0.0.1:8000/*

<hr/>

## **Steps to run NUXT Application**

## Step 1:

* ### Run Laravel-Product-CRUD Application

## Step 2:

```
$ cd Product-CRUD/Nuxt-Product-View

$ yarn install

$ yarn dev
```

* ### Open your browser and type *http://localhost:3000/* OR *http://127.0.0.1:3000/*


## Laravel-Product-CRUD Screenshots :

![image](https://user-images.githubusercontent.com/47711719/181063620-28453d4d-e381-4439-b212-931928b035db.png)

![image](https://user-images.githubusercontent.com/47711719/181063667-12f3b19c-4519-41c5-83e0-60f65bd5ee1a.png)

![image](https://user-images.githubusercontent.com/47711719/181063702-b9bf62fa-f417-4341-9a31-0045abc01272.png)

## Nuxt-Product-View Screenshots :

![image](https://user-images.githubusercontent.com/47711719/181209442-4bdf37e1-4f68-42aa-9bad-0c89f40da839.png)
