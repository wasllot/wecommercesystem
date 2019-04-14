<?php

namespace App\Http\Requests;

class SubmitProduct extends Request
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
            // 'color' => 'required',
            // 'size' => 'required',
            'qty' => 'required|numeric|integer|max:20',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'color.required' => 'You must select a color',
            // 'size.required'  => 'You must select a size',
            'qty.numeric'  => 'La cantidad debe ser un número',
            'qty.integer'  => 'Ingrese una cantidad válida',
            'qty.max'  => 'Max avalible quantity 20',
        ];
    }
}
