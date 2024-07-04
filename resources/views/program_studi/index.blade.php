@extends('adminlte::page')

@section('title', 'Program Studi')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@stop

@section('content_header')
    <h1 class="px-3 fw-bold">Data Program Studi</h1>
@stop

@section('content')
    <div class="container mt-2 px-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('program-studi.create') }}" class="btn btn-md btn-success mb-3">Tambah Prodi</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA PRODI</th>
                                    <th scope="col">KODE PRODI</th>
                                    <th scope="col">KODE FAKULTAS</th>
                                    <th scope="col" class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($prodi as $prd)
                                    <tr>
                                        <td>
                                            <a href="{{ route('program-studi.show', $prd->id) }}" class="text-decoration-none">
                                                {{ $prd->nama_prodi }}
                                            </a>
                                        </td>
                                        <td>{{ $prd->kode_prodi }}</td>
                                        <td>{!! $prd->kode_fakultas !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('program-studi.destroy', $prd->id) }}" method="POST">
                                                <a href="{{ route('program-studi.edit', $prd->id) }}"
                                                    class="btn btn-sm btn-primary">Update</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $prodi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
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
