<?php

namespace App\Http\Controllers\Student;

use App\Services\FileService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private FileService $fileService)
    {
    }

    public function index()
    {

        $data = array();
        $data['genders'] = DB::table('genders')->get();
        $data['courses'] = DB::table('courses')->get();
        $data['education_levels'] = DB::table('education_level')->get();
        $data['marital_statuses'] = DB::table('marital_statuses')->get();
        $data['preferred_times'] = DB::table('preferred_time_of_class')->get();
        $data['methods'] = DB::table('how_you_learnt_about_us')->get();
        $data['student'] = User::with('gender', 'education_level')->find(auth()->user()->id);
        return view('student.profile', $data);

    }

    public function update(Request $request, User $student_profile)
    {

        $student_photo_name = $request->hasFile('student_photo') ? $this->fileService->processImage($request->student_photo, 512000, public_path('/images/student_photos/'), 'student', 4, 4) : null;
        $birth_certificate = $request->hasFile('birth_certificate') ? $this->fileService->processNonImageFiles($request->birth_certificate, public_path('/birth_certificates/'), 'birth_certificate') : null;
        $school_certificate = $request->hasFile('school_certificate') ? $this->fileService->processNonImageFiles($request->school_certificate, public_path('/school_certificates/'), 'school_certificate') : null;
        $identification_file = $request->hasFile('identification_file') ? $this->fileService->processNonImageFiles($request->identification_file, public_path('/identification_documents/'), 'identification') : null;

        //remove old files if student uploaded new files
        if (!is_null($student_photo_name)  &&  !is_null($student_profile->student_photo))               $this->fileService->removeFile(public_path('/images/student_photos/' . $student_profile->student_photo));
        if (!is_null($birth_certificate)   &&  !is_null($student_profile->birth_certificate_url))       $this->fileService->removeFile(public_path('/birth_certificates/' . $student_profile->birth_certificate_url));
        if (!is_null($school_certificate)  &&  !is_null($student_profile->school_certificate_url))      $this->fileService->removeFile(public_path('/school_certificates/' . $student_profile->school_certificate_url));
        if (!is_null($identification_file) &&  !is_null($student_profile->identification_document_url)) $this->fileService->removeFile(public_path('/identification_documents/' . $student_profile->identification_document_url));

        $student_profile->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'dob' => $request->input('dob'),
            'gender_id' => $request->input('gender_id'),
            'marital_status_id' => $request->input('marital_status_id'),
            'identification_number' => $request->input('identification_number'),
            'location' => $request->input('location'),
            'education_level_id' => $request->input('education_level_id'),
            'preferred_time_of_class_id' => $request->input('preferred_time_of_class_id'),
            'student_photo' => !is_null($student_photo_name) ? $student_photo_name : $student_profile->student_photo,
            'birth_certificate_url' => !is_null($birth_certificate) ? $birth_certificate : $student_profile->birth_certificate_url,
            'school_certificate_url' => !is_null($school_certificate) ? $school_certificate : $student_profile->school_certificate_url,
            'identification_document_url' => !is_null($identification_file) ? $identification_file : $student_profile->identification_document_url,
        ]);

        Session::flash('message', 'Profile updated successfully');
        return redirect()->back();
    }
}
