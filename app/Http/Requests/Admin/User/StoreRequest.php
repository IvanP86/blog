<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Имя должно быть строкой', 
            'email.required' => 'Это поле обязательно для заполнения',
            'email.string' => 'email должен быть строкой',
            'email.email' => 'Email должен быть формата name@some.domain',
            'email.unique' => 'Email должен быть уникальным',
            'password.required' => 'Это поле обязательно для заполнения',
            'password.string' => 'Пароль должен быть строкой'
        ];
    }    
}
