<?php

namespace App\Http\Requests\API\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmissionValue172;
use InfyOm\Generator\Request\APIRequest;

class CreateDwSubmissionValue172APIRequest extends APIRequest
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
        return DwSubmissionValue172::$rules;
    }
}
