@section('page_title')
    NgeblogID - Bookmark
@endsection
@section('breadcrumb')
    {{-- resources/views/home.blade.php --}}
    {{ Breadcrumbs::render('bookmark') }}
@endsection


<div>
    <div class="p-3 bg-white rounded">
        <header class="header">
            <h4 class="text-dark">Bookmark</h4>
        </header>
        <div class="row g-3 py-3 ">
            <div class="col">
                <div class="table-responsive">
                    <table class="table" style="width: 100%">
                        <thead>
                            <tr>
                                <th scope="col">Story Title</th>
                                <th scope="col">Created</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <a href="" class="text-dark">Apa Itu Laravel Livewire ?</a>
                                </td>
                                <td class="align-middle">Jan 25 2022</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-md rounded">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle"><a href=""class="text-dark">Saksikan Sinetron Cinta
                                        Setelah Cinta, Episode Sabtu 14 Januari
                                        2023 Malam Via Live Streaming SCTV di Sini</a> </td>
                                <td class="align-middle">Jan 25 2022</td>
                                <td>
                                    <a href="" class="btn btn-danger btn-md rounded">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
