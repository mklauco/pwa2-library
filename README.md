## Prerequisites
1. Install [Composer](http://getcomposer.org)
   * check if `composer -V` works in command line (PC restart may be required)
1. Install [NPM manager](https://nodejs.org/en/download/)
   * check if `npm version` works in command line (PC restart may be required)
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
1. Create templates:
   1. duplicate `layouts/app.blade` to `layouts/app-coreui.blade`

### Notes
* Alternatives to [Laravel UI](https://github.com/laravel/ui) are Laravel Breeze, Laravel JetStream, but they are more complex
* [Laravel UI](https://github.com/laravel/ui) provides simple AUTH logic, for more complex libraries visit Spatie/Permissions
----
## Git initialization
1. `git init`
1. `git remote add origin INSERT-YOUR-GIT-LINK`
1. `git branch -M main`
1. `git push -u origin main`