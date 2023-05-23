@extends('backend.layouts.body',['page_title' => 'Students'])

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="students" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->phone_number }}</td>
                                    <td>{{ $student->email }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
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
        </script>
    @endpush
@endsection
