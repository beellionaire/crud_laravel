@extends('adminlte::page')

@section('title', 'Detail Program Studi')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@stop

@section('content_header')
    <h1 class="px-3">Detail Program Studi</h1>
@stop

@section('content')


    <div class="container mt-2 px-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4>{{ $prodi->nama_prodi }}</h4>
                        <h4>{{ $prodi->kode_prodi }}</h4>
                        <h4>{{ $prodi->kode_fakultas }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('program-studi.index') }}" class="btn btn-primary">Kembali</a>
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
        console.log("Hi, beel");
    </script>
@stop
