<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $image = $this->method() == 'PATCH' ? 'sometimes|mimes:png,jpg,jpeg|file' : 'required|file|mimes:png,jpg,jpeg';
        return [
            'category_id' => 'required|integer',
            'name'        => 'required',
            'image'       => $image,
            'price'       => 'required',
            'description' => 'required',
            'stock'       => 'required',
            'slug'        => 'nullable',
        ];
    }

    public function messages()
    {
        return[
            'category_id.required' => 'Category name field is required'
        ];
    }
}
