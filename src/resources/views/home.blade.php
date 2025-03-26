@extends('layouts.main')

@section('content')
<img src="http://localhost:8080/img/bg_hompage.png" class="banner-img" alt="Homepage Banner" style="/* position: relative; */ overflow: hidden; object-fit: cover; position: absolute;">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>New Activities</p>
                    <h2>กิจกรรมใหม่ เร็วๆนี้!</h2>
                </div>
            </div>
        </div>

        @php
    // ค้นหากิจกรรมที่มี ID มากที่สุด
    $course = $newestCourses->sortByDesc('id')->first();
@endphp

@if($course)
<div class="row d-flex align-items-center" style="margin-bottom: 100px;">
    <!-- ซ้าย: รูปภาพขนาดใหญ่ -->
    <div class="col-md-6">
        <img src="{{ optional($course->photo)->getUrl() ?? asset('img/no_image.png') }}" class="img-fluid rounded" alt="{{ $course->name }}">
    </div>

    <!-- ขวา: รายละเอียดกิจกรรม -->
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
                    <p  style="color: rgb(121, 121, 121) ; margin-left: 20px">ผู้จัดกิจกรรม</p>
                    <h5><a href="{{ route('courses.index') }}?institution={{ $course->institution->id }}" style="color: black ; margin-left: 20px">{{ $course->institution->name }}</a></h5>
                </div>
            </div>
            @endif

            <!-- ปุ่มลงทะเบียน -->
            <div class="d-flex justify-content-between align-items-center w-100" style="margin-top: 25px;">


                <!-- ปุ่มลงทะเบียน -->
                <a href={{ route('courses.show', $course->id) }} class="btn_4 d-flex align-items-center justify-content-center">
                    <h3 class="mb-0" style="margin-top: 10px;">ลงทะเบียนเข้าร่วม &gt;</h3>                                    </a>
        </div>

        </div>
    </div>
</div>
@endif



    <div class="row" style="margin-bottom: 100px;">
        @foreach($newestCourses as $course)
            <div class="col-sm-6 col-lg-4">
                <div class="single_special_cource">
                    <img src="{{ optional($course->photo)->getUrl() ?? asset('img/no_image.png') }}" class="special_img" alt="">
                    <div class="special_cource_text">

                        <a href="{{ route('courses.show', $course->id) }}"><h3>{{ $course->name }}</h3></a>
                        <p>{{ Str::limit($course->description, 100) }}</p>


                        <div class="d-flex justify-content-between align-items-center w-100" style="margin-top: 25px;">
                            <!-- ปุ่มกดถูกใจ -->
                            <button class="btn favorite-btn d-flex align-items-center justify-content-center">
                                <i class="fas fa-heart"></i>
                            </button>

                            <!-- ปุ่มลงทะเบียน -->
                            <a href={{ route('courses.show', $course->id) }} class="btn_4 d-flex align-items-center justify-content-center">
                                <h3 class="mb-0" style="margin-top: 10px;">ลงทะเบียนเข้าร่วม &gt;</h3>                                    </a>
                    </div>

                        @if($course->institution)
                            <div class="author_info">
                                <div class="author_img">
                                    <img src="{{ optional($course->institution->logo)->thumbnail ?? asset('img/no_image.png') }}" alt="" class="rounded-circle">
                                    <div class="author_info_text">
                                        <p>ผู้จัดกิจกรรม</p>
                                        <h5><a href="{{ route('courses.index') }}?institution={{ $course->institution->id }}">{{ $course->institution->name }}</a></h5>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <a class="" style="color: black" href="http://localhost:3000">กิจกรรมทั้งหมด-></a> --}}

</section>

<section class="blog_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p>ผู้จัดกิจกรรม</p>
                    <h2>องค์กรผู้นำ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($randomInstitutions as $institution)
                <div class="col-sm-6 col-lg-3 col-xl-3">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="{{ optional($institution->logo)->url ?? asset('img/no_image.png') }}" class="card-img-top" alt="{{ $institution->name }}">
                            <div class="card-body">
                                <a href="{{ route('courses.index') }}?institution={{ $institution->id }}">
                                    <h5 class="card-title">{{ $institution->name }}</h5>
                                </a>
                                <p>{{ Str::limit($institution->description, 100) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
