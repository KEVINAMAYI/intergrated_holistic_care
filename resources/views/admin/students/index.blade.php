@extends('admin.layouts.body',['page_title' => 'Students'])

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('content')

    <div class="container-fluid">

        @if (session()->has('message'))
            <div id="phpalert" class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registered Students</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="students" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>ID Number</th>
                                <th>Gender</th>
                                <th>Education Level</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->phone_number }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->identification_number }}</td>
                                    <td>{{ $student->gender->gender }}</td>
                                    <td>{{ $student->education_level->level }}</td>
                                    {{--                                    <td>{{ $student->preferred_class_time->time }}</td>--}}
                                    <td>
                                        <form style="display:inline;"
                                              action="{{ route('students.destroy',[$student->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn  btn-sm btn-danger mb-1">Delete</button>
                                        </form>
                                        <button type="submit" id="{{ $student->id }}"
                                                class="editStudentCourseBtn mb-1  btn btn-sm btn-info">manage
                                        </button>
                                        <button
                                            student_identification_document="{{ $student->identification_document_url }}"
                                            student_school_certificate="{{ $student->school_certificate_url }}"
                                            student_birth_certificate="{{ $student->birth_certificate_url }}"
                                            student_id="{{ $student->id }}" type="submit"
                                            class="viewCertificatesBtn text-white mb-1 btn btn-sm btn-warning">view docs
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>ID Number</th>
                                <th>Gender</th>
                                <th>Education Level</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    {{--activate user courses --}}
    <div class="modal fade" id="activateUserCoursesModal" tabindex="-1" aria-labelledby="activateUserCoursesLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activateUserCoursesLabel">Activate/Deactivate User Courses <small>(check
                            to activate)</small></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="activateUserCoursesForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        @foreach($courses as $course)
                            <div class="form-check">
                                <input class="form-check-input course" type="checkbox" value="{{ $course->id }}"
                                       name="courses[]">
                                <label class="text-bold form-check-label">
                                    {{ $course->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="activateUserCoursesBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--show student certificates --}}
    <div class="modal fade" id="showStudentCertificatesModal" tabindex="-1" aria-labelledby="activateUserCoursesLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showStudentCertificatesLabel">Student Documents </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div style="margin-left:1px;" class="row">
                                <p>Birth Certificate</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a id="birth_certificate" href="">Download Birth Certificate
                                        <i style="color: rgb(27, 184, 191); margin-left:10px;"
                                           class="nav-icon fa fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div style="margin-left:1px;" class="row">
                                <p>National ID/Passport</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a id="identification_document" href="">Download National ID/Passport
                                        <i style="color: rgb(27, 184, 191); margin-left:10px;"
                                           class="nav-icon fa fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div style="margin-left:1px;" class="row ">
                                <p>KCSE/Diploma Certificate</p>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a id="education_certificate" href="">Download KCSE/Diploma Certificate
                                        <i style="color: rgb(27, 184, 191); margin-left:10px;"
                                           class="nav-icon fa fa-download"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <!-- DataTables  & Plugins -->
        <script src="backend/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="backend/plugins/jszip/jszip.min.js"></script>
        <script src="backend/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="backend/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

        <script>
            $(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                //view student files
                $(".viewCertificatesBtn").on('click', function () {

                    let identification_document_link = '/identification_documents/' + $(this).attr('student_identification_document');
                    let education_certificate_link = '/school_certificates/' + $(this).attr('student_school_certificate');
                    let birth_certificate_link = '/birth_certificates/' + $(this).attr('student_birth_certificate');

                    $('#birth_certificate').attr('href', birth_certificate_link);
                    $('#identification_document').attr('href', identification_document_link);
                    $('#education_certificate').attr('href', education_certificate_link);
                    $('#showStudentCertificatesModal').modal('show');

                });


                //get course data for edit
                $(".editStudentCourseBtn").on('click', function () {

                    const student_id = $(this).attr('id');
                    $.ajax({
                        url: "/admin/students/" + student_id,
                        type: "get",
                        success: function (response) {

                            //uncheck all check boxes
                            $('.course').each(function (index, item) {
                                $(item).prop("checked", false);
                            });

                            //check checkboxes that match student course
                            const student_courses_ids = response.student_courses;
                            student_courses_ids.forEach((student_course_id) => {
                                $('.course').each(function (index, item) {
                                    const checkboxValue = parseInt($(item).val());
                                    if (checkboxValue === student_course_id) {
                                        $(item).prop("checked", true);
                                    }
                                });
                            });

                            $('#activateUserCoursesModal').modal('show');
                            $('#activateUserCoursesForm').attr('action', '/admin/activate-student-courses/' + student_id);

                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                });

                $("#students").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#students_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });

            setTimeout(function () {
                $('.alert').alert('close');
            }, 3000);

        </script>
    @endpush
@endsection
