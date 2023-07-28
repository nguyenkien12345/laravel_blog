<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

class OneSignalAppValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được rỗng',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'tên ứng dụng',
        ];
    }

    // Đối với API để trả về response của Form Request dưới dạng response json thay vì html thì ta phải ghi đè phương thức failedValidation
    protected function failedValidation(Validator $validator)
    {
        $response = new Response([
            'errors' => $validator->errors(),
            'success' => false,
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'text' => 'failure',
            'time' => date("d/m/Y h:i:s"),
            'message' => 'Validation Failure'
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
        throw (new ValidationException($validator, $response));
    }
}
