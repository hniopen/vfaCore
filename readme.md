# Viamo Foundation App - Core

## Requirements
* PHP >= **7.0**
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

## Setting up the app.
### Php version management
**In case you deal with php version conflicts** (if not, don't mind, jump to next step), you can use :
* Virtphp and phpbrew
    * first, follow the [installion of virtphp and phpbrew](https://www.sitepoint.com/use-phpbrew-virtphp/)
    * create virt env:  `virtphp create {your env}`
    * activate env :  `source /home/ubuntu/.virtphp/envs/{your env}/bin/activate`
    * use the right php version : `phpbrew use php-x.x.xx`
* or another alternative like Docker
    
### Initial set up
1. Make sure you have access to the private repo `https://github.com/hnidev/vfaCore`, then clone it
2. Copy `.env.example` file to `.env` and set your DB there
3. Run `composer install`
4. Run `php artisan key:generate`
5. Run `php artisan migrate --seed` #init the default URR for example.
In case you need a refresh, use `php artisan migrate:refresh --seed`

### Mail set up
* In .env, set the {mail setting}, e.g:
```bash
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME={your mail id}
MAIL_PASSWORD={you pwd}
MAIL_ENCRYPTION=tls
```
* In .env, the APP_URL (e.g. : `APP_URL=http://54.163.254.249:8050/`)

## Serve the app
### Local server
```bash
php artisan serve --port=XXXX
```
### Remote server (case of our current EC2)
* Free the port from external access (ask our administrator)
* Serve : use `nohup cmd &` if you want  to not interrupt when leaving your terminal). 
* [#] Make sure you are in the right **virt env** and the right **php version** if you use _virtphp_.
```bash
source ~/.virtphp/envs/{your env}/bin/activate #Opational if you don't use virtphp
phpbrew use php-x.x.xx #Opational if you don't use virtphp
nohup php artisan serve --host=0.0.0.0 {--port=XXXX} &
```
## Test you app ;)
* 1st administrator : 
    * name : `Admin`
    * mail : `tobechanged@gmail.com` (please change this to working one)
    * ***REMOVED***

## Serve the app
### Local server
```bash
php artisan serve --port=XXXX
```
### Remote server (case of our current EC2)
* Free the port from external access (ask our administrator)
* Serve : use `nohup cmd &` if you want  to not interrupt when leaving your terminal). Make sure you are in the right **virt env** and the right **php version** if you use _virtphp_.
```bash
source ~/.virtphp/envs/{your env}/bin/activate #Opational if you don't use virtphp
phpbrew use php-x.x.xx #Opational if you don't use virtphp
nohup php artisan serve --host=0.0.0.0 {--port=XXXX} &
```
## Test you app ;)
* 1st administrator : 
    * name : `admin`
    * mail : `tobechanged@gmail.com` (please change this to working one)
    * ***REMOVED***

## Using ACL 
1. Create some roles.
2. Create some permissions.
3. Give permission(s) to a role.
4. Create user(s) with role.
5. For checking authenticated user's role see below:
    ```php
    // Add roles middleware in app/Http/Kernel.php
    protected $routeMiddleware = [
        ...
        'roles' => \App\Http\Middleware\CheckRole::class,
    ];
    ```

    ```php
    // Check role anywhere
    if(Auth::check() && Auth::user()->hasRole('admin')) {
        // Do admin stuff here
    } else {
        // Do nothing
    }

    // Check role in route middleware
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
       Route::get('/', ['uses' => 'AdminController@index']);
    });
    ```
6. For checking permissions see below:
    ```php
    if($user->can('permission-name')) {
        // Do something
    }
    ```

The current use ACL based on [Spatie Laravel-permission package](https://github.com/spatie/laravel-permission) which is build on top of [Laravel Authorization](https://laravel.com/docs/5.3/authorization)
You can create more roles/permissions/users, and then use them in your code, by using functionality like `Gate` or `@can`, as in default Laravel, or with help of Spatie's package methods.

## Another dependencies
* The admin panel uses [AdminLTE theme](https://adminlte.io/) and [Datatables.net](https://datatables.net).

