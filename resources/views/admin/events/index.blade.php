@extends('admin.layouts.body',['page_title' => 'Events'])

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
                        <h3 class="card-title">Events</h3>
                    </div>

                    <div class="col-3 pt-3 pl-3">
                        <!-- Button trigger modal -->
                        <button style="border:0px solid white; border-radius:0px; background-color: rgb(27, 184, 191);"
                                type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEventModal">
                            <i style="color:white; margin-right:3px;" class="nav-icon fa fa-plus-circle"></i>
                            Add Event
                        </button>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="events" class="table  table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td class="justify-content-start">
                                        {{ $event->title }}
                                    </td>
                                    <td class="justify-content-start">
                                        {{ $event->description }}
                                    </td>
                                    <td class="justify-content-start">
                                        {{ $event->event_date->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        <img src="images/event_images/{{ $event->image_url }}"
                                             style="margin-right:4px; border:2px solid white;"
                                             class="rounded-circle" width="50px" height="50px;"
                                             alt="avatar">
                                    </td>
                                    <td class="justify-content-start">
                                        <button class="btn editButton btn-xs btn-info" id="{{ $event->id }}">
                                            <i style="color:white;" class="nav-icon fa fa-xm fa-edit"></i>
                                            edit
                                        </button>
                                        <form style="display:inline;"
                                              action="{{ route('events.destroy',$event->id) }}" method="POST">
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
                                <th>Date</th>
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
    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventModalLabel">Add New Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createEventForm" action="{{ route('events.store') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseTitle">Event Title</label>
                            <input type="email" class="form-control" id="eventTitle" name="title"
                                   placeholder="Nursing">
                        </div>
                        <div class="form-group mt-4">
                            <label for="courseDescription">Event Description</label>
                            <textarea class="form-control" name="description" id="eventDescription"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="courseTitle">Event Date</label>
                            <input type="date" class="form-control" id="eventDate" name="event_date">
                        </div>
                        <div class="form-group">
                            <label for="courseImage" class="form-label">Event Image</label>
                            <input style="padding-bottom:40px;" class="form-control" name="image" type="file"
                                   id="eventImage">
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
    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editEventForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="courseTitle">Event Title</label>
                            <input type="email" class="form-control" id="editedEventTitle" name="title"
                                   placeholder="Nursing">
                        </div>
                        <div class="form-group mt-4">
                            <label for="courseDescription">Event Description</label>
                            <textarea class="form-control" name="description" id="editedEventDescription"
                                      rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="courseTitle">Event Date</label>
                            <input type="date" class="form-control" id="editedEventDate" name="event_date">
                        </div>
                        <div class="form-group">
                            <label for="eventImage" class="form-label">Event Image</label>
                            <input style="padding-bottom:40px;" class="form-control" name="image" type="file"
                                   id="editedEventImage">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="eventId" name="event_id" value="">
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
        {!! JsValidator::formRequest('App\Http\Requests\StoreEventRequest', '#createEventForm'); !!}
        {!! JsValidator::formRequest('App\Http\Requests\UpdateEventRequest', '#editEventForm'); !!}

        <script>
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                //get course data for edit
                $(".editButton").on('click', function () {

                    const event_id = $(this).attr('id');
                    $.ajax({
                        url: "/admin/events/" + event_id,
                        type: "get",
                        success: function (response) {
                            $('#editedEventTitle').val(response.event.title);
                            $('#editedEventDescription').text(response.event.description);
                            $('#editedEventDate').text(response.event.event_date);
                            $('#eventId').val(event_id);
                            $('#editEventForm').attr('action', '/admin/events/' + event_id);
                            $('#editEventModal').modal('show');
                        },
                        error: function (response) {
                            console.log(response);
                        }
                    });
                });


                //set data Table
                $("#events").DataTable({
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
