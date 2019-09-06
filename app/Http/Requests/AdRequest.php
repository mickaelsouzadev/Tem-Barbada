<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Insira um título para a barbada',
            'description.required' => 'Insira uma descrição para a barbada',
            'start_date.required' => 'Insira uma data inicial',
            'end_date.required' => 'Insira uma data final'
        ];
    }
}
