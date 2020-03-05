@extends('layouts.admin')

@section('title')
    <title>Tambah Produk</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">detailtas</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <form action="{{ route('detailtas.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Produk</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Tas</label>
                                    <input type="text" name="namatas" class="form-control" value="{{ old('namatas') }}" required>
                                    <p class="text-danger">{{ $errors->first('namatas') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>

                                    <!-- TAMBAHKAN ID YANG NNTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                                    <textarea name="description" id="ck" class="form-control">{{ old('description') }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="1" {{ old('status') == '1' ? 'selected':'' }}>Publish</option>
                                                <option value="0" {{ old('status') == '0' ? 'selected':'' }}>Draft</option>
                                            </select>
                                            <p class="text-danger">{{ $errors->first('status') }}</p>
                                        </div>
                                <div class="form-group">
                                    <label for="jenistas">Jenis Tas</label>

                                    <select name="jenis_tas" class="form-control">
                                        <option value="">-</option>
                                        @foreach ($jenistas as $row)
                                        <option value="{{ $row->id }}">{{ $row->jenis_tas }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('jenis_tas') }}</p>
                                </div>
                                <div class="form-group">
                                        <label for="bahantas">Bahan Tas</label>

                                        <select name="bahan_tas" class="form-control">
                                            <option value="">-</option>
                                            @foreach ($bahantas as $row)
                                            <option value="{{ $row->id }}">{{ $row->bahan_tas }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('bahan_tas') }}</p>
                                    </div>
                                <div class="form-group">
                                    <label for="price">Harga</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" value="{{ old('image') }}" required>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<script src="{{asset('/ck/ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace('ck');
</script>
@endsection
