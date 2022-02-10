<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
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

            'condition' => 'required',
            'fullness' => 'required',
            'effort' => 'required',
            'body' => 'required|max:255',
        
        ];
    }

    public function messages()
    {
        return [
            
            'condition.required' => '調子を選択してください',
            'fullness.required' => '充実度を選択してください',
            'effort.required' => '努力を選択してください',
            'body.required' => '日記を入力してください',
            'body.max' => '日記は255文字以内で入力してください。'
        ];
    }
}
