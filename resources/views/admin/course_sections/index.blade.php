@extends('admin.layouts.body',['page_title' => $course->title])

@section('content')

    <div class="container-fluid">

        <!-- Button redirect to courses modal -->
        <a href="{{ route('courses.index') }}"  style="border:0px solid white; border-radius:0px; background-color: rgb(27, 184, 191);"
                type="button"
                class="btn mb-3 btn-primary">
            <i style="color:white; margin-right:3px;" class="nav-icon fa fa-backward"></i>
            Back
        </a>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Course Sections</h3>
                    </div>
                    <div class="col-3 pt-3 pl-3">
                        <!-- Button trigger modal -->
                        <button style="border:0px solid white; border-radius:0px; background-color: rgb(27, 184, 191);"
                                type="button" data-toggle="modal" data-target="#addCourseSectionModal"
                                class="btn btn-primary">
                            <i style="color:white; margin-right:3px;" class="nav-icon fa fa-plus-circle"></i>
                            Add Course Section
                        </button>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            @foreach($course->sections as $section)
                                <div class="card">
                                    <div class="row card-header" id="headingOne">
                                        <div class="col-lg-9">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link btn-block text-left" type="button"
                                                        data-toggle="collapse" data-target="#collapse{{$section->id}}"
                                                        aria-expanded="true"
                                                        aria-controls="collapse{{$section->id}}">
                                                    <strong>Section {{ $section_number = $loop->iteration }}
                                                        . {{ $section->name }}</strong>

                                                </button>
                                            </h2>
                                        </div>
                                        <div class="col-lg-3">
                                            <button lecture_section_id="{{ $section->id }}" class="btn addLectureBtn btn-xs btn-success">
                                                <i style="color:white;" class="nav-icon fa fa-xm fa-plus-circle"></i>
                                                Add Lecture
                                            </button>
                                            <button class="btn editCourseSectionButton btn-xs btn-info"
                                                    id="{{ $section->id }}">
                                                <i style="color:white;" class="nav-icon fa fa-xm fa-edit"></i>
                                                edit
                                            </button>

                                            <form style="display:inline;"
                                                  action="{{ route('course-sections.destroy',$section->id) }}"
                                                  method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i style="color:white;" class="nav-icon fa fa-xs fa-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="collapse{{$section->id}}" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                @foreach($section->lectures as $lecture)
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-lg-10">
                                                                <strong>Lecture {{ $section_number }}01. </strong>
                                                                {{ $lecture->name }}
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <button id="{{ $lecture->id }}"
                                                                        class="btn editCourseLectureBtn btn-xs btn-info">
                                                                    <i style="color:white;"
                                                                       class="nav-icon fa fa-xm fa-edit"></i>
                                                                    edit
                                                                </button>
                                                                <form style="display:inline;"
                                                                      action="{{ route('course-lectures.destroy',$lecture->id) }}"
                                                                      method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                                        <i style="color:white;"
                                                                           class="nav-icon fa fa-xs fa-trash"></i>
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    {{-- Add Course Section Modal --}}
    <div class="modal fade" id="addCourseSectionModal" tabindex="-1" aria-labelledby="addCourseModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseSectionLabel">Add Course Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createCourseSectionForm" action="{{ route('course-sections.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseTitle">Course Section Name</label>
                            <input type="text" class="form-control" id="courseSectionName" name="name"
                                   placeholder="Physiology">
                        </div>
                        <div class="form-group mt-4">
                            <label for="courseSectionDescription">Course Section Description</label>
                            <textarea class="form-control" name="description" id="courseDescription"
                                      rows="3"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Course Section Modal --}}
    <div class="modal fade" id="editCourseSectionModal" tabindex="-1" aria-labelledby="editCourseSectionLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseSectionLabel">Edit Course Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editCourseSectionForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editedCourseSectionName">Course Section Name</label>
                            <input type="text" class="form-control" id="editedCourseSectionName" name="name"
                                   placeholder="Physiology">
                        </div>
                        <div class="form-group mt-4">
                            <label for="editedCourseDescription">Course Section Description</label>
                            <textarea class="form-control" name="description" id="editedCourseDescription"
                                      rows="3"></textarea>
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

    {{-- Edit Lecture Modal --}}
    <div class="modal fade" id="editLectureModal" tabindex="-1" aria-labelledby="editLectureModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLectureModalLabel">Edit Lecture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editLectureForm" action="" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseTitle">Lecture Title</label>
                            <input type="text" name="name" class="form-control" id="editedLectureName" name="title"
                                   placeholder="Digestion">
                        </div>
                        <div class="form-group mt-4">
                            <label for="lectureDescription">Lecture Description</label>
                            <textarea class="form-control" name="description" id="editedLectureDescription"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lectureContent" class="form-label">Lecture Content</label>
                            <input style="padding-bottom:40px;" class="form-control" name="lecture_content" type="file"
                                   id="lectureContent">
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


    {{-- Add Lecture Modal --}}
    <div class="modal fade" id="addLectureModal" tabindex="-1" aria-labelledby="addLectureModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLectureModalLabel">Add New Lecture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addLectureForm" action="{{ route('course-lectures.store') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="lectureName">Lecture Title</label>
                            <input type="text" class="form-control" id="lectureName" name="name"
                                   placeholder="Digestion">
                        </div>
                        <div class="form-group mt-4">
                            <label for="description">Lecture Description</label>
                            <textarea class="form-control" name="description" id="lectureDescription"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lectureContent" class="form-label">Lecture Content</label>
                            <input style="padding-bottom:40px;" class="form-control" name="lecture_content" type="file"
                                   id="lectureContent">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="" name="section_id" id="formSectionId">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
        {!! JsValidator::formRequest('App\Http\Requests\StoreSectionRequest', '#createCourseSectionForm'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UpdateSectionRequest', '#editCourseSectionForm'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\StoreLectureRequest', '#addLectureForm'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UpdateLectureRequest', '#editLectureForm'); !!}

        <script>
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                //get course_section data for edit
                $(".editCourseSectionButton").on('click', function () {

                    const course_section_id = $(this).attr('id');
                    console.log(course_section_id);

                    $.ajax({
                        url: "/course-sections/" + course_section_id,
                        type: "get",
                        success: function (response) {

                            $('#editedCourseSectionName').val(response.course_section.name);
                            $('#editedCourseDescription').text(response.course_section.description);
                            $('#editCourseSectionModal').modal('show');
                            $('#editCourseSectionForm').attr('action', '/course-sections/' + response.course_section.id);

                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                });

                //get and set section id
                $(".addLectureBtn").on('click', function () {
                    $('#formSectionId').val($(this).attr('lecture_section_id'))
                    $('#addLectureModal').modal('show');
                });


                //get course_section_lecture data for edit
                $(".editCourseLectureBtn").on('click', function () {

                    const course_lecture_id = $(this).attr('id');
                    console.log(course_lecture_id);

                    $.ajax({
                        url: "/course-lectures/" + course_lecture_id,
                        type: "get",
                        success: function (response) {

                            $('#editedLectureName').val(response.course_lecture.name);
                            $('#editedLectureDescription').text(response.course_lecture.description);
                            $('#editLectureModal').modal('show');
                            $('#editLectureForm').attr('action', '/course-lectures/' + response.course_lecture.id);

                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                });

                setTimeout(function () {
                    $('.alert').alert('close');
                }, 3000);

            });
        </script>
    @endpush
@endsection
