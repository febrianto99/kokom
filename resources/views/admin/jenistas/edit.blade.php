@extends('layouts.admin')

@section('title')
    <title>Edit Jenis Tas</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Edit Jenis Tas</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Jenis Tas</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('jenistas.update', $jenistas->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="jenis_tas">Jenis Tas</label>
                                    <input type="text" jenis_tas="jenis_tas" class="form-control" value="{{ $jenistas->jenis_tas }}" required>
                                    <p class="text-danger">{{ $errors->first('jenis_tas') }}</p>
                                </div>

                                        <option value="{{ $row->id }}" {{ $jenistas->slug == $row->id ? 'selected':'' }}>{{ $row->jenis_tas }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('jenis_tas') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
