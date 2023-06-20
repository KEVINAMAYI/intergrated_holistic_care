@extends('admin.layouts.body',['page_title' => 'Courses'])

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('content')

    <div class="container-fluid">

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Courses</h3>
                    </div>

                    <div class="col-3 pt-3 pl-3">
                        <!-- Button trigger modal -->
                        <button style="border:0px solid white; border-radius:0px; background-color: rgb(27, 184, 191);"
                                type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal">
                            <i style="color:white; margin-right:3px;" class="nav-icon fa fa-plus-circle"></i>
                            Add Course
                        </button>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="courses" class="table  table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>cost</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td class="justify-content-start">
                                        {{ $course->title }}
                                    </td>
                                    <td class="justify-content-start">
                                        {{ $course->description }}
                                    </td>
                                    <td class="justify-content-start">
                                        {{ $course->cost }}
                                    </td>
                                    <td>
                                        <img src="images/course_images/{{ $course->image_url }}"
                                             style="margin-right:4px; border:2px solid white;"
                                             class="rounded-circle" width="50px" height="50px;"
                                             alt="avatar">
                                    </td>
                                    <td class="justify-content-start">
                                        <a href="/get-course-sections/{{$course->id}}" class="btn  btn-xs btn-success">
                                            <i style="color:white;" class="nav-icon fa fa-xm fa-eye"></i>
                                            view
                                        </a>
                                        <button class="btn editButton btn-xs btn-info" id="{{ $course->id }}">
                                            <i style="color:white;" class="nav-icon fa fa-xm fa-edit"></i>
                                            edit
                                        </button>
                                        <form style="display:inline;"
                                              action="{{ route('courses.destroy',$course->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-xs btn-danger">
                                                <i style="color:white;" class="nav-icon fa fa-xs fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>cost</th>
                                <th>Image</th>
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

    {{-- Add Course Modal --}}
    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createCourseForm" action="{{ route('courses.store') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseTitle">Course Title</label>
                            <input type="email" class="form-control" id="courseTitle" name="title"
                                   placeholder="Nursing">
                        </div>
                        <div class="form-group mt-4">
                            <label for="courseDescription">Course Description</label>
                            <textarea class="form-control" name="description" id="courseDescription"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group mt-4">
                            <label for="courseInstructor">Course Instructor</label><br>
                            <select style="width:100%; border-color:grey; padding:10px;" class="form-select"
                                    name="instructor_id" aria-label="Default select example">
                                <option value="1">Admin</option>
                                <option value="2">Lilian Owiti</option>
                                <option value="3">Ronald Owiti</option>
                            </select></div>
                        <div class="form-group">
                            <label for="courseImage" class="form-label">Course Image</label>
                            <input style="padding-bottom:40px;" class="form-control" name="image" type="file"
                                   id="courseImage">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Edit Course Modal -->
    <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editCourseForm" action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseTitle">Course Title</label>
                            <input type="email" class="form-control" id="editedCourseTitle" name="title"
                                   placeholder="Nursing">
                        </div>
                        <div class="form-group mt-4">
                            <label for="courseDescription">Course Description</label>
                            <textarea class="form-control" name="description" id="editedCourseDescription"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group mt-4">
                            <label for="courseInstructor">Course Instructor</label><br>
                            <select style="width:100%; border-color:grey; padding:10px;" class="form-select"
                                    name="instructor_id" id="editedCourseInstructor"
                                    aria-label="Default select example">
                                <option value="1">Admin</option>
                                <option value="2">Lilian Owiti</option>
                                <option value="3">Ronald Owiti</option>
                            </select></div>
                        <div class="form-group">
                            <label for="courseImage" class="form-label">Course Image</label>
                            <input style="padding-bottom:40px;" class="form-control" name="image" type="file"
                                   id="editedCourseImage">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="courseId" name="course_id" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="updateCourseBtn" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
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

        <!-- Laravel Javascript Validation -->
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        {!! JsValidator::formRequest('App\Http\Requests\StoreCourseRequest', '#createCourseForm'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UpdateCourseRequest', '#editCourseForm'); !!}

        <script>
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                //get course data for edit
                $(".editButton").on('click', function () {

                    const course_id = $(this).attr('id');
                    $.ajax({
                        url: "/courses/" + course_id,
                        type: "get",
                        success: function (response) {
                            $('#editedCourseTitle').val(response.course.title);
                            $('#editedCourseDescription').text(response.course.description);
                            $('#editedCourseInstructor').val(response.course.instructor_id);
                            $('#courseId').val(course_id);
                            $('#editCourseModal').modal('show');
                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                });


                //submit editCourse form data
                $("#editCourseForm").submit(function (e) {
                    const course = $('#courseId').val();

                    //prevent Default functionality
                    e.preventDefault();

                    const courseImage = $('#editedCourseImage')[0].files[0];
                    formData = new FormData($('#editCourseForm')[0]);
                    formData.set('image', courseImage);

                    $.ajax({
                        url: '/update-course/' + course,
                        type: 'post',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            $('#editCourseModal').modal('hide');
                            $(".toast-body").text(response.data);
                            $(".toast").toast('show');
                            location.reload();
                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });

                });

                //set data Table
                $("#courses").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#courses_wrapper .col-md-6:eq(0)');

                setTimeout(function () {
                    $('.alert').alert('close');
                }, 3000);

            });
        </script>

    @endpush
@endsection
