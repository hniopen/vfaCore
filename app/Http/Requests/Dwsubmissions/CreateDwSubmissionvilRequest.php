<?php

namespace App\Http\Requests\Dwsubmissions;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Dwsubmissions\DwSubmissionvil;

class CreateDwSubmissionvilRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return DwSubmissionvil::$rules;
    }
}
