@role('admin')
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('bahantas.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                    <br>
                                    <div class="from-group-inner">
                                            <label>Nama Tas</label>
                                            <input name="nama_tas" type="text" class="form-control" required/>
                                    </div>
                                    <br>
                                    <div class="from-group-inner">
                                            <label>Bahan Tas</label>
                                            <input name="bahan_tas" type="text" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="button-demo">
                            <button type="submit" class="btn btn-success  btn-lg waves-effect" onclick="return confirm('Are you sure you want to save?')">
                            Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endrole
