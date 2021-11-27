# Exercise 5 (2021-11-29)

## Loans MVC and Eloquent (exercise)
1. Prepare the view for all loans
   1. Display following fields in the table: *User name*, *Book Title*, *Loaned at*, *Returned at*, *Loan length*
   1. Use mutators to the `BookLoanItem` to achieve the previous task
   ```php
   public function printout(){
       return $this->hasOne(BookPrintout::class, 'id', 'book_printout_id');
   }

   public function loan(){
       return $this->hasOne(BookLoan::class, 'id', 'book_loan_id');
    }

   public function book(){
       return $this->hasOneThrough(
           Books::class,
           BookPrintout::class,
           'id',
           'id',
           'book_printout_id',
           'id'
       );
   }

   public function user(){
       return $this->hasOneThrough(
           User::class,
           BookLoan::class,
           'id',
           'id',
           'book_loan_id',
           'user_id'
       );
   }
   ```
1. Include a column in `loans/index` to display how long the book is loaned
   1. modify the `book_loan_items migration` with
   ```php
   $table->timestamp('returned_at')->nullable()->default(null);
   ```
   1. modify the `BookLoanItem factory`
   ```php
   $returned_at = $this->faker->dateTimeThisMonth();
   return [
      'book_printout_id' => rand(1, 20), // watch for BookPrintoutSeeder
      'book_loan_id' => rand(1, 15), // watch for BookLoanSeeder
      'returned_at' => $this->faker->randomElement([null, $returned_at]),
   ];
   ```
   1. hint, do not perform any mathematical operations in the blade
   1. you will need another array variable passed from the controller
1. Experiment with Query builder and access various information from database tables.
   1. include following code in the `loans/index` and fill "n/a" fields
   ```php
   <dl class="row">
      <dt class="col-sm-3">Date of earliest loaned book</dt>
      <dd class="col-sm-9">N/A</dd>

      <dt class="col-sm-3">Date of latest returned book</dt>
      <dd class="col-sm-9">N/A</dd>

      <dt class="col-sm-3">Book with the highest loan count:</dt>
      <dd class="col-sm-9">N/A</dd>

      <dt class="col-sm-3">User with the highest loan count:</dt>
      <dd class="col-sm-9">N/A</dd>

      <dt class="col-sm-3">Number of books with longer than 30-day return period:</dt>
      <dd class="col-sm-9">N/A</dd> 
   </dl>
   ```
   1. Play with sorting options
      1. Sort by `returned_at`
      1. Sort by `last_name`, you must rewrite the query and do it the hard-way with *join*

## Printouts MVC (exercise/repetition)
1. Expand the *Printouts* module with
   1. Create/Edit/Delete paths
      1. Add a blade template for dates (due to the `obtained_at` field, note that time is not really valid here)
      1. expand the validator array to check if the book_id actually is in the database
   1. Soft deletes
      1. run `php artisan make:migration add_soft_delete_book_printouts --table="book_printouts`
      1. add `use Illuminate\Database\Eloquent\SoftDeletes;`
      1. *Can we delete any printout at any time?*
      
## Loan MVC (homework)
1. Expand the *BookLoan* module with Create/Edit/Delete paths
   1. Hint: loan are made from printouts not from books

