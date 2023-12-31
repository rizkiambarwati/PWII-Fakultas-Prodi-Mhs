    @extends('layout.main')
    @section('title', 'Mahasiswa')

    @section('content')

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mahasiswa</h4>
                        <p class="card-description">
                            Daftar Mahasiswa di Universitas Multi Data Palembang
                        </p>

                        @can('create', App\Prodi::class)
                            <a href="{{ route('mahasiswa.create') }}" class= "btn btn-primary btn-rounded btn-fw">Tambah</a>
                        @endcan

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>NPM</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Foto</th>
                                        <th>Program Studi</th>
                                        <th>Fakultas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswa as $item)
                                        <tr>
                                            <td>{{ $item['npm'] }}</td>
                                            <td>{{ $item['nama'] }}</td>
                                            <td>{{ $item['tempat_lahir'] }}</td>
                                            <td>{{ $item['tanggal_lahir'] }}</td>
                                            <td>{{ $item['jk'] }}</td>
                                            <td>
                                                <img src="images/{{ $item['foto'] }}" class="rounded-circle"
                                                    width="100px" />
                                            </td>
                                            <td>{{ $item['prodi']['nama'] }}</td>
                                            <td>{{ $item['prodi']['fakultas']['nama'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">

                                                    @can('update', $item)
                                                        <a href="{{ route('mahasiswa.edit', $item->id) }}">
                                                            <button class="btn btn-success btn-sm mx-3">Edit</button>
                                                        </a>
                                                    @endcan

                                                    <form method="post"
                                                        action="{{ route('mahasiswa.destroy', $item->id) }}">
                                                        @method('delete')
                                                        @csrf

                                                        @can('delete', $item)
                                                            <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                                                data-toggle="tooltip" title='Delete'
                                                                data-nama='{{ $item->nama }}'">Delete</button>
                                                        @endcan

                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                </tbody>
                                <tbody>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('scripts')
        <script>
            @if (Session::get('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif
        </script>
    @endsection
