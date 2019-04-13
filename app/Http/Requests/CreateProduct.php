<?php

namespace App\Http\Requests;

class CreateProduct extends Request
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
        return [
            'slug' => 'required',
            'name' => 'required',
            'description' => 'required',
            'brand_id' => 'required',
            'cat_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ];
    }
}
