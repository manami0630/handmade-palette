<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'explanation' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => '作品名を入力してください',
            'explanation.required' => '作品の説明を入力してください',
            'explanation.max' => '作品の説明は255文字以内で入力してください',
            'image.required' => '画像を選択してください',
            'image.mimes:png,jpeg' => '「.png」または「.jpeg」形式でアップロードしてください',
            'category_id.required' => 'カテゴリーを選択してください',
        ];
    }
}