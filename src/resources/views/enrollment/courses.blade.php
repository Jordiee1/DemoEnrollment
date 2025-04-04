@extends('layouts.main')

@section('content')
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">

        </div>
        <div class="row">
            @foreach($userEnrollments as $enrollment)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <img src="{{ optional($enrollment->course->photo)->getUrl() ?? asset('img/no_image.png') }}" class="special_img" alt="">
                        <div class="special_cource_text">
                            @if($enrollment->course && $enrollment->course->disciplines)
                            @foreach($enrollment->course->disciplines as $discipline)
                                <a href="{{ route('courses.index') }}?discipline={{ $discipline->id }}" class="btn_4 mr-1 mb-1">{{ $discipline->name }}</a>
                            @endforeach
                        @endif
                        <h4>{{ optional($enrollment->course)->getPrice() ?? 'No Price Available' }}</h4>
                        @if($enrollment->course)
                        <a href="{{ route('courses.show', $enrollment->course->id) }}"><h3>{{ $enrollment->course->name }}</h3></a>
                    @endif
                    @if($enrollment->course)
                    <p>{{ Str::limit($enrollment->course->description, 100) }}</p>
                @endif
                @if($enrollment->course && $enrollment->course->institution)
                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{ optional($enrollment->course->institution->logo)->thumbnail ?? asset('img/no_image.png') }}" alt="" class="rounded-circle">
                                        <div class="author_info_text">
                                            <p>ผู้จัดกิจกรรม</p>
                                            <h5>
                                                @if($discipline)
                                                @if($enrollment->course && $enrollment->course->institution)
                                                <h5><a href="{{ route('courses.index') }}?institution={{ $enrollment->course->institution->id }}">{{ $enrollment->course->institution->name }}</a></h5>
                                            @endif                                            @endif
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="author_info">
                                <p>Status:</p>
                                <h5>{{ App\Enrollment::STATUS_RADIO[$enrollment->status] }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="float-right">
                    {{ $userEnrollments->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
