<?php

namespace App\Http\Requests\Web\Dashborad;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'title'               =>'required|min:3|max:150',
            'description'         =>'required|min:3|max:10000',
            'image'               =>'required|image|mimes:webp|max:1000',
            'available_subject'   =>'required|numeric',
            'online_courses'      =>'required|numeric',
            'skilled_instructors' =>'required|numeric',
            'happy_students'      =>'required|numeric',
            'slug'                =>'required|min:3|max:150'
        ];
    }
}
