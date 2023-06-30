<!doctype html>
<html lang="en">
<head>
    <title>Sidebar 02</title>
    <meta charset="utf-8">
    <base href="{{ URL::to('/') }}">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ URL("plugins/font-awesome-4.7.0/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL("styles/bootstrap4/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ URL("styles/take_lessons.css") }}">
    <link href="{{URL("plugins/video-js/video-js.css")}}" rel="stylesheet" type="text/css">
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet"/>

</head>
<body>

<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
                <i class="fa fa-bars"></i>
                <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
        <div class="p-4 pt-0">
            <h5 style="font-weight:bold;" class="text-white text-bold">{{ $course->title }}</h5>
            <ul class="list-unstyled components mb-5">
                @foreach($course->sections as $section)
                    <li class="{{ $loop->iteration == 1 ? 'active' : ''}}">
                        <div class="row">
                            <a style="" href="#section{{ $section_number = $loop->iteration  }}Menu"
                               data-toggle="collapse" aria-expanded="false"
                               class="dropdown-bs-toggle"><strong>Sect {{ $loop->iteration  }}
                                    : {{$section->name}}</strong> <i
                                    style="color:white; margin-left:3px; display:inline;"
                                    class="nav-icon fa fa-sm fa-plus-circle"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="section{{ $loop->iteration }}Menu">
                                @foreach($section->lectures as $lecture)
                                    <li>
                                        <span style="cursor:pointer;" class="pb-3 pt-2 lesson"
                                              title="{{ $lecture->name }}"
                                              file_name="{{ $lecture->url }}"
                                        ><i class="fa fa-tv mr-2"></i>
                                            Lec {{ $section_number }}0{{ $loop->iteration }}
                                            : {{ $lecture->name }}</span>
                                    </li>
                                @endforeach
                                <div class="getSectionQuestionsBtn" questions_section_id="{{ $section->id }}">
                                    <span
                                        style="cursor:pointer;" class="pb-3 pt-2"><i
                                            class="fa fa-question-circle mr-2"></i>Questions</span>
                                </div>
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="mb-5"></div>
            <div class="footer"></div>
        </div>
    </nav>

    {{--Page Content--}}
    <div id="content" class="p-4 p-md-5 pt-5">

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        <h2 id="lessonTitle" class="mb-4">{{ $course->title }}</h2>
        <video
            id="my-video"
            class="video-js lectureVideo"
            controls="true"
            controlsList="nodownload"
            width="640"
            height="264"
        >

            <source src="" type="video/mp4"/>
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank"
                >supports HTML5 video</a
                >
            </p>
        </video>

        <iframe class="pdfFileIFrame mt-2"
                src=""
                style="width:100%; height:500px;" frameborder="0">Read
        </iframe>

        <form id="answerForm" method="POST" action="{{ route('store-user-results') }}">
            @csrf
            <div style="display:none" class="sectionQuestion row">
                <div class="col-12">
                    {{--closed ended questions--}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Multiple Choices Questions</h5>
                        </div>
                        <div class="closeEndedQuestionSection card-body">
                        </div>
                    </div>

                    {{--open ended questions--}}
                    <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title">Discussion Questions</h5>
                        </div>
                        <div class="openEndedQuestionSection card-body">

                        </div>
                    </div>

                    <button type="submit" class="mt-4 btn btn-success btn-md">
                        Submit Answers
                    </button>


                </div>
            </div>
        </form>

    </div>
</div>

<script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>
<script src="{{ URL("js/jquery-3.2.1.min.js") }}"></script>
<script src="{{ URL("styles/bootstrap4/popper.js") }}"></script>
<script src="{{ URL("styles/bootstrap4/bootstrap.min.js") }}"></script>
<script src="{{ URL("styles/bootstrap4/bootstrap.min.js") }}"></script>
<script src="{{ URL("js/main.js")  }}"></script>
<script src="{{ URL("plugins/video-js/video.min.js") }}"></script>
<script src="{{ URL("plugins/video-js/Youtube.min.js") }}"></script>


<script>

    //get lesson file Name and lesson Title
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".lesson").on('click', function () {
            const fileName = $(this).attr('file_name');
            $('#lessonTitle').text($(this).attr('title'))
            fileExtension = fileName.split('.').pop();

            if (fileExtension === 'mp4') {
                let videoSource = 'course_lectures/' + fileName;
                let video = $('#content video');
                $('source', video).attr('src', videoSource);
                video[0].load();
                video[0].play();
                $('.lectureVideo').bind('contextmenu', function () {
                    return false;
                });
                $('#content video').css('display', '');
                $('.pdfFileIFrame').css('display', 'none');
                $('.sectionQuestion').css('display', 'none');
            }

            if (fileExtension === 'pdf' || fileExtension === 'pptx') {
                let fileSource = 'https://docs.google.com/gview?url=https://integratedholisticcare.org//course_lectures/' + fileName + '&embedded=true'
                $('.pdfFileIFrame').attr('src', fileSource);
                $('#content video').css('display', 'none');
                $('#content video')[0].pause();
                $('.pdfFileIFrame').css('display', '');
                $('.sectionQuestion').css('display', 'none');

            }
        });


        //get section questions
        $(".getSectionQuestionsBtn").on('click', function () {

            console.log('sfsfsdsrsdf');

            const course_section_id = $(this).attr('questions_section_id');
            $('#questionSectionId').val(course_section_id);

            $.ajax({
                url: "/get-section-questions/" + course_section_id,
                type: "get",
                success: function (response) {

                    let closeEndedQuestions = response.closed_ended_questions;
                    let openEndedQuestions = response.open_ended_questions;
                    $('input').remove();

                    $('#content video').css('display', 'none');
                    $('#content video')[0].pause();
                    $('.pdfFileIFrame').css('display', 'none');
                    $('.sectionQuestion').css('display', '');
                    $('#lessonTitle').text('Questions');
                    $(".closeEndedQuestionSection").empty();
                    $(".openEndedQuestionSection").empty();

                    closeEndedQuestions.forEach((closeEndedQuestion, index) => {
                        $(".closeEndedQuestionSection").append(`<div class='mb-4'>
                            <h5>${index + 1}. ${closeEndedQuestion.question}</h5>
                            <div class='container'>
                            <ul class='list-group'>
                                <li style="cursor:pointer" answer_label='a' question='${closeEndedQuestion.id}' answer_for='question${closeEndedQuestion.id}' class="question${closeEndedQuestion.id} list-group-item">${closeEndedQuestion.options.a}</li>
                                <li style="cursor:pointer" answer_label='b' question='${closeEndedQuestion.id}' answer_for='question${closeEndedQuestion.id}' class="question${closeEndedQuestion.id} list-group-item">${closeEndedQuestion.options.b}</li>
                                <li style="cursor:pointer" answer_label='c' question='${closeEndedQuestion.id}' answer_for='question${closeEndedQuestion.id}' class="question${closeEndedQuestion.id} list-group-item">${closeEndedQuestion.options.c}</li>
                                <li style="cursor:pointer" answer_label='d' question='${closeEndedQuestion.id}' answer_for='question${closeEndedQuestion.id}' class="question${closeEndedQuestion.id} list-group-item">${closeEndedQuestion.options.d}</li>
                            </ul>
                            </div> </div>`);
                    });

                    openEndedQuestions.forEach((openEndedQuestion, index) => {
                        $(".openEndedQuestionSection").append(`<div class='mb-4'>
                            <h5>${index + 1}. ${openEndedQuestion.question}</h5>
                            <div class='container'>
                            <textarea name="open_ended_answers[${openEndedQuestion.id}]" style="width:100%;" rows="4"></textarea>

                            </div> </div>`);
                    });

                    $(".closeEndedQuestionSection").append(`<input type="hidden" name="section_id" value="${course_section_id}">`)
                },
                error: function (response) {
                    console.log(response);
                }
            });
        });

        $(document).on('click', 'li', function () {
            let questionLabel = $(this).attr('answer_for');
            let userAnswer = $(this).attr('answer_label');
            let question = $(this).attr('question');
            $(`.${questionLabel}`).removeClass('active');
            $(this).addClass('active');

            //remove if such an input answer exists
            $(`#answerFor_${questionLabel}`).remove();

            //set user answer behind the scenes
            $('#answerForm').append(`
             <input id='answerFor_${questionLabel}' type='hidden' name='closed_question_answers[${question}]' value="${userAnswer}"/>
            `);

        });

        setTimeout(function () {
            $('.alert').alert('close');
        }, 3000);

    });

</script>
</body>
</html>
