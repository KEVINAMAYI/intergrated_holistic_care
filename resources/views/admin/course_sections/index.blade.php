@extends('admin.layouts.body',['page_title' => $course->title])

@section('content')

    <div class="container-fluid">

        <!-- Button redirect to courses modal -->
        <a href="{{ route('courses.index') }}"
           style="border:0px solid white; border-radius:0px; background-color: rgb(27, 184, 191);"
           type="button"
           class="btn mb-3 btn-primary">
            <i style="color:white; margin-right:3px;" class="nav-icon fa fa-backward"></i>
            Back
        </a>

        @if (session()->has('message'))
            <div id="phpalert" class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        {{-- Ajax Request Alert --}}
        <div style="display:none" class="request-alert alert alert-success">
            test
        </div>

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
                        @foreach($course->sections as $section)
                            <div class="accordion" id="sectionAccordion{{$section->id}}">
                                <div class="card">
                                    <div class="row card-header" id="headingOne">
                                        <div class="col-lg-8">
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
                                        <div class="col-lg-4">
                                            <button lecture_section_id="{{ $section->id }}"
                                                    class="btn addLectureBtn btn-xs btn-success">
                                                <i style="color:white;" class="nav-icon fa fa-xm fa-plus-circle"></i>
                                                Add Lecture
                                            </button>
                                            <button question_section_id="{{ $section->id }}"
                                                    class="btn addQuestionBtn btn-xs btn-info">
                                                <i style="color:white;" class="nav-icon fa fa-xm fa-minus-circle"></i>
                                                Add Question
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
                                         data-parent="#sectionAccordion{{$section->id}}">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                @foreach($section->lectures as $lecture)
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-lg-10">
                                                                <strong>Lecture {{ $section_number }}01. </strong>
                                                                {{ $lecture->name }} <span
                                                                    style="margin-left:15px;">{{ $lecture->url }}</span>
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

                                                <li class="list-group-item">
                                                    <div class="accordion"
                                                         id="SectionQuestionAccordion{{$section->id}}">
                                                        <div class="card">
                                                            <div class="card-header" id="headingOne">
                                                                <h2 class="mb-0">
                                                                    <button class="btn btn-link btn-block text-left"
                                                                            type="button" data-toggle="collapse"
                                                                            data-target="#questionsAccordion{{ $section->id }}"
                                                                            aria-expanded="true"
                                                                            aria-controls="questionsAccordion{{ $section->id }}">
                                                                        <strong>Section {{ $section_number = $loop->iteration }}
                                                                            . Questions</strong>
                                                                    </button>
                                                                </h2>
                                                            </div>

                                                            <div id="questionsAccordion{{ $section->id }}"
                                                                 class="collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#SectionQuestionAccordion{{$section->id}}">
                                                                <div class="card-body">
                                                                    <ul class="list-group">
                                                                        @foreach($section->openEndedQuestions as $openEndedQuestion)
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-lg-10">
                                                                                        <strong>{{ $openEndedQuestion->question }}
                                                                                            ? </strong>
                                                                                    </div>
                                                                                    <div class="col-lg-2">
                                                                                        <button
                                                                                            discussion_question_id="{{ $openEndedQuestion->id }}"
                                                                                            class="btn  editDiscussionQuestionBtn btn-xs btn-info">
                                                                                            <i style="color:white;"
                                                                                               class="nav-icon fa fa-xm fa-edit"></i>
                                                                                            Edit
                                                                                        </button>
                                                                                        <form style="display:inline;"
                                                                                              action="{{ route('course-questions.destroy',$openEndedQuestion->id) }}"
                                                                                              method="POST">
                                                                                            @method('DELETE')
                                                                                            @csrf
                                                                                            <button type="submit"
                                                                                                    class="btn btn-xs btn-danger">
                                                                                                <i style="color:white;"
                                                                                                   class="nav-icon fa fa-xs fa-trash"></i>
                                                                                                Delete
                                                                                            </button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach

                                                                        @foreach($section->closedEndedQuestions as $closedEndedQuestion)
                                                                            <li class="list-group-item">
                                                                                <div class="row">
                                                                                    <div class="col-lg-10">
                                                                                        <strong>{{ $closedEndedQuestion->question }}
                                                                                            ? </strong>
                                                                                    </div>
                                                                                    <div class="col-lg-2">
                                                                                        <button
                                                                                            closed_ended_question_id="{{ $closedEndedQuestion->id }}"
                                                                                            class="btn editCloseEndedQuestionBtn btn-xs btn-info">
                                                                                            <i style="color:white;"
                                                                                               class="nav-icon fa fa-xm fa-edit"></i>
                                                                                            Edit
                                                                                        </button>
                                                                                        <form style="display:inline;"
                                                                                              action="{{ route('course-questions.destroy',$closedEndedQuestion->id) }}"
                                                                                              method="POST">
                                                                                            @method('DELETE')
                                                                                            @csrf
                                                                                            <button type="submit"
                                                                                                    class="btn btn-xs btn-danger">
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
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                        <div class="form-group">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                     role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                     style="width: 0%"></div>
                            </div>
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
                        <div class="form-group">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                     role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                     style="width: 0%"></div>
                            </div>
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


    {{--Edit Discussion Question Modal--}}
    <div class="modal fade" id="editDiscussionQuestionModal" tabindex="-1"
         aria-labelledby="editDiscussionQuestionModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDiscussionQuestionModalLabel">Edit Discussion Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editDiscussionQuestionForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="question_container col-lg-12 col-sm-12  form-group">
                            <label for="Question">Question</label>
                            <textarea name="question" id="editedDiscussionQuestion" class="w-100" rows="3"
                                      required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="question_type" value="discussion">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{--Edit Closed Ended Question Modal--}}
    <div class="modal fade" id="editCloseEndedQuestionModal" tabindex="-1" aria-labelledby="editCloseEndedQuestionLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCloseEndedQuestionLabel">Edit Close Ended Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editCloseEndedQuestionForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="question_container col-lg-12 col-sm-12  form-group">
                            <label for="Question">Question</label>
                            <textarea name="question" id="CloseEndedQuestion" class="w-100" rows="3"
                                      required></textarea>
                        </div>
                        <div class="answers_container col-lg-12 col-sm-12  form-group">
                            <h6 class="text-bold">Answers <small>(Check the correct answer)</small></h6>
                            <div class="input-group mt-3 mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input class="is-answer" name="is_answer[]" value="a" type="checkbox">
                                    </div>
                                </div>
                                <input type="text" id="answerA" class="form-control" value="Answer A" required
                                       name="answers[]">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input class="is-answer" name="is_answer[]" value="b" type="checkbox">
                                    </div>
                                </div>
                                <input type="text" id="answerB" class="form-control" value="Answer B" required
                                       name="answers[]">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input class="is-answer" name="is_answer[]" value="c" type="checkbox">
                                    </div>
                                </div>
                                <input type="text" id="answerC" class="form-control" value="Answer C" required
                                       name="answers[]">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input class="is-answer" name="is_answer[]" value="d" type="checkbox">
                                    </div>
                                </div>
                                <input type="text" id="answerD" class="form-control" value="Answer D" required
                                       name="answers[]">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="question_type" value="close_ended">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Add Question Modal --}}
    <div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="addQuestionModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addQuestionModalLabel">Add New Question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addQuestionForm" action="{{ route('course-questions.store') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-lg-12 col-sm-12  form-group">
                            <label for="gender">Question Type</label>
                            <select style="padding:10px; width:100%" class="form-select form-select-lg mb-3"
                                    id="questionType" name="question_type">
                                <option value="close_ended">Close Ended</option>
                                <option selected value="discussion">Discussion</option>
                            </select>
                        </div>
                        <div class="question_container col-lg-12 col-sm-12  form-group">
                            <label for="Question">Question</label>
                            <textarea name="question" id="Question" class="w-100" rows="3" required></textarea>
                        </div>

                        <div style="display:none" class="answers_container col-lg-12 col-sm-12  form-group">
                            <h6 class="text-bold">Answers <small>(Check the correct answer)</small></h6>
                            <div class="input-group mt-3 mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input class="is-answer" name="is_answer[]" value="a" checked type="checkbox">
                                    </div>
                                </div>
                                <input type="text" class="form-control" value="Answer A" required name="answers[]">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input class="is-answer" name="is_answer[]" value="b" type="checkbox">
                                    </div>
                                </div>
                                <input type="text" class="form-control" value="Answer B" required name="answers[]">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input class="is-answer" name="is_answer[]" value="c" type="checkbox">
                                    </div>
                                </div>
                                <input type="text" class="form-control" value="Answer C" required name="answers[]">
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input class="is-answer" name="is_answer[]" value="d" type="checkbox">
                                    </div>
                                </div>
                                <input type="text" class="form-control" value="Answer D" required name="answers[]">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="" name="question_section_id" id="questionSectionId">
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

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
                        url: "/admin/course-sections/" + course_section_id,
                        type: "get",
                        success: function (response) {

                            $('#editedCourseSectionName').val(response.course_section.name);
                            $('#editedCourseDescription').text(response.course_section.description);
                            $('#editCourseSectionModal').modal('show');
                            $('#editCourseSectionForm').attr('action', '/admin/course-sections/' + response.course_section.id);

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


                //get and set quesion section id
                $(".addQuestionBtn").on('click', function () {
                    $('#questionSectionId').val($(this).attr('question_section_id'))
                    $('#addQuestionModal').modal('show');
                });

                //show answer container based on select value
                $('#questionType').on('change', function () {
                    let questionTypeValue = $('#questionType').find(":selected").val();
                    let answerContainer = $('.answers_container');
                    answerContainer.css('display', '');
                    if (!(questionTypeValue === 'close_ended')) {
                        answerContainer.css('display', 'none');
                    }
                })

                //allow user to check only one correct answer
                $('.is-answer').click(function () {
                    $('.is-answer').not(this).prop('checked', false);
                });

                //get course_section_lecture data for edit
                $(".editCourseLectureBtn").on('click', function () {

                    const course_lecture_id = $(this).attr('id');
                    console.log(course_lecture_id);

                    $.ajax({
                        url: "/admin/course-lectures/" + course_lecture_id,
                        type: "get",
                        success: function (response) {

                            $('#editedLectureName').val(response.course_lecture.name);
                            $('#editedLectureDescription').text(response.course_lecture.description);
                            $('#editLectureModal').modal('show');
                            $('#editLectureForm').attr('action', '/admin/course-lectures/' + response.course_lecture.id);

                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                });


                //get discussion question data for edit
                $(".editDiscussionQuestionBtn").on('click', function () {

                    const discussion_question_id = $(this).attr('discussion_question_id');
                    console.log(discussion_question_id);

                    $.ajax({
                        url: "/admin/course-questions/" + discussion_question_id,
                        type: "get",
                        success: function (response) {
                            $('#editedDiscussionQuestion').val(response.discussion_question[0].question);
                            $('#editDiscussionQuestionModal').modal('show');
                            $('#editDiscussionQuestionForm').attr('action', '/admin/course-questions/' + response.discussion_question[0].id);

                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                });


                //get close ended question data for edit
                $(".editCloseEndedQuestionBtn").on('click', function () {

                    const closed_ended_question_id = $(this).attr('closed_ended_question_id');
                    console.log(closed_ended_question_id);

                    $.ajax({
                        url: "/admin/course-questions/" + closed_ended_question_id,
                        type: "get",
                        success: function (response) {

                            $('#CloseEndedQuestion').val(response.close_ended_question[0].question);
                            $('#answerA').val(response.close_ended_question[0].options.a);
                            $('#answerB').val(response.close_ended_question[0].options.b);
                            $('#answerC').val(response.close_ended_question[0].options.c);
                            $('#answerD').val(response.close_ended_question[0].options.d);

                            $.each($(".is-answer"), function () {
                                if ($(this).val() === response.close_ended_question[0].options.is_answer) {
                                    $(this).prop("checked", true);
                                }
                            });

                            $('#editCloseEndedQuestionModal').modal('show');
                            $('#editCloseEndedQuestionForm').attr('action', '/admin/course-questions/' + response.close_ended_question[0].id);

                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                });

                //time out for alert messages
                setTimeout(function () {
                    $('#phpalert').alert('close');
                }, 3000);


                //progress bar
                $('#addLectureForm, #editLectureForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage + '%', function () {
                            return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (response) {

                        $('#addLectureModal').modal('hide');
                        $('#editLectureModal').modal('hide');
                        const alert = $('.request-alert');
                        alert.text(response.responseJSON.message);
                        alert.css("display", "");

                        new Promise(function (resolve, reject) {
                            setTimeout(function () {
                                alert.alert('close');
                                resolve();
                            }, 3000);
                        }).then(function (value) {
                            location.reload();
                        });
                    }

                });

            });
        </script>
    @endpush
@endsection
