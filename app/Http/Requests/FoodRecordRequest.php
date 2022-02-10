<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRecordRequest extends FormRequest
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

            'morning' => ['required','integer','regex:/^[0-9]+$/i','between:0,10000'],
            'lunch' => ['required','integer','regex:/^[0-9]+$/i','between:0,10000'],
            'dinner' => ['required','integer','regex:/^[0-9]+$/i','between:0,10000'],
            'otherfood' => ['required','integer','regex:/^[0-9]+$/i','between:0,10000'],
        
        ];
    }

    public function messages()
    {
        return [
           
            'morning.required' => '朝ごはんを入力してください。',
            'morning.integer' => '朝ごはんは整数で入力してください。',
            'morning.regex' => '朝ごはんは半角数字で入力してください。',
            'morning.between' => '朝ごはんは0〜10000の間で入力してください。',
            'lunch.required' => '昼ごはんを入力してください。',
            'lunch.integer' => '昼ごはんは整数で入力してください。',
            'lunch.regex' => '昼ごはんは半角数字で入力してください。',
            'lunch.between' => '昼ごはんは0〜10000の間で入力してください。',
            'dinner.required' => '晩ごはんを入力してください。',
            'dinner.integer' => '晩ごはんは整数で入力してください。',
            'dinner.regex' => '晩ごはんは半角数字で入力してください。',
            'dinner.between' => '晩ごはんは0〜10000の間で入力してください。',
            'otherfood.required' => '間食を入力してください。',
            'otherfood.integer' => '間食は整数で入力してください。',
            'otherfood.regex' => '間食は半角数字で入力してください。',
            'otherfood.between' => '間食は0〜10000の間で入力してください。',
        ];
    }
}
