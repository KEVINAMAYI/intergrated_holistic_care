@extends('student.layouts.body',['page_title' => 'Courses'])

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="backend/dist/css/progress_bar.css">
@endpush

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Courses</h3>
                    </div>

                    <div class="card-body">
                        <div class="row pl-5 pr-5 justify-content-between">
                            @foreach($student_courses as $course)
                                <div class="card  col-lg-5 col-md-6 col-sm-12">
                                    <img src="{{ asset('images/course_images/'.$course->image_url) }}"
                                         class="mt-2 card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title text-bold mb-2">{{ $course->title }}</h6>
                                        <p class="card-text">{{ $course->description }} </p>
                                        <div class="circles row justify-content-center">
                                            <div id="{{ $course->id }}" class="first circle">
                                                <strong></strong>
                                                <span
                                                    style="color:black; font-weight:bold; font-size:20px;"> progress</span>
                                            </div>
                                        </div>
                                        @if($student_courses_progress[$course->id] == 100)
                                            <button class="btn btn-success">Completed</button>
                                        @else
                                            <a href="{{ route('take-lessons',$course->id) }}" class="btn btn-primary">Continue</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function () {
                const coursesProgress = {!! json_encode($student_courses_progress) !!};
                $.each(coursesProgress, function (index, value) {
                    $(`#${index}`).circleProgress({
                        value: value / 100,
                        fill: {gradient: ['#0681c4', '#4ac5f8']},
                        thickness: 20
                    }).on('circle-animation-progress', function (event, progress, stepValue) {
                        $(this).find('strong').text(parseInt(stepValue.toFixed(2) * 100) + '%');
                    });
                });
            })
        </script>

    @endpush

@endsection
