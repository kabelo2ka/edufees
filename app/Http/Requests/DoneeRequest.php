<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoneeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Don't allow user to create multiple Donee accounts
        if ($this->getMethod() === 'POST') {
            return ! auth()->user()->doneeProfile()->exists();
        }
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
            'id_number' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'province' => 'required',
        ];
    }
}
