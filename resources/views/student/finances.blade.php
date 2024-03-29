@extends('student.layouts.body',['page_title' => 'Payments'])

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
                        <h3 class="card-title">Payment Details</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="studentFinances" class="table  table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Amount</th>
                                <th>Transaction ID</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="justify-content-start">
                                </td>
                                <td class="justify-content-start">
                                </td>
                                <td class="justify-content-start">
                                </td>
                                <td>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Amount</th>
                                <th>Transaction ID</th>
                                <th>Date</th>
                                <th>Amount</th>
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
                $("#studentFinances").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#studentFinances_wrapper .col-md-6:eq(0)');

            });
        </script>
    @endpush
@endsection
