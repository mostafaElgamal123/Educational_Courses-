<?php

namespace App\Http\Requests\Web\Dashborad;

use Illuminate\Foundation\Http\FormRequest;

class WhyChooseUsRequest extends FormRequest
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
            'title'                                 =>'required|min:3|max:150',
            'description'                           =>'required|min:3|max:10000',
            'image'                                 =>'required|mimes:webp|max:1000',
            'icon_1'                                =>'required|min:3|max:150',
            'icon_2'                                =>'required|min:3|max:150',
            'icon_3'                                =>'required|min:3|max:150',
            'Skilled_Instructors_title'             =>'required|min:3|max:150',
            'Skilled_Instructors_description'       =>'required|min:3|max:1000',
            'International_Certificate_title'       =>'required|min:3|max:150',
            'International_Certificate_description' =>'required|min:3|max:1000',
            'Online_Classes_title'                  =>'required|min:3|max:150',
            'Online_Classes_description'            =>'required|min:3|max:1000',
            'slug'                =>'required|min:3|max:150'
        ];
    }
}
