<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentCreate extends ApiFormRequest
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
     * Правила валидации при создание новой сущности,на приходящий request  методом POST
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'string|required|min:2|max:50',
            'text' => 'string|required|min:10|max:1000|',

        ];
    }


}
