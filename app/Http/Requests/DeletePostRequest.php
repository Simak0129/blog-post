<?php

namespace App\Http\Requests;

use App\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class DeletePostRequest extends FormRequest
{
    use ValidationTrait;

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
            'id' => 'required|integer|exists:posts,id',
        ];
    }
}
