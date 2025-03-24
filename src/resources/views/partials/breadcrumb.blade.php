<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>{{ $breadcrumb }}</h2>
                        <p><a href="{{ route('home') }}"  style="color: white">หน้าหลัก</a><span>/</span><a href="{{ url()->current() }}"  style="color: white">กิจกรรมทั้งหมด</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
