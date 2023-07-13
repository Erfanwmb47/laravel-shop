<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name' => ['required'],
            'categories' => ['required'],
            'price' => ['required'],
            'attribute' => ['array'],
            'imageNameProduct'=>['array','required'],
            'imageAltProduct'=>['array','required'],
            'brand'=>['required']


        ];
    }
}
