@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<section class="blog_part section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card shadow-lg p-4 rounded-3 border-40" style="border-radius: 40px; margin-top: 40px;">
                    <div class="card-body text-center">
                        <h1 class="mb-4"><i class="fas fa-user-circle"></i> ข้อมูลส่วนตัว</h1>
                        <hr>
                        <p><strong><i class="fas fa-user"></i> ชื่อบัญชี:</strong>{{$user->name}}</p>
                        <p><strong><i class="fas fa-envelope"></i> อีเมล:</strong> {{$user->email}}</p>
                        <p><strong><i class="fas fa-id-card"></i> ชื่อ-นามสกุล:</strong> {{$user->full_name}}</p>
                        <p><strong><i class="fas fa-graduation-cap"></i> รหัสนักศึกษา:</strong> {{$user->student_id}}</p>
                        <p><strong><i class="fas fa-university"></i> คณะ:</strong> {{$user->faculty}}</p>
                    </div>
                </div>
        </div>
    </div>
</section>
@endsection