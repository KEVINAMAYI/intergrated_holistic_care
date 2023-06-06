@extends('admin.layouts.body',['page_title' => 'Basic Life Support'])

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Course Sections</h3>
                    </div>
                    <div class="col-3 pt-3 pl-3">
                        <!-- Button trigger modal -->
                        <button style="border:0px solid white; border-radius:0px; background-color: rgb(27, 184, 191);" type="button" data-toggle="modal" data-target="#addCourseSectionModal" class="btn btn-primary">
                            <i style="color:white; margin-right:3px;" class="nav-icon fa fa-plus-circle"></i>
                            Add Course Section
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="row card-header" id="headingOne">
                                    <div class="col-lg-9">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                <strong>Section 1. Nursing Fundamentals</strong>

                                            </button>
                                        </h2>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn  btn-xs btn-success" data-toggle="modal" data-target="#addLectureModal">
                                            <i style="color:white;" class="nav-icon fa fa-xm fa-plus-circle"></i>
                                            Add Lecture
                                        </button>
                                        <button class="btn editButton btn-xs btn-info" data-toggle="modal" data-target="#editCourseSectionModal">
                                            <i style="color:white;" class="nav-icon fa fa-xm fa-edit"></i>
                                            edit
                                        </button>

                                            <button type="submit" class="btn btn-xs btn-danger">
                                                <i style="color:white;" class="nav-icon fa fa-xs fa-trash"></i>
                                                Delete
                                            </button>
                                    </div>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                     data-parent="#accordionExample">
                                    <div class="card-body row">
                                            <div class="col-lg-10 pl-5">
                                                <strong>Lecture 101. </strong>Digestive System and the Microbiology
                                            </div>
                                            <div class="col-lg-2">
                                                <button class="btn editButton btn-xs btn-info"  data-toggle="modal" data-target="#editLectureModal">
                                                    <i style="color:white;" class="nav-icon fa fa-xm fa-edit"></i>
                                                    edit
                                                </button>

                                                <button type="submit" class="btn btn-xs btn-danger">
                                                    <i style="color:white;" class="nav-icon fa fa-xs fa-trash"></i>
                                                    Delete
                                                </button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="row card-header" id="headingOne">
                                    <div class="col-lg-9">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                                                    aria-controls="collapseTwo">
                                                <strong>Section 2. Physiology and Biology</strong>
                                            </button>
                                        </h2>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn  btn-xs btn-success" data-toggle="modal" data-target="#addLectureModal">
                                            <i style="color:white;" class="nav-icon fa fa-xm fa-plus-circle"></i>
                                            Add Lecture
                                        </button>
                                        <button class="btn editButton btn-xs btn-info" data-toggle="modal" data-target="#editCourseSectionModal">
                                            <i style="color:white;" class="nav-icon fa fa-xm fa-edit"></i>
                                            edit
                                        </button>

                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i style="color:white;" class="nav-icon fa fa-xs fa-trash"></i>
                                            Delete
                                        </button>
                                    </div>
                                </div>

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingOne"
                                     data-parent="#accordionExample">
                                    <div class="card-body row">
                                        <div class="col-lg-10 pl-5">
                                            <strong>Lecture 201. </strong>Digestive System and the Microbiology
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn editButton btn-xs btn-info" data-toggle="modal" data-target="#editLectureModal">
                                                <i style="color:white;" class="nav-icon fa fa-xm fa-edit"></i>
                                                edit
                                            </button>

                                            <button type="submit" class="btn btn-xs btn-danger">
                                                <i style="color:white;" class="nav-icon fa fa-xs fa-trash"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    {{-- Add Course Section Modal --}}
    <div class="modal fade" id="addCourseSectionModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseSectionLabel">Add Course Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createCourseForm" action="" method=""
                      enctype="multipart/form-data">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Edit Course Section Modal --}}
    <div class="modal fade" id="editCourseSectionModal" tabindex="-1" aria-labelledby="editCourseSectionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCourseSectionLabel">Edit Course Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editCourseForm" action="" method=""
                      enctype="multipart/form-data">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Edit Lecture Modal --}}
    <div class="modal fade" id="editLectureModal" tabindex="-1" aria-labelledby="editLectureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLectureModalLabel">Edit Lecture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createCourseForm" action="" method="POST"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseTitle">Lecture Title</label>
                            <input type="email" class="form-control" id="lectureTitle" name="title"
                                   placeholder="Digestion">
                        </div>
                        <div class="form-group mt-4">
                            <label for="lectureDescription">Lecture Description</label>
                            <textarea class="form-control" name="lecture_description" id="lectureDescription"
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
    <div class="modal fade" id="addLectureModal" tabindex="-1" aria-labelledby="addLectureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLectureModalLabel">Add New Lecture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createCourseForm" action="" method="POST"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseTitle">Lecture Title</label>
                            <input type="email" class="form-control" id="lectureTitle" name="title"
                                   placeholder="Digestion">
                        </div>
                        <div class="form-group mt-4">
                            <label for="lectureDescription">Lecture Description</label>
                            <textarea class="form-control" name="lecture_description" id="lectureDescription"
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
    @endpush
@endsection
