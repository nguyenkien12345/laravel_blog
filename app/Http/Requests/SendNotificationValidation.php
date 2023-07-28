<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;

class SendNotificationValidation extends FormRequest
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
            'message' => 'required',
            'player_ids' => 'required'
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
            'message' => 'tin nhắn (message)',
            'player_ids' => 'id người dùng (player_ids)',
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
