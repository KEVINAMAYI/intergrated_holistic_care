<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required | string | max:255',
            'email' => 'required | string | email:ends_with:.com,.org,.ke | max:255 | unique:users',
            'password' => 'required | string | min:8 | confirmed',
            'password_confirmation' => 'required',
            'dob' => 'required',
            'gender_id' => 'required',
            'location' => 'required | string | max:255',
            'marital_status_id' => 'required',
            'education_level_id' => 'required',
            'course_id' => 'required',
            'identification_number' => 'required',
            'phone_number' => 'required | max:10 | min:10 | unique:users',
            'preferred_time_of_class_id' => 'required',
            'how_you_learnt_about_us_id' => 'required',
            'birth_certificate' => 'required',
            'school_certificate' => 'required',
            'identification_file' => 'required',
            'student_photo' => 'required | mimes:jpeg,png,jpg,gif',
        ];
    }
}
