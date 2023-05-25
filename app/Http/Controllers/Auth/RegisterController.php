<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function showRegistrationForm()
    {
        $data = [];
        $data['genders'] = \DB::table('genders')->get();
        $data['courses'] = \DB::table('courses')->get();
        $data['education_levels'] = \DB::table('education_level')->get();
        $data['marital_statuses'] = \DB::table('marital_statuses')->get();
        $data['preferred_times'] = \DB::table('preferred_time_of_class')->get();
        $data['methods'] = \DB::table('how_you_learnt_about_us')->get();
        return view('auth.register', $data);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required'],
            'gender_id' => ['required'],
            'location' => ['required', 'string', 'max:255'],
            'marital_status_id' => ['required'],
            'education_level_id' => ['required'],
            'course_id' => ['required'],
            'identification_number' => ['required'],
            'phone_number' => ['required', 'max:10', 'min:10', 'unique:users'],
            'preferred_time_of_class_id' => ['required'],
            'how_you_learnt_about_us_id' => ['required'],
        ]);
    }



    public function register(Request $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $this->validator($request->all())->validate();
        $this->create($request->all());
        session()->flash('message','Registration Successful, Login to Continue');
        return redirect('login');

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data): User
    {

        //generate reference number
        $numbers = '123456789';
        $alphabets = 'ABCDEFGHIJKLMNPQRSTUVWXYZ';
        $ref_number = substr(str_shuffle($alphabets), 0, 3) . substr(str_shuffle($numbers), 0, 3);

        //store student photo
        $student_photo = $data['student_photo'];
        $student_photo_name =  "student-".time().'-'.$student_photo->getClientOriginalName();
        $student_photo->move(public_path('/images/student_photos'), $student_photo_name);

        $user = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dob' => $data['dob'],
            'gender_id' => $data['gender_id'],
            'marital_status_id' => $data['marital_status_id'],
            'phone_number' => $data['phone_number'],
            'location' => $data['location'],
            'sub_location' => $data['sub_location'] ?? '',
            'education_level_id' => $data['education_level_id'],
            'identification_number' => $data['identification_number'],
            'course_id' => $data['course_id'],
            'preferred_time_of_class_id' => $data['preferred_time_of_class_id'],
            'how_you_learnt_about_us_id' => $data['how_you_learnt_about_us_id'],
            'ref_number' => $ref_number,
            'student_photo' => $student_photo_name
        ];
        return User::create($user);
    }
}
