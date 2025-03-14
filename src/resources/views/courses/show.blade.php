@extends('layouts.main')

@section('content')

<section class="course_details_area section_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course_details_left">
                <div class="main_image">
                    <img class="img-fluid" src="{{ optional($course->photo)->getUrl() ?? asset('img/no_image.png') }}" alt="">
                </div>
                <div class="content_wrapper">
                    <h4 class="title_top">รายละเอียดกิจกรรม</h4>
                    <div class="content" style="white-space: pre-line";>
                        {{ $course->description ?? 'No description provided' }}
                    </div>
                </div>
            </div>


            <div class="col-lg-4 right-contents">
                <div class="sidebar_top">
                    <ul>
                        @if($course->institution)
                            <li>
                                <a class="justify-content-between d-flex">
                                    <p>ผู้จัดกิจกรรม</p>
                                    <span class="color">{{ $course->institution->name }}</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a class="justify-content-between d-flex">
                                <p>ค่าใช้จ่าย</p>
                                <span>{{ $course->getPrice() }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="justify-content-between d-flex">
                                <p>วันที่จัดกิจกรรม</p>
                                <span>{{ $course->date}}</span>
                            </a>
                        </li>
                    </ul>
                    <a href="{{ route('enroll.create', $course->id) }}" class="btn_1 d-block">ลงทะเบียนล่วงหน้า</a>
                    <a href="{{ route('enroll.create', $course->id) }}" class="btn_3 d-block">สนใจเข้าร่วมกิจกรรม</a>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
