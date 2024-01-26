@extends('app')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
          <div class="row gutters-sm mt-4">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('assets/uploads/foto/'.$umroh->foto) }}" alt="Admin" class="rounded img-thumbnail border" width="200">
                    <div class="mt-3">
                      <h4>{{ $umroh->nama }}</h4>
                      <p class="text-secondary mb-1">{{ $umroh->pekerjaan }}</p>
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
                      {{ $umroh->nama }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIK</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $umroh->nik }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tempat lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $umroh->tempat_lahir }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tanggal lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ \Carbon\Carbon::parse($umroh->tanggal_lahir)->isoFormat('dddd, D MMMM Y') }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $umroh->alamat }}                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $umroh->jenis_kelamin }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pekerjaan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $umroh->pekerjaan }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Calon jamaah</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $umroh->calon_jamaah }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pembimbing</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $umroh->pembimbing }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pemberangkatan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ \Carbon\Carbon::parse($umroh->keberangkatan)->isoFormat('dddd, D MMMM Y') }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-primary " href="{{ route('umroh.index') }}">Kembali</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
</div>
@endsection