@extends('app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Basic Layout & Basic with Icons -->
  <div class="row">
    <!-- Basic with Icons -->
    <div class="col-xxl">
      <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="mb-0">Tambah Data Jamaah</h5>
          <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">
          <form action="{{ url('umroh/store') }}" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
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
            {{-- Calon jamaah --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="calon_jamaah">Calon Jamaah</label>
              <div class="col-sm-10">
                <input type="text" id="calon_jamaah" class="form-control " name="calon_jamaah" placeholder="Tulis Calon Jamaah"
                   required/>
              </div>
            </div>
            {{-- Pembimbing --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="pembimbing">Pembimbing</label>
              <div class="col-sm-10">
                <input type="text" id="pembimbing" name="pembimbing" class="form-control " placeholder="Tuliskan Pmebimbing"
                  aria-label="Tuliskan Pembimbing" required/>
              </div>
            </div>
            {{-- Keberangkatan --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="keberangkatan">Tanggal Keberangkatan</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="keberangkatan" name="keberangkatan" required/>
              </div>
            </div>
            {{-- Pekerjaan --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="pekerjaan">Pekerjaan</label>
              <div class="col-sm-10">
                <input type="text" id="pekerjaan" name="pekerjaan" class="form-control " placeholder="Tulis Pekerjaan Susuai KTP"
                  aria-label="Tulis Pekerjaan Susuai KTP" required/>
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
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection