@extends('adminlte::page')

@section('title', 'Program Studi')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

@stop

@section('content_header')
    <h1 class="px-3 fw-bold">Data Sekolah</h1>
@stop

@section('content')

    <body>
        <div class="container mt-5">
            <button id="fetchData" class="btn btn-primary mb-4">Fetch Data
                Sekolah</button>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sekolah</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                <tbody id="sekolahData">
                </tbody>
            </table>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <script>
            document.getElementById('fetchData').addEventListener('click',
                function() {
                    fetch('/fetch-sekolah')
                        .then(response => response.json())
                        .then(data => {
                            let sekolahData = document.getElementById('sekolahData');
                            sekolahData.innerHTML = '';
                            data.sekolah.forEach((sekolah, index) => {
                                sekolahData.innerHTML += `
  <tr>
  <td>${index + 1}</td>
  <td>${sekolah.nama}</td>
  <td>${sekolah.alamat}</td>
  <td>${sekolah.provinsi}</td>
  </tr>
  `;
                            });
                        });
                });
        </script>
    </body>


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
