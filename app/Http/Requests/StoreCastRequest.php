<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCastRequest extends FormRequest
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
            'cast_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'types' => ['required', 'string', 'max:255'],
            'age' => ['between:1,20'],
            'character' => ['required', 'string', 'max:255'],
            // 'main_image_path' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            // 'sub_image_path' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'main_image_path' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'sub_image_path' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }
}
