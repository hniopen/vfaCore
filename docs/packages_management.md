# Packages management

## Basis
http://laraveldaily.com/how-to-create-a-laravel-5-package-in-10-easy-steps/
http://kaltencoder.com/2015/07/laravel-5-package-creation-tutorial-part-1/
https://laravel.com/docs/5.5/packages
https://devdojo.com/blog/tutorials/how-to-create-a-laravel-package

## Summary
1. create your package in packages/{vendor}/{package name} …
2. composer init
3. dump-autoload
4. Create & register providers
5. include route in boot 

If route is not found, clear config then check `php artisan config:cache`

Use this for fast generation :[package tempalte Laravel](https://github.com/cviebrock/laravel5-package-template)

## Advanced
* [send to packagist](http://blog.jgrossi.com/2013/creating-your-first-composer-packagist-package/)
* [Multi repo tracking with jbrains IDE](https://intellij-support.jetbrains.com/hc/en-us/community/posts/207052265-Multiple-git-repositories)

## Route issues
* if you need Auth, put your route inside auth middleware, like:
```yaml
Route::group(['middleware' => ['auth', 'roles'], 'roles'=>'administrator', 'prefix' => 'dwsync', 'as' => 'dwsync.'], function () {
 ... your routes ...
});
```
* if you are redirected to unwanted page, use web middleware, such as:
```yaml
Route::group(['middleware' => 'web'], function () {
... your routes or groups ...
});
```