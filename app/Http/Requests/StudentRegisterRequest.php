<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegisterRequest extends FormRequest
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

        $rules = [
            'student_name' => 'required|string',
            'school_id' => 'required|numeric',
            'father_name' => 'required|string',
            'father_mobile' => 'required|string',
            'father_profession' => 'required|string',
            'mother_name' => 'required|string',
            'mother_mobile' => 'required|string',
            'mother_profession' => 'required|string',
            'email_address' => 'nullable|string',
            'sms_mobile' => 'required|string',
            'date_of_admission' => 'required|string',
            'student_photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'address' => 'required|string',
            'password' => 'student_photo|string',
        ];

        if (request()->isMethod('post'))
        {
            $rules['student_type_id'] = ['required','array'];
            $rules['student_type_id.*'] = ['required','numeric'];
            $rules['batch_id'] = ['required','array'];
            $rules['batch_id.*'] = ['required','numeric'];
            $rules['student_roll'] = ['required','array'];
            $rules['student_roll.*'] = ['required','numeric'];
            $rules['class_id'] = ['required','numeric'];
        }
        return $rules;

    }
}
