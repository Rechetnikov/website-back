<?php
/**
 * Created by PhpStorm.
 * User: Snarbi
 * Date: 29.07.2020
 * Time: 14:11
 */

namespace App\Http\Requests;


class CommentRequest
{
    public function rules()
    {
        return [
            'comment_id' => 'required|int',
            'article_id' => 'required|int',
            'text' => 'required|string'
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
            'comment_id.required' => 'Не найден ID!',
            'article_id.required' => 'Не найден ID статьи!',
            'text.required' => 'Не заполнено поле Текст!'
        ];
    }
}