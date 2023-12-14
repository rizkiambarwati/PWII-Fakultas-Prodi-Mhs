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

                    @if (Auth::user()->role == 'A')
                        <a href="{{ route('fakultas.create') }}" class= "btn btn-primary btn-rounded btn-fw">Tambah</a>
                    @endif

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
                                        <td>{{ $item['nama'] }}</td>

                                        <td>
                                            <div class="d-flex justify-content-center">

                                                @if (Auth::user()->role == 'A')
                                                    <a href="{{ route('fakultas.edit', $item->id) }}">
                                                        <button class="class btn btn-success btn-sm mx-3">Edit</button>

                                                        <a href="{{ route('fakultas.edit', $item->id) }}">
                                                            <form method="post"
                                                                action="{{ route('fakultas.destroy', $item->id) }}">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm show_confirm"
                                                                    data-toggle="tooltip" title='Delete'
                                                                    data-nama='{{ $item->nama }}'>Delete</button>
                                                            </form>
                                                        </a>
                                                @endif
                                                </a>
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
