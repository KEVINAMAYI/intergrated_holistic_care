<?php

namespace App\Http\Controllers\Auth;

use App\Services\FileService;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Jobs\ProcessRegistrationEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    public function __construct(private FileService $fileService)
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function showRegistrationForm(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = [];
        $data['genders'] = DB::table('genders')->get();
        $data['courses'] = DB::table('courses')->get();
        $data['education_levels'] = DB::table('education_level')->get();
        $data['marital_statuses'] = DB::table('marital_statuses')->get();
        $data['preferred_times'] = DB::table('preferred_time_of_class')->get();
        $data['methods'] = DB::table('how_you_learnt_about_us')->get();
        return view('auth.register', $data);
    }


    public function register(StoreUserRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->create($request->validated());
        ProcessRegistrationEmail::dispatch($request->email, $request->name);
        session()->flash('message', 'Registration Successful, A confirmation Email has been sent. Login to Continue');
        return response()->json([
            'message' => 'Registration was successful'
        ]);

    }

    private function generateReferenceNumber(): string
    {
        $numbers = '123456789';
        $alphabets = 'ABCDEFGHIJKLMNPQRSTUVWXYZ';
        return substr(str_shuffle($alphabets), 0, 3) . substr(str_shuffle($numbers), 0, 3);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data): User
    {

        $student_photo_name = $this->fileService->processImage($data['student_photo'], 512000, public_path('/images/student_photos/'), 'student', 4, 4);
        $birth_certificate = $this->fileService->processNonImageFiles($data['birth_certificate'],public_path('/birth_certificates/'),'birth_certificate');
        $school_certificate = $this->fileService->processNonImageFiles($data['school_certificate'],public_path('/school_certificates/'),'school_certificate');
        $identification_file = $this->fileService->processNonImageFiles($data['identification_file'],public_path('/identification_documents/'),'identification');

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
            'ref_number' => $this->generateReferenceNumber(),
            'student_photo' => $student_photo_name,
            'birth_certificate_url' => $birth_certificate,
            'school_certificate_url' => $school_certificate,
            'identification_document_url' => $identification_file
        ];

        return User::create($user);
    }
}
