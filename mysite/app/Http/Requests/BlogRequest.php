<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'topic' => 'required|max:50',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'topic.required' => 'Тема сообщения не должна быть пустой',
            'topic.max' => 'Тема сообщения должна содержать не более 50 символов',
            'message.required' => 'Сообщение не должно быть пустым',
        ];
    }
}
