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
                   <a href="{{ route('mahasiswa.create') }}" class= "btn btn-primary btn-rounded btn-fw">Tambah</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Foto</th>
                            <th>Nama Prodi</th>
                            <th>Nama Fakultas</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($mahasiswa as $item)
                        <tr>
                            <td>{{ $item['npm']}}</td>
                            <td>{{ $item['nama']}}</td>
                            <td>{{ $item['tempat_lahir']}}</td>
                            <td>{{ $item['tanggal_lahir']}}</td>
                            <td><img src="images/{{ $item['foto'] }}" class="rounded-circle" width="100px"/></td>
                            <td>{{ $item['prodi']['nama']}}</td>
                            <td>{{ $item['prodi']['fakultas']['nama']}}</td>
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
