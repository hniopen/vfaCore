# Generator instruction

## Basic
We use infyom generator, based on laravel generator

### Command
```bash
php artisan infyom:api_scaffold {your model name} --prefix='{your name spance}' [more options here] --fieldsFile={path to json file}
```


## Resources
### Infyom Resources
http://labs.infyom.com/laravelgenerator/docs/5.5/relationships
http://labs.infyom.com/laravelgenerator/docs/5.5/generator-options
http://labs.infyom.com/laravelgenerator/docs/5.5/fields-input-guide

### Laravel resources
https://github.com/laracasts/Laravel-5-Generators-Extended
https://laravel.com/docs/5.5/eloquent-relationships
laravel column type for dbType : https://laravel.com/docs/5.5/migrations#columns
larave  l validation : https://laravel.com/docs/5.5/validation

### Samples
* Model creation
```bash
php artisan infyom:api_scaffold DwEntityType --prefix='dwsync' --datatables=false --skip=api_controller,api_routes --fieldsFile=resources/model_schemas/DwEntityType.json
```
* Dw Submission models
Take only : routes,migration,mode,menu,dump-autoload 

Creation :
```bash
php artisan infyom:api_scaffold DwSubmissionX --prefix='dwsubmissions' --datatables=true --skip=api_controller,api_routes,tests --views=index,show --fieldsFile=resources/model_schemas/DwSubmission_x.json
php artisan infyom:api_scaffold DwSubmissionValueX --prefix='dwsubmissions' --datatables=true --skip=api_controller,api_routes,tests --views=index,show --fieldsFile=resources/model_schemas/DwSubmissionValue_x.json
```

Rollback : 
```bash
php artisan infyom:rollback DwSubmissionX api_scaffold --prefix='dwsubmissions'
php artisan infyom:rollback DwSubmissionValueX api_scaffold --prefix='dwsubmissions'
```

### Remarks
* add `public $timestamps = false;` into model if you don't use timpestamps


## Deployment
* dynamic files : dynamic_menu, dynamic_web, dynamic_api