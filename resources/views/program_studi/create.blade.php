@extends('adminlte::page')

@section('title', 'Tambah Program Studi')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@stop

@section('content_header')
    <h1>Tambah Data Program Studi</h1>
@stop

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('program-studi.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">PROGRAM STUDI</label>
                                <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror"
                                    name="nama_prodi">

                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KODE PROGRAM STUDI</label>
                                <input type="text" class="form-control @error('kode_prodi') is-invalid @enderror"
                                    name="kode_prodi">

                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">KODE FAKULTAS</label>
                                <input type="text" class="form-control @error('kode_fakultas') is-invalid @enderror"
                                    name="kode_fakultas">

                                <!-- error message untuk title -->
                                @error('title')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-success">Simpan</button>
                            <button type="reset" class="btn btn-md btn-secondary">Reset</button>
                            <a href="{{ route('program-studi.index') }}" class="btn btn-md btn-primary">Kembali</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session()->has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');
        @elseif (session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!');
        @endif
    </script>
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
