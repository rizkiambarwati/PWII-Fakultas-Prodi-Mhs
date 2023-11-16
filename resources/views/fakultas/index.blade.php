@extends('layout.main')
@section('title', 'Fakultas')

@section('content')
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Fakultas</h4>
                  <p class="card-description">
                    Daftar Fakultas di Universitas Multi Data Palembang
                  </p>
                  <a href="{{ route('fakultas.create') }}" class= "btn btn-primary btn-rounded btn-fw">Tambah</a>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                         <tr>
                            <th>Nama Fakultas</th>
                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($fakultas as $item)
                         <tr>
                            <td>{{ $item['nama']}}</td>
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


