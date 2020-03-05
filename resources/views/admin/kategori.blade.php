@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Kategori</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
        <div class="card-body">
            <a class="btn btn-primary" href="javascript:void(0)" id="tambahdata">
            Tambah Data
            </a>
            <br/>
            <br/>
            <table class="table table-bordered datatable" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th width="10px">No</th>
                    <th>Nama</th>
                    <th>Slug</th>
                    <th width="90px">Opsi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<!-- {{-- modal mulai --}} -->
<div class="modal fade" id="modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Bagian header modal-->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">
                    <img src="{{ asset('assets/backend/open-iconic/svg/x.svg') }}">
                </button>
            </div>
            <!-- Akhir Bagian header modal-->
            <!-- Bagian Body Modal-->
            <div class="modal-body">
                <!-- Form-->
                <form id="form" name="form" class="form-horizontal">
                    <input type="hidden" name="kategori_id" id="kategori_id">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label for="name" class="control-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kategori" maxlength="50" autocomplete="off" required>
                            <span style="color: red;" id="error_nama"></span>
                            <br>
                        </div>
                    </div>
                </form>
                <!-- Akhir Form-->
            </div>
            <!-- modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="btn btn-danger pull-left"
                id="reset">Batal</button>

                <button align="right" type="submit" class="btn btn-primary" id="simpan">Simpan</button>
            </div>
            <!-- Akhir modal footer-->
        </div>
    </div>
</div>
<!-- modal berakhir -->

@endsection

@section('js')
<script>
$('#modal').on('hidden.bs.modal',function(){
    $('#error_nama').css('display','none');
})
</script>
<script type="text/javascript">
    $(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      //INDEX TABEL
    var table = $('.datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/kategori') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'slug', name: 'slug'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#tambahdata').click(function () {
        $('.modal-title').html('Tambah Data');
        $('#kategori_id').val('');
        $('#form').trigger("reset");
        $('#modal').modal({backdrop: 'static', keyboard: false});
        $('#modal').modal('show');
        $('#nama').keypress(function(){
            $('#error_nama').css('display','none');
        });
    });
    $('body').on('click','.edit',function(){
        var idKategori = $(this).data('id');
        $.get("{{ url('admin/kategori') }}"+"/"+idKategori+"/edit", function(data){
            // console.log(data);
            $('#modal').modal({backdrop: 'static', keyboard: false});
            $('#modal').modal('show');
            $('.modal-title').html('Edit Data');
            $('#kategori_id').val(data.id);
            $('#nama').val(data.nama);
            $('#nama').keypress(function(){
                $('#error_nama').css('display','none');
            });
        });
    });
    $('body').on('click','.hapus', function(){
        var idKategori = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/kategori-destroy') }}"+"/"+idKategori,
                    success: function(data){
                        table.draw();
                    },
                    error: function(request, status, error) {
                        console.log(error);
                    }
                });
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        })
    });
    //KETIKA BUTTON SAVE DI KLIK
    $('#simpan').click(function (e) {
        e.preventDefault();
        // $(this).hide();
        $.ajax({
            data: $('#form').serialize(),
            url: "{{ url('admin/kategori-store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#form').trigger("reset");
                $('#modal').modal('hide');
                table.draw();
                Swal.fire({
                    icon: 'success',
                    title: data.success,
                    showConfirmButton: false,
                    timer: 1000
                });
            },
            error: function (request, status, error) {
                $('#error_nama').empty().show();
                json = $.parseJSON(request.responseText);
                $('#error_nama').html(json.errors.nama);
            }
        });
    });
});
</script>
@endsection
