@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<img src="http://localhost:8080/img/bg_hompage.png" class="banner-img" alt="Homepage Banner" style="/* position: relative; */ overflow: hidden; object-fit: cover; position: absolute;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center animate__animated animate__fadeInUp animate__slow">
                    <p>New Activities</p>
                    <h2>กิจกรรมใหม่ เร็วๆนี้!</h2>
                </div>
            </div>
        </div>

        @php
            $course = $newestCourses->sortByDesc('id')->first();
        @endphp

        @if($course)
        <div class="row d-flex align-items-center animate__animated animate__fadeInLeft animate__slower" style="margin-bottom: 100px;">
            <div class="col-md-6">
                <img src="{{ optional($course->photo)->getUrl() ?? asset('img/no_image.png') }}" class="img-fluid rounded shadow-lg" alt="{{ $course->name }}">
            </div>
            <div class="col-md-6">
                <div class="special_cource_text">
                    <a href="{{ route('courses.show', $course->id) }}">
                        <h2>{{ $course->name }}</h2>
                    </a>
                    <p style="color: black">{{ Str::limit($course->description, 200) }}</p>
                    @if($course->institution)
                    <div class="author_info d-flex align-items-center mt-4">
                        <img src="{{ optional($course->institution->logo)->thumbnail ?? asset('img/no_image.png') }}" alt="" class="rounded-circle me-3" width="50">
                        <div class="author_info_text">
                            <p style="color: rgb(121, 121, 121); margin-left: 20px">ผู้จัดกิจกรรม</p>
                            <h5><a href="{{ route('courses.index') }}?institution={{ $course->institution->id }}" style="color: black; margin-left: 20px">{{ $course->institution->name }}</a></h5>
                        </div>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between align-items-center w-100 mt-4">
                        <a href={{ route('courses.show', $course->id) }} class="btn_4 d-flex align-items-center justify-content-center animate__animated animate__pulse animate__infinite animate__slow">
                            <h3 class="mb-0" style="margin-top: 10px;">ลงทะเบียนเข้าร่วม &gt;</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="row" style="margin-bottom: 100px;">
            @foreach($newestCourses as $course)
            <div class="col-sm-6 col-lg-4 animate__animated animate__fadeInUp animate__slower">
                <div class="single_special_cource" style="margin-top:60px">
                    <img src="{{ optional($course->photo)->getUrl() ?? asset('img/no_image.png') }}" class="special_img" alt="">
                    <div class="special_cource_text">
                        <a href="{{ route('courses.show', $course->id) }}"><h3>{{ $course->name }}</h3></a>
                        <p>{{ Str::limit($course->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center w-100 mt-4">
                            <button class="btn favorite-btn d-flex align-items-center justify-content-center">
                                <i class="fas fa-heart"></i>
                            </button>
                            <a href={{ route('courses.show', $course->id) }} class="btn_4 d-flex align-items-center justify-content-center">
                                <h3 class="mb-0" style="margin-top: 10px;">ลงทะเบียนเข้าร่วม &gt;</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.favorite-btn').on('click', function() {
            $(this).toggleClass('text-danger');
        });

        $(window).on('scroll', function() {
            $('.animate-on-scroll').each(function() {
                var position = $(this).offset().top;
                var windowTop = $(window).scrollTop() + $(window).height();
                if (position < windowTop) {
                    $(this).addClass('animate__animated animate__fadeInUp animate__slow');
                }
            });
        });
    });
</script>
@endsection
