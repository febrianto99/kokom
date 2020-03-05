@extends('layouts.admin')
@section('title')
    <title>List Bahan Tas</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Bahan Tas</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bahan Tas Baru</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('bahantas.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Bahan Tas</label>
                                    <input type="text" name="bahan_tas" class="form-control" required>
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
                            <h4 class="card-title">Bahan Tas</h4>
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
                                            <th>No</th>
                                            <th>Bahan Tas</th>
                                            <th>Slug</th>
                                            <th>Created At</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @forelse ($bahantas as $val)
                                        <tr>
                                        <td>{{$no++}}</td>
                                            <td><strong>{{ $val->bahan_tas}}</strong></td>

                                            <td>{{ $val->bahan_tas}}</td>

                                            <td>{{ $val->created_at->format('d-m-Y') }}</td>
                                            <td>

                                                <form action="{{ route('bahantas.destroy', $val->bahan_tas) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('bahantas.edit', $val->bahan_tas) }}" class="btn btn-warning btn-sm">Edit</a>
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
                            {!! $bahantas->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
