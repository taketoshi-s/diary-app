<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeightRecordRequest extends FormRequest
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

            'weight' => ['required','numeric','regex:/^[1-9][0-9]{0,2}(\.[0-9]{0,1})?$/','between:30,150'],
        
        ];
    }

    public function messages()
    {
        return [
            
            'weight.required' => '体重を入力してください',
            'weight.numeric' => '体重は半角数字で入力してください。',
            'weight.regex' => '体重は小数点第一位の数まで入力可能です。',
            'weight.between' => '体重は30〜150の間で入力してください。'
        ];
    }
}
