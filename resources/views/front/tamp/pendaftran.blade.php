@extends('front.app')

@section('content')
<div class="container justify-content-center flex-grow-1" style="margin-top: 100px">
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
            {{-- alert --}}
    @if (session('success'))
    <div class="alert alert-primary alert-dismissible" role="alert">
      <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Well done :)</h6>
      <p class="mb-0">{{ session('success') }}</p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
    @endif
    {{-- alert --}}
      <!-- Basic with Icons -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between bg-success">
            <h5 class="mb-0 text-white text-center">Pendaftran Jamaah Umroh</h5>
          </div>
          <div class="card-body">
            <form action="{{ url('pendaftaran') }}" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
              @csrf
              {{-- nama --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name"  name="nama" placeholder="Tulis Nama Sesuai KTP" required/>
                </div>
              </div>
              {{-- NIK --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nik">NIK</label>
                <div class="col-sm-10">
                  <input type="text" maxlength="16" pattern="[0-9]*" class="form-control" id="nik" name="nik" placeholder="Tulis NIK Sesuai dengan KTP" required/>
                </div>
              </div>
              {{-- Tempat lahir --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tempat_lahir">Tempat Lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tulis Tempat lahir Sesuai dengan KTP" required/>
                </div>
              </div>
              {{-- tanggal lahir --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tanggal_lahir">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required/>
                </div>
              </div>
              {{-- jenis kelamin --}}
                <div class="row mb-3">
                  <label class="col-form-label col-sm-2" for="jenis_kelamin">Jenis Kelamin</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                      <option  selected>Opsi...</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                {{-- Alamat --}}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                  <div class="col-sm-10">
                    <textarea id="alamat" class="form-control"
                      placeholder="Tulis Alamat Anda Sesuai KTP" name="alamat" aria-label="Tulis Alamat Anda Sesuai KTP"
                      required></textarea>
                  </div>
                </div>
              {{-- Nomor  --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nomor_telepon">Nomor Telepon</label>
                <div class="col-sm-10">
                  <input type="tel" id="nomor_telepon" name="nomor_telepon" class="form-control " placeholder="Tuliskan Nomor Telepon"
                    aria-label="Tuliskan Nomor Telepon" required/>
                </div>
              </div>
              {{-- Pekerjaan --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="pekerjaan">Pekerjaan</label>
                <div class="col-sm-10">
                  <input type="text" id="pekerjaan" name="pekerjaan" class="form-control " placeholder="Tulis Pekerjaan Susuai KTP"
                    aria-label="Tulis Pekerjaan " required/>
                </div>
              </div>
              {{-- Gamabr --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="foto">Foto</label>
                <div class="col-sm-10">
                  <input type="file" id="foto" name="foto" class="form-control " />
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn tombol text-white">Daftar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection