<div class="card shadow bg-white rounded">
    <div class="card-header">
        <h4>Daftar Story</h4>
    </div>
    <div class="card-body">
        <div class="p-2">
            <div class="row align-content-start">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Dibuat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stories as $index => $story)
                                    <tr>
                                        <th class="align-middle">{{ $index + 1 }}</th>
                                        <th class="align-middle col-6"><a class="text-dark"
                                                href="{{ route('story.detail', [$story->user->username, $story->post_slug]) }}">{{ $story->post_title }}</a>
                                        </th>
                                        <th class="align-middle">{{ $story->publish_by }}</th>
                                        <th class="align-middle">{{ $story->status }}</th>
                                        <th class="align-middle">
                                            {{ date('d/m/Y H:i:s', strtotime($story->created_at)) }}</th>
                                        <th class="align-middle">
                                            <button type="button"
                                                class="btn btn-md btn-danger rounded text-white">Hapus</button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
