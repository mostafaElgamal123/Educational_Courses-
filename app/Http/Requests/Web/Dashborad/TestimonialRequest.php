<?php

namespace App\Http\Requests\Web\Dashborad;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'       =>'required|min:3|max:150',
            'description' =>'required|min:3|max:1000',
            'image'       =>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'      =>'required'
        ];
    }
}
