<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id'=> 'required|exists:categories,id',
            'tag_ids'=> 'nullable|array',
            'tag_ids.*'=> 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны быть строчным типом',
            'content.required' => 'Это поле необходимо для заполнения',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.file' => 'Нужно выбрать файл',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.file' => 'Нужно выбрать файл',            
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'Данные могут быть только числом',
            'category_id.exists' => 'Id категории должен существовать в таблице',
            'tag_ids.array' => 'Необходимо отправить массив данных',

        ];
    }    
}