# Exercise 4 (2021-11-22)
## Advanced debugging environment (exercise work)
1. install [Debugbar](https://github.com/barryvdh/laravel-debugbar)
## Advanced debugging environment (homework work)
1. Include true/false `debug` field in `users`, 
   1. run `php artisan make:migration add_debug_to_users --table="users"`
   1. set the default value to `false` in migration
   1. update all associated views
   1. expand the template with tag value only for debug mode
   1. NOTE: this is not equal to user-rights
## Full database (exercise work)
A reminder to check [column modifiers in migrations](https://laravel.com/docs/8.x/migrations#available-column-types)

CoreUI template docs [LINK](https://coreui.io/docs/getting-started/introduction/)

Faker docs [LINK](https://fakerphp.github.io/formatters/)


1. Readers = Users 
   1. expand the `users` table with `php artisan make:migration add_data_to_users_table`
   1. update the migration file
   ```php
   $table->string('personal_number')->default(null)->nullable();
   $table->string('street')->default(null)->nullable();
   $table->string('street_number')->default(null)->nullable();
   $table->string('city')->default(null)->nullable();
   $table->string('zip')->default(null)->nullable();
   ```
   3. The factory `database/factories/UserFactory.php` 
   ```php
        $n = $this->faker->firstName();
        $l = $this->faker->lastName();
        return [
            'name'                => $n.' '.$l,
            'first_name'          => $n,
            'last_name'           => $l,
            'email'               => $this->faker->safeEmail(),
            'email_verified_at'   => now(),
            'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'      => Str::random(10),
            'personal_number'     => $this->faker->randomNumber(9, true),
            'street'              => $this->faker->streetName(),
            'street_number'       => $this->faker->buildingNumber(),
            'city'                => $this->faker->city(),
            'postcode'            => $this->faker->postcode(),
        ];
   ```
   4. Add Admin Seeder `database/seeders/UserAdminSeeder.php`
   ```php
        $faker = \Faker\Factory::create();
        DB::table('users')->insert([
            'name'                => 'Martin Klaučo',
            'first_name'          => 'Martin',
            'last_name'           => 'Klaučo',
            'email'               => 'martin.klauco@stuba.sk',
            'email_verified_at'   => now(),
            'password'            => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'      => Str::random(10),
            'personal_number'     => $faker->randomNumber(9, true),
            'street'              => $faker->streetName(),
            'street_number'       => $faker->buildingNumber(),
            'city'                => $faker->city(),
            'postcode'            => $faker->postcode(),
        ]);
   ```
   5. update the master seeder
   ```php
        $this->call(UserAdminSeeder::class);
        \App\Models\User::factory(10)->create();
        ...
   ```
1. create BookLoan MVC
   1. `php artisan make:model BookLoan -a` creates also the controller
   2. the migration
   ```php
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users');
      $table->timestamp('loaned_at');
      $table->timestamps();
   ```
   3. the factory
   ```php
        return [
            'user_id'   => rand(1, 10),
            'loaned_at' => $this->faker->dateTimeThisYear()
        ];
   ```
   4. the seeder, do not forget to add `use App\Models\BookLoan;` and then include `$this->call(BookLoanSeeder::class);` in the master seeder
   ```php
      BookLoan::factory(15)->create();
   ```
   5. `php artisan migrate:fresh; php artisan db:seed`
1. *Skip the BookLoanItem* (sk. Položka), we will make it as the last one
1. Create the BookPrintout MVC (sk. Exemplár)
   1. `php artisan make:model BookPrintout -a`
   1. fill the rest by yourself :)
   1. In `books/index.blade.php` include column showing total number of printouts of given book
      1. do it the hard-way with joins and
      2. do it the easy way with `hasMany()` method with *Eloquent*, update the `Books` model with (dig deeper into [Eloquent Relationships](https://laravel.com/docs/8.x/eloquent-relationships))
      ```php
      // Books hasMany printouts
      public function printouts(){
          return $this->hasMany(BookPrintout::class, 'book_id', 'id');
      }
      ```
      then in the controller use
      ```php
      $books = Books::with('printouts')->join('authors', 'books.author', '=', 'authors.id')->select([
      'books.*',
      'authors.first_name AS author_first_name',
      'authors.last_name AS last_first_name',
      ])->get(); // or use ->paginate(10)
      ```
      and in the blade use `$b->printouts->count()`.
   1. In `printouts/index.blade.php` show all printouts with book name
      1. update the *BookPrintout* model with
      ```php
         // Printout hasOne book
         public function book(){
            return $this->hasOne(Books::class, 'id', 'book_id');
         }
      ```
      and the blade with `$b->book->name`.

1. Create the BookLoanItem MVC (sk. Položka)
   1. fill the rest by yourself :)

## Paginator
1. `$books = Books::join(...)->paginate(10);`
1. run `php artisan vendor:publish --tag=laravel-pagination` to publish the view template
1. after the `</table>` tag insert `{{ $books->links('vendor.pagination.bootstrap-4') }}`

# Old portion of the readme
## Prerequisites
1. Install [Composer](http://getcomposer.org)
   * check if `composer -V` works in command line (PC restart may be required)
   * composer may run out of memory, consider setting `memory_limit=-1` in `php.ini`
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

## Books MVC
1. Create the BooksController `php artisan make:controller BooksController --resource`
1. Add the `Route::resource('books', App\Http\Controllers\BooksController::class);` to the route `web.php` and verify with `php artisan route:list`
   1. Setup `BooksController::index` with the `_sidebar` (duplicate `home.blade.php` to `books/index.blade.php`)
   1. Setup `{{ Request::is('books*') ? 'c-active' : '' }}` in anchor class
   1. Setup language file `resources/lang/en/books.php`
1. Setup the Model with migration `php artisan make:model Books -m` and open `database/*_create_books_table.php`; fields: `['name', 'description', 'genre', 'author']`
   * run `php artisan migrate` to create the table in DB
1. Before creating html forms install [HTML helper](https://laravelcollective.com/docs/6.x/html)
   * Install `composer require laravelcollective/html` , if composer runs out of memory set `memory_limit=-1` in `php.ini`
   * During deploying on server run `composer install` **never run** `composer update` (!) it may disrupt the dependencies
1. Create your first form `books/create.balde.php`, that is linked from the `books/index`.
1. Form field are included via `laravelcollective/html` package (it is optional but recommended)
   1. Sample of the form (used in `books/create.blade.php`)
   ```php
   {!! Form::open(array('route' => 'books.store')) !!}
   {{ Form::label('name', __('books.name')) }}:
   {{ Form::text('name', '', ['class' => 'form-control']) }}
   {{ Form::submit('Submit', array('class' => 'btn btn-sm btn-primary')) }}
   {!! Form::close() !!}
   ```
1. Secure form handling:
   1. To securely handle form include in `<head>` CSRF token generator `<meta name="csrf-token" content="{{ csrf_token() }}">`
   1. Visit [Validation rules](https://laravel.com/docs/8.x/validation#available-validation-rules)
   1. Test the error bags `@if($errors->has('description')) .. @endif`
   1. In `BooksController.store` insert 
   ```php
   $v = [
      'name'          => 'required',
      'genre'         => 'required',
      'description'   => 'required',
      'author'        => 'required',
    ];
    $validated = $request->validate($v);
    
    Books::create($request->all());
    return redirect('books'); // redirect to general controller path is crucial after Store/Update paths
   ```
   1. In `App\Models\Books` insert fillable: `protected $fillable = ['name', 'description', 'genre', 'author'];`
1. Prepare table view of all books.
1. Add Session flashes
   1. Add `use Session` in controller.
   1. Add `Session::flash('success', __('books.saved'));` just before `return`. 
   1. Add session viewer in `app-coreui.blade`, specifically
   ```php
   @if (Session::has('success'))
     <div class="alert alert-success" role="alert">{!! Session::get('success') !!}</div>
   @endif
   ```
1. Add Edit path:
   1. Include edit link in the `books/index.blade.php` using `laravelcollective/html` method, namely:
   ```php
   {!! Html::linkRoute('books.edit', __('books.edit'), ['book' => $b->id], array('class' => 'theme-color' )) !!}
   ```
   watch-out for the `'book' => $b->id`, which specify which book you want to edit.
   1. Continue in `public function edit($id)` and prepare and edit form
      1. duplicate `books/create.blade.php` and create `edit.blade.php`
      1. Change the form opening to:
      ```php
      {!! Form::model($books, ['route' => ['books.update', $books->id], 'method' => 'PUT']) !!}
      ```
      1. include `$book->*FIELD*` as form values
1. Fill the `lang/en/books` file
1. Add delete method
   1. Deletes are accessed via forms:
   ```php
   {!! Form::open(array('route' => ['books.destroy', $b->id], 'method'=>'DELETE')) !!}
   {!! Form::submit(__('books.delete'), array('class' => 'btn btn-danger btn-ghost-danger my-0 py-0', 'onclick' => 'return confirm("You are about to delete the book.")' ))!!}
   {!! Form::close() !!}
   ```
   1. In `BooksController/destroy` add `Books::find($id)->delete();` note, that such a method permanently deletes the record from db.
   1. Add soft-delete feature to the `Books` model
      1. visit [Soft deletes](https://laravel.com/docs/8.x/eloquent#soft-deleting)
      1. include `use SoftDeletes;` in the class and `use Illuminate\Database\Eloquent\SoftDeletes;` in definition of  the `Books` model
      1. add soft-delete to `books` table
      1. run `php artisan make:migration add_soft_delete_books --table=books`
      1. include
      ```php
         Schema::table('books', function (Blueprint $table) {
            $table->softDeletes();
         });

         Schema::table('books', function (Blueprint $table) {
            $table->dropSoftDeletes();
         });
      ```
## From templating
1. Create form templates with error bags
   1. create folder `templates` in `resources/view`
   2. Prepare the template with fields `space` and `tag`

## Users MVC (homework)
1. Model `User` already exists (is created by `laravel/ui` package)
1. run `php artisan make:controller UsersController --resource`
1. include route `Route::resource('users', App\Http\Controllers\UsersController::class);`
1. update the `_sidebar.blade.php` file
1. copy *index* and *create* views from `views/books` to `views/users`
   1. merge edit and create into one blade file
   1. in `UsersController/create` and `UsersController/edit` pass variable to distinguish create/edit
1. In `UsersController/store`
   1. in validation include `'email' => 'required|email|unique:App\Models\User,email'`
   1. Passwords are created as `Hash::make('password')`
1. In `UsersController/update`
   1. exclude updateable profile from unique `'email' => ['required', Rule::unique('users')->ignore($id)]`
   1. Use save method to update everything except email address
   ```php
      $u = User::find($id);
      $u->name = $request['name'];
      $u->save();
    ```
## Users MVC (exercise work)
1. Include *last login field* and *user IP address* visit [Add login time](https://laraveldaily.com/save-users-last-login-time-ip-address/)
   1. run `php artisan make:migration add_login_fields_to_users_table --table="books"`
   1. expand the users table, don't forget to include `dropColumn` methods
   1. include `use Illuminate\Http\Request; use Carbon\Carbon;` in `LoginController` and include a method
   ```php
    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp()
        ]);
    }
   ```
   1. update the `index.blade.php` to see the results, note, that *null/empty* date results in actual time if using the `Carbon::parse()` method
1. add logout route to view, check the logout implementation in `views/layouts/app.blade.php` and copy necessary lines to `views/_header.blade.php`
   1. modify `views/auth/login.blade.php` according to [CoreUI 3.4.0 login](https://coreui.io/demo/free/3.4.0/login.html)
   1. it is recommended to create layout for login page i.e. in `views/layouts/app-login-coreui.blade`
1. Expand the `User` model with `first_name` and `last_name` and make changes to appropriate views
   1. run `php artisan make:migration add_name_fields_to_users_table --table="users"`
   1. don;t forget to update fillable in `Models\User`
1. Modify routes to include middleware-auth to access user data in blade
   1. update `web.php`
   ```php
   Route::middleware(['auth'])->group(function () {
      // all authentificated routes
   });
   ```
   1. include `{{ (Auth::user()->first_name) }}&nbsp;{{ (Auth::user()->last_name) }}` in `_header`.

## Authors MVC (exercise/homework)
1. Create a model with [migrations](https://laravel.com/docs/8.x/migrations), [factories](https://laravel.com/docs/8.x/database-testing#defining-model-factories) and [seeders](https://laravel.com/docs/8.x/seeding)
   1. run `php artisan make:model Authors -mfs` it will create new files in all subfolders of `database` folder
   1. run `php artisan migrate`
   1. Prepare the factory check the tool [PHP Faker](https://fakerphp.github.io/) and run `composer require fakerphp/faker`
   ```php
        return [
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
        ];
   ```
   1. prepare seeder (number 10 creates 10 random entries in DB)
   ```php
   use App\Models\Authors;
    public function run()
    {
      Authors::where('id', '>', 0)->delete();
      Authors::factory(10)->create();
    }
   ```
1. prepare seeder run `php artisan db:seed --class=AuthorsSeeder`
1. run `php artisan make:controller AuthorsController --resource`
   1. create route `authors`
   1. prepare all views and store/update methods
   1. insert soft-delete feature `php artisan make:migration add_soft_delete_authors --table="authors"`
1. include `id` column in `index.blade.php` view

## BooksController (exercise)
1. Expand store/update methods in the `BooksController` with failure session notice, e.g.,
```php
    try {
      Books::create($request->all());
      Session::flash('success', __('books.saved'));
      return redirect('books');
    } catch (\Exception $e) {
      Session::flash('failure', $e->getMessage());
      return redirect()->back()->withInput();
    }
```
Note, the need for such notification will be used later in the exercise.
1. Update the `Books::all()` view with the join with authors to see the author name in `books/index.blade.php`
```php
$books = Books::join('authors', 'books.author', '=', 'authors.id')->get();
```
1. Note, that *edit* method will not work due to ambiguous `id` field after join. Modify the `join` as follows
```php
$books = Books::join('authors', 'books.author', '=', 'authors.id')->select(['books.*', 'authors.first_name AS author_first_name', 'authors.last_name AS last_first_name'])->get();
```
1. add relation between books table and authors table `php artisan make:migration add_author_id_to_books --table="books"` to do that, install `composer require doctrine/dbal`
```php
   use Illuminate\Support\Facades\DB;
   public function up()
   {
      DB::table('books')->delete(); // books table needs to be clear prior to foreig key addition!
      Schema::table('books', function (Blueprint $table) {
          $table->bigInteger('author')->unsigned()->change();
          $table->foreign('author')->references('id')->on('authors')->onDelete('cascade');
      });
   }
   public function down()
   {
      Schema::table('books', function (Blueprint $table) {
          $table->dropForeign(['author']);
      });
   }
```
In the method `dropForeign` are the brackets important.
1. Create `form-select.blade.php` input template for list of authors. Prepare author list in `Controller`
```php
<div class="form-group">
  {{ Form::label($tag, __($space.'.'.$tag)) }}:
  @if($errors->has($tag))
  {{ Form::select($tag, $list ?? ['0' => '0'], $$space[$tag] ?? '', ['class' => 'form-control is-invalid']) }}
  @error($tag)
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  @else
  {{ Form::select($tag, $list ?? ['0' => '0'], $$space[$tag] ?? '', ['class' => 'form-control']) }}
  @endif
</div>
```
1. create factory and seeder for books
   1. run `php artisan make:factory BooksFactory`
   ```php
      return [
         'name'          => implode($this->faker->words(3), ' '),
         'description'   => implode($this->faker->words(10), ' '),
         'genre'         => $this->faker->randomElement(['novel', 'drama', 'documentary']),
         'author'        => rand(1, 15), // must coincide with number of authors
      ];
   ```
   1. run `php artisan make:seeder BooksSeeder`, include `use App\Models\Books;`
   ```php
        Books::where('id', '>', 0)->delete();
        Books::factory(40)->create();
   ```
   1. Update the `DatabaseSeeder` with
   ```php
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AuthorsSeeder::class);
        $this->call(BooksSeeder::class);
    }
   ```
   1. run `php artisan db:seed` to seed the database with fresh data




## prettify the look
1. favicon generator: https://www.favicon-generator.org/





### Notes
* Alternatives to [Laravel UI](https://github.com/laravel/ui) are Laravel Breeze, Laravel JetStream, but they are more complex
* [Laravel UI](https://github.com/laravel/ui) provides simple AUTH logic, for more complex libraries visit Spatie/Permissions
----
## Git initialization
1. `git init`
1. `git remote add origin INSERT-YOUR-GIT-LINK`
1. `git branch -M main`
1. `git push -u origin main`