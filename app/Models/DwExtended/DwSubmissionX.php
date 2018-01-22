<?php

namespace App\Models\DwExtended;

use App\Models\Dwsubmissions\DwSubmissionX as DwParent;
/*
 * To create an extended DwSubmission like this:
 * - if X=quest_code, run : php artisan make:model App\\Models\\DwExtended\\DwSubmissionX
 * - In generated file, change `use Illuminate\Database\Eloquent\Model;` to `use App\Models\Dwsubmissions\DwSubmissionX as DwParent;` and `extends Model` to `extends DwParent`
 * That will automatically use the extended model when we can on `$this->submissionClass::`
 */
class DwSubmissionX extends DwParent
{
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            //$model = current submission
//            dd($model);
            $x = $model->id;
            $a = 2;
        });
    }
}
