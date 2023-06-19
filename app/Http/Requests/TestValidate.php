<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','min:7'],
            'price' => ['required']
        ];
    }

    public function messages() {
        return [
            'required' => "Trường :attribute là trường bắt buộc",
            'min' => "Trường :attribute phải lớn hơn :min ký tự"
        ];
    }

    // Đổi tên attribute
    public function attributes() {
        return [
            'name' => "tên sản phẩm",
            'price' => 'giá sản phẩm'
        ];
    }

    // handle trước khi validate
    protected function prepareForValidation() {
        $this->merge([
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
