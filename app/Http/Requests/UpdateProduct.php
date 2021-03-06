<?php

namespace App\Http\Requests;

class UpdateProduct extends Request
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
            'name'          => 'required|min:1',
            'description'   => 'required|min:1',
            'price'         => 'required|numeric',
            'image'         => 'sometimes|image'
        ];
    }
}
