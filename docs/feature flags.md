# Feature flags (feature toggle)

## Default seed
To load default flags, run `php artisan db:seed --class="DefaultFeaturesFlagSeed"`. 

## Back-office
You can use the back-office to add new flag `/admin/feature_flags`. Then insert some control in source code, such as :
* In a blade template:
```
@can('feature-flag', 'add-twitter-field')
<!-- code here -->
@endcan
```
* Or in PHP:
```
if (Gate::allows('feature-flag', 'my-feature1')) {
    <!-- code here -->
}

if (Gate::denies('feature-flag', 'my-feature2')) {
    <!-- code here -->
}
```

Note : the tag **'feature-flag'** should be put as 1st parameter, then your features-ID.

For more info, visit [the repo](https://github.com/alfred-nutile-inc/laravel-feature-flag)