<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
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

            'nickname' => 'required|string|max:10',
            'age'=> 'required|integer|regex:/^[0-9]+$/i|between:10,100|', 
            'weight' => ['required','numeric','regex:/^[1-9][0-9]{0,2}(\.[0-9]{1,2})?$/','between:30,150'],
            'height' => 'required|integer|regex:/^[0-9]+$/i|between:110,220|',
            'gender' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            
            'nickname.required' => 'ニックネームを入力してください。',
            'nickname.string' => 'ニックネームを全角・半角文字で入力してください。',
            'nickname.max' => 'ニックネームは10文字以内で入力してください。',
            'age.required' => '年齢を入力してください。',
            'age.regex' => '年齢は半角数字で入力してください。',
            'age.integer' => '年齢は整数で入力してください。',
            'age.between' => '年齢は10歳〜100歳で入力してください。',
            'weight.required' => '体重を入力してください。',
            'weight.numeric' => '体重は半角数字で入力してください。',
            'weight.regex' => '体重は小数点第一位の数まで入力可能です。',
            'weight.between' => '体重は30〜150の間で入力してください。',
            'height.required' => '身長を入力してください。',
            'height.integer' => '身長は整数で入力してください。',
            'height.regex' => '身長は半角数字で入力してください。',
            'height.between' => '身長は110〜220の間で入力してください。',
            'icon' => 'アイコン画像を選択してください',
            'gender.required' => '性別を選択してください',
            'gender.integer' => '性別を選択してください',
        ];
    }
}
