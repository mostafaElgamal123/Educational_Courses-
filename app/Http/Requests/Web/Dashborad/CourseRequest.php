<?php

namespace App\Http\Requests\Web\Dashborad;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'description'         =>'required|min:3|max:100000',
            'image'               =>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rating'              =>'required|numeric|between:0,99.99',
            'lectures'            =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'duration'            =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'Skill_level'         =>'required|min:3|max:150',
            'language'            =>'required|min:3|max:25',
            'discount'            =>'required|nullable|regex:/^(\d+(,\d{1,2})?)?$/',
            'category_id'         =>'required|',
            'instructor_id'       =>'required|'
        ];
    }
}
