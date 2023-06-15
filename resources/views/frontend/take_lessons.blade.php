<!doctype html>
<html lang="en">
<head>
    <title>Sidebar 02</title>
    <meta charset="utf-8">
    <base href="{{ URL::to('/') }}">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
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
                               class="dropdown-bs-toggle"><strong>Sect {{ $loop->iteration  }}: {{$section->name}}</strong> <i
                                    style="color:white; margin-left:3px; display:inline;"
                                    class="nav-icon fa fa-sm fa-plus-circle"></i>
                            </a>
                            <ul class="collapse list-unstyled" id="section{{ $loop->iteration }}Menu">
                                @foreach($section->lectures as $lecture)
                                    <li>
                                        <span style="cursor:pointer;" class="pb-3 pt-2 lesson"
                                              title="{{ $lecture->name }}"
                                              file_name="{{ $lecture->url }}"
                                        >Lec {{ $section_number }}0{{ $loop->iteration }}
                                            : {{ $lecture->name }}</span>
                                    </li>
                                @endforeach
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
                $('.lectureVideo').bind('contextmenu',function(){ return false; });
            }

            if (fileExtension === 'pdf' || fileExtension === 'pptx') {
                let fileSource = 'https://docs.google.com/gview?url=https://integratedholisticcare.org//course_lectures/' + fileName + '&embedded=true'
                $('.pdfFileIFrame').attr('src', fileSource);
                $('#content video').css('display', 'none');
                $('#content video')[0].pause();
            }


        });
    });

</script>

</script>
</body>
</html>
