@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<section class="blog_part section_padding">
    <div class="container">
        <div class="row justify-content-center footer-section">
            <h1>ข้อมูลส่วนตัว</h1>
            <div class="col-xl-12">

                <p> ชื่อบัญชี: {{ $user->name }} </p>
                <p> อีเมล: {{ $user->email }} </p>
                <p> ชื่อ-นามสกุล: {{ $user->full_name }} </p>
                <p> รหัสนักศึกษา: {{ $user->student_id }} </p>
                <p> คณะ: {{ $user->faculty }} </p>

            </div>
        </div>

        <div class="row justify-content-center">
            <h1>กิจกรรมที่กดสนใจ</h1>
        </div>

    </div>
</section>
@endsection