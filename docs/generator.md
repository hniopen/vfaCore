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

## Update model
* Create migration, kind of `php artisan make:migration add_longQuestCode_to_dw_projects --table="dw_projects"`
* Update schema in the migration file `database\migrations\`
```php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLongQuestCodeToDwProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dw_projects', function (Blueprint $table) {
            $table->string('longQuestCode', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dw_projects', function (Blueprint $table) {
            $table->dropColumn('longQuestCode');
        });
    }
}
```
* migrate `php artisan migrate`
* update Model property, add `@property string longQuestCode`
* for generated model (using infyom) :
    * update Model property : `$fillable`, `$casts`,`$rules`
    * update corresponding views if needed (edit, show, ...)
  
### Remarks
* add `public $timestamps = false;` into model if you don't use timpestamps


## Deployment
* dynamic files : dynamic_menu, dynamic_web, dynamic_api