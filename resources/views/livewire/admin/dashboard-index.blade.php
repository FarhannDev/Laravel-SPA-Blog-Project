<div class="card rounded bg-white">
    <div class="card-header">
        <h5 class="text-dark">Dashboard</h5>
    </div>
    <div class="card-body">
        <div class="row justify-content-start">
            <div class="col">
                <h3 class="text-dark fw-bolder text-capitalize">
                    Welcome Back, {{ \Auth::user()->name }}
                </h3>
            </div>
        </div>
    </div>
</div>
