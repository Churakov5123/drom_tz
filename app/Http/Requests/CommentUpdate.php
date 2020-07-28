<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CommentUpdate extends ApiFormRequest
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
     * Правила валидации при обновлении сущности, на приходящий request  методом PUT
     *
     * @return array
     */
    public function rules()
    {
        return [

            'id' => 'integer',
            'name' => 'string|min:2|max:50',
            'text' => 'string|min:10|max:1000|',

        ];
    }
}
