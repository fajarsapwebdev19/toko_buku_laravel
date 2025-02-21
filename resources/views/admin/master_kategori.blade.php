@extends('admin.dash')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- content --}}
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_school">
                    <em class="fas fa-plus"></em> Tambah
                </button>

                <div class="mt-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-sm category_data">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Jenis</th>
                                            <th>Kelas</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end content --}}
@endsection

@section('title', 'Master Data - Kategori')

