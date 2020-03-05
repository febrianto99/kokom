@extends('layouts.admin')
@section('title')
    <title>List Jenis Tas</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Jenis Tas</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jenis Tas Baru</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('jenistas.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Jenis Tas</label>
                                    <input type="text" name="jenis_tas" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jenis Tas</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Jenis Tas</th>
                                            <th>Slug</th>
                                            <th>Created At</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @forelse ($jenistas as $val)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td><strong>{{ $val->jenis_tas}}</strong></td>

                                            <td>{{ $val->jenis_tas}}</td>

                                            <td>{{ $val->created_at->format('d-m-Y') }}</td>
                                            <td>

                                                <form action="{{ route('jenistas.destroy', $val->jenis_tas) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('jenistas.edit', $val->jenis_tas) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $jenistas->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
