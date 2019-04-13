<?php

namespace App\Http\Requests;

class SubmitCheckout extends Request
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
            'country' => 'required', //autofilled dropdown
            'city' => 'required',
            'postcode' => 'required|numeric|integer|digits:4',
            'adress' => 'required|max:255',
            'name' => 'required|max:255', //name is autofilled
            'phone' => 'required|numeric|digits:11',
            'email' => 'required|email|max:255', //email is autofilled
            'delivery' => 'required',
            'payment' => 'required', 
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
            'postcode.integer' => 'Por favor, introduzca un código postal válido',
            'phone.digits' => 'El número de teléfono debe tener 11 digitos',
            'phone.numeric' => 'Use sólo números',
        ];
    }
}
