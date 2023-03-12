@section('page_title')
    Dashboard
@endsection

@section('breadcrumb')
    {{-- resources/views/home.blade.php --}}
    {{ Breadcrumbs::render('dashboard') }}
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span>Blank</span></li>
        </ol>
    </nav> --}}
@endsection


<div>
    <div class="card shadow rounded bg-white">
        <header class="header p-3">
            <div class="text-dark text-capitalize ">
                <h5>Dashboard</h5>
            </div>
            <a href="{{ url('/') }}" class="text-dark text-decoration-none">Kembali Halaman Utama</a>
        </header>
        <div class="card-body mb-3">
            <div class="dashboard-container">
                <div class="dashboard-inner__header mb-3">
                    <h5 class="text-capitalize fw-normal">Selamat Datang Kembali,{{ \Auth::user()->name }}.</h5>
                </div>
                <div class="dashboard-inner__content">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6">
                            <div class="card mb-4">
                                <div
                                    class="card-header bg-dark text-white position-relative d-flex justify-content-center align-items-center">
                                    Postingan
                                </div>
                                <div class="card-body row text-center">
                                    <div class="col">
                                        <div class="fs-5 fw-semibold">{{ $total_posts }}</div>
                                        <div class="text-uppercase text-medium-emphasis small">Total Semua Postingan
                                        </div>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="col">
                                        <div class="fs-5 fw-semibold">{{ $total_post_unpublish }}</div>
                                        <div class="text-uppercase text-medium-emphasis small">Postingan Tersimpan</div>
                                    </div>
                                    <div class="col">
                                        <div class="fs-5 fw-semibold">{{ $total_post_publish }}</div>
                                        <div class="text-uppercase text-medium-emphasis small">Postingan Publish</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
