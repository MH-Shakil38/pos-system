<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConfigurationRequest extends FormRequest
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
     * @param $request
     * @return array<string, mixed>
     */
    public function rules()
    {
        $data = $this->request->all();
        if (isset($data['parent_id'])){
            return [
                'name'=>['required',Rule::unique('categories')->where('parent_id',$data['parent_id'])],
                'thumbnail' => 'image|mimes:jpg,jpeg,png,svg',
                'parent_id'=>'nullable',
                'description'=>'nullable',
            ];
        }else{
            return [
                'name'=>'required',
                'thumbnail' => 'image|mimes:jpg,jpeg,png,svg',
                'description'=>'nullable',
            ];
        }
    }
    public function messages(){
        return [
            'name.unique' => 'Plese try another Category Name',
            'name.required' =>'Enter a category Name',
        ];
    }

}
