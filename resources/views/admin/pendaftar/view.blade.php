@extends('app')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
          <div class="row gutters-sm mt-4">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('assets/uploads/pendaftar/'.$pendaftar->foto) }}" alt="Admin" class="rounded img-thumbnail border" width="200">
                    <div class="mt-3">
                      <h4>{{ $pendaftar->nama }}</h4>
                      <p class="text-secondary mb-1">{{ $pendaftar->pekerjaan }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $pendaftar->nama }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIK</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $pendaftar->nik }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tetala</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $pendaftar->tempat_lahir }} 
                        {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->isoFormat('dddd, D MMMM Y') }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $pendaftar->alamat }}                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $pendaftar->jenis_kelamin }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pekerjaan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $pendaftar->pekerjaan }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nomor Telepon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $pendaftar->nomor_telepon }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-primary " href="{{ route('pendaftar.index') }}">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
</div>
@endsection