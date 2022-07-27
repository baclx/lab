<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // rules: quy tắc: là những cái phải truyền lên trong form phải tuân theo quy tắc gì
    public function rules()
    {
        return [
            // name = field
            'name' => [
                'bail',
                'required',
                'string',
                'unique:App\Models\Course,name',
            ],
            'title' => [
                'required',
            ]
        ];
    }

    public function messages(): array {
        return [
          'required' => ':attribute bắt buộc phải điền',
          'unique' => ':attribute này đã đc dùng',
        ];
    }

    public function attribute() {
        return [
            'name' => 'Name',
        ];
    }
}
