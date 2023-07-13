<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'firstName' => ['string','max:64'],
            'lastName' => ['string','max:64'],
            'description' => ['string','max:512','nullable'],
            //TODO آوردن ایمیل از کنترل ولیدیت به اینجا
            //'email' => ['required','email','string','max:255',Rule::unique('users')->ignore($user->id)],
            'sex' => ['in:man,woman'],
            //TODO type role id
            'role' => ['required'],
            //TODO phone o bithday
        ];
    }
}
