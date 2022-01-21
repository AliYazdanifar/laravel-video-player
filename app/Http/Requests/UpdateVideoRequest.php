<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateVideoRequest extends StoreVideoRequest
{

    public function rules()
    {
        return array_merge(parent::rules(), [
            'slug' => ['required', Rule::unique('videos')->ignore($this->video), 'alpha_dash']
        ]);
    }
}
