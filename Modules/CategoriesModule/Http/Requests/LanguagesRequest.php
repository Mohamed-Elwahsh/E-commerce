<?php

namespace Modules\CategoriesModule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguagesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'abbr' => 'required|string|max:10',
            'direction' => 'required|in:rtl,ltr',
            // 'active' => 'required|in:0,1',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'اسم اللغة مطلوب',
            'name.string' => 'اسم اللغة يجب أن يكون نصا',
            'name.max' => 'اسم اللغة لابد ألا يزيد عن 100 حرف',
            'abbr.required' => 'إختصار اللغة مطلوب',
            'abbr.string' => 'إختصار اللغة يجب أن يكون نصا',
            'abbr.max' => 'إختصار اللغة لابد ألا يزيد عن 10 أحرف',
            'active.required' => 'الحالة مطلوبة ',
            'active.in' => 'قيمة الحالة غير صحيحة',
            'direction.required' => 'اتجاه اللغة مطلوب ',
            'direction.in' => 'قيمة الإتجاه غير صحيحة',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
