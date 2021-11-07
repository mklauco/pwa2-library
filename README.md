## Blueprint from Exercise 1
Do this before the Exercise 2
1. `git pull`
2. `git checkout main-E1`
3. `composer install`
4. `php artisan migrate`

## Prerequisites
1. Install [Composer](http://getcomposer.org)
   * check if `composer -V` works in command line (PC restart may be required)
1. Install [NPM manager](https://nodejs.org/en/download/)
   * check if `npm version` works in command line (PC restart may be required)
   * Install yarn `npm install --global yarn`
   * Possibly run `Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy Unrestricted` if you are on Windows and working with PowerShell
1. (optional) Install [DBeaver](https://dbeaver.io/) application to comfortly view tables in database
## L-app initialization
1. `composer create-project laravel/laravel library`
1. setup database via phpmyadmin (InnoDB, utf8mb4_general_ci) and create a user for the database
1. Setup up the `.env`:
   1. Main app settings `APP_NAME` and `APP_URL` (if you have other then localhost)
   1. Setup database connection `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, cf. with phpmyadmin
   1. Verify that `SESSION_DRIVER=file`
   1. **After** setup run `php artisan key:generate`
1. Install Authentication library/package [Laravel UI](https://github.com/laravel/ui)
   1. `composer require laravel/ui`
   1. `php artisan ui bootstrap --auth`
   1. run `npm install && npm run dev` **twice**
1. Now you have your first Laravel application ready
   1. run `php artisan migrate` to create basic users table
   1. run `php artisan serve` to run the actual Lapp
   1. visit [http://127.0.0.1:8000/register](http://127.0.0.1:8000/register) to check if UI and AUTH are working and register a first user

## Initialize FREE CoreUI templating
1. Visit [CoreUI](https://coreui.io/demo/free/3.4.0/)
1. Visit [CoreUI templating](https://coreui.io/docs/layout/overview/)
1. Create templates (download from provided GIT):
   1. duplicate `resources/view/layouts/app.blade.ph` to `resources/view/layouts/app-coreui.blade.ph` and fit it with new UI template
   2. link free CoreUI style sheets with icon sets
   ```html
   <!-- CoreUI CSS -->
   <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.4.0/dist/css/coreui.min.css" crossorigin="anonymous">
       
   <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
   <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
   <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">
   ```
   3. link JS files
   ```html
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js" integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA==" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/@coreui/coreui@3.4.0/dist/js/coreui.min.js"></script>
   ```
   4. Create specific `resources/view/_sidebar.blade.php` just for the sidebar links
   5. Create specific `resources/view/_header.blade.php` just for the contents header (*NOT* the HML header, that is in the `app-coreui.blade.php`)

### Notes
* Alternatives to [Laravel UI](https://github.com/laravel/ui) are Laravel Breeze, Laravel JetStream, but they are more complex
* [Laravel UI](https://github.com/laravel/ui) provides simple AUTH logic, for more complex libraries visit Spatie/Permissions
----
## Git initialization
1. `git init`
1. `git remote add origin INSERT-YOUR-GIT-LINK`
1. `git branch -M main`
1. `git push -u origin main`