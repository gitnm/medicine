# Medicine Api
# Use Docker
1) Create .env to start Docker
   - cp src/.env.example src/.env

2) Pull containers 
   - docker-compose up --build

3) Create DataBase
   - http://127.0.0.1:6080/ 
   - DB_USERNAME and DB_PASSWORD see .env
   - CREATE DATABASE `laravel` COLLATE 'utf8_unicode_ci';

4) Migrations and Seeds
   - docker-compose exec web bash
   - php artisan migrate:install
   - php artisan migrate 
   - php artisan db:seed

5) Use Api
   - http://127.0.0.1:8080/public/api
   - JWT_TOKEN see .env
