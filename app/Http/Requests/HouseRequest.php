<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseRequest extends FormRequest
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
            'house_name' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            // 'number_of_bedrooms' => 'required|integer|between:1,9999999999',
            // 'area_bedrooms' => 'required|integer|between:1,9999999999',
            // 'area' => 'required|numeric|min:0|between:1,9999999999',
            // 'rent_price' => 'numeric|between:1,9999999999',
            'service_id' => 'required',
            // 'images' => 'required|image|size:3072' // Thêm quy tắc kiểm tra ảnh
        ];
    }
}
