# <h1 align="center"> User Management Web Service - Training </h4> </h1>

## About

Project pada repository ini adalah berupa API endpoints yang terdiri dari 2 controller, yaitu AuthController dan UserController. Untuk AuthController, terdapat fitur register user, login user, get current logged in user information, refresh jwt token, dan logout user. Untuk UserController, terdapat get all user, get user by id, update user, dan delete user. API routes yang memanggil method yang ada di AuthController dapat diakses oleh role "admin" dan "customer", sedangkan API routes yang memanggil method yang ada di UserController hanya dapat diakses oleh role "admin".
Logic authentication memanfaatkan JWT dengan bantuan library tymon/jwt-auth, sedangkan untuk Role dan Permission dibuat dengan memanfaatkan library spatie/laravel-permission.

## Branching

-   `main` branch adalah branch utama yang digunakan untuk deploy ke production
-   `development` branch adalah branch yang digunakan untuk development

## Commit Message Convention (Semantic)

-   `feat`: (new feature for the user, not a new feature for build script)
-   `fix`: (bug fix for the user, not a fix to a build script)
-   `docs`: (changes to the documentation)
-   `style`: (formatting, missing semi colons, etc; no production code change)
-   `refactor`: (refactoring production code, eg. renaming a variable)
-   `test`: (adding missing tests, refactoring tests; no production code change)
-   `chore`: (updating grunt tasks etc; no production code change)

## How to Run Locally

1. Clone repository ini (branch `main`)
2. cd ke root folder
3. Buka folder project di Visual Studio Code (`code .` in CLI)
4. Buka terminal dan run `composer install`
5. Run 'php artisan migrate'
6. Run 'php artisan serve'
7. Buka browser dan akses`localhost:8000`

## Environment Variables

Sudah disediakan file `.env.example` yang dapat digunakan untuk membuat file `.env` yang berisi environtment variables yang dibutuhkan oleh aplikasi ini. Untuk menjalankan aplikasi ini, pastikan sudah mengisi environtment variables yang dibutuhkan.

## Postman API Collection

Postman API Collection Download Link : https://drive.google.com/file/d/1yMk9_rztFEmQ-IBUIXY13-PzHKKa1IF9/view?usp=sharing
