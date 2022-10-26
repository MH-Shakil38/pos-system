<?php

namespace App\Http\Requests\configuration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        return [
            'image'=>'mimes:png,jpg,jpeg,mp4',
            'parent_id'=>'nullable',
            'description'=>'nullable',
        ];
    }
    public function messages(){
        return [
            'name.unique' => 'Plese try another Category Name',
            'name.required' =>'category Name Not be empty',
        ];
    }
}
