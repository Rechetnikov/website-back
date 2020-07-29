<?php
/**
 * Created by PhpStorm.
 * User: Snarbi
 * Date: 29.07.2020
 * Time: 13:55
 */

namespace App\Http\Requests;


class ArticleRequest extends apiRequests
{
    public function rules()
    {
        return [
            'article_id' => 'required|int',
            'title' => 'required|string',
            'description' => 'required|string',
            'text' => 'required|string',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'article_id.required' => 'Не найден ID!',
            'title.required' => 'Не заполнено поле Заголовок!',
            'description.required' => 'Не заполнено поле Анонс!',
            'text.required' => 'Не заполнено поле Текст'
        ];
    }
}