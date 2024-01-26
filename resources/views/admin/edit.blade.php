@extends('app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic with Icons -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data Jamaah</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form action="{{ url('umroh/update/'.$umroh->id) }}" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
              @csrf
              @method('PUT')
              {{-- nama --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                <div class="col-sm-10 ">
                  <input type="text" class="form-control" value="{{ $umroh->nama }}" id="nama" name="nama" placeholder="Tulis Nama Sesuai KTP" required/>
                </div>
              </div>
              {{-- NIK --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="nik">NIK</label>
                <div class="col-sm-10">
                  <input type="text" minlength="16" maxlength="16" pattern="[0-9]*" class="form-control" value="{{ $umroh->nik }}" id="nik" name="nik" placeholder="Tulis NIK Sesuai dengan KTP" required/>
                </div>
              </div>
              {{-- Tempat lahir --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tempat_lahir">Tempat Lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $umroh->tempat_lahir }}" id="tempat_lahir" name="tempat_lahir" placeholder="Tulis Tempat lahir Sesuai dengan KTP" required/>
                </div>
              </div>
              {{-- tanggal lahir --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tanggal_lahir">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" value="{{ $umroh->tanggal_lahir }}" id="tanggal_lahir" name="tanggal_lahir" required/>
                </div>
              </div>
              {{-- jenis kelamin --}}
              <div class="row mb-3">
                <label class="col-form-label col-sm-2" for="jenis_kelamin">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                        <option value="" disabled {{ ($umroh->jenis_kelamin == '') ? 'selected' : '' }}>Opsi...</option>
                        <option value="Laki-laki" {{ ($umroh->jenis_kelamin == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ ($umroh->jenis_kelamin == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
             </div>            
                {{-- Alamat --}}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                  <div class="col-sm-10">
                    <textarea id="alamat" class="form-control"
                      placeholder="Tulis Alamat Anda Sesuai KTP" name="alamat" aria-label="Tulis Alamat Anda Sesuai KTP"
                      required>{{ $umroh->alamat }}</textarea>
                  </div>
                </div>
               {{-- Calon jamaah --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="calon_jamaah">Calon Jamaah</label>
              <div class="col-sm-10">
                <input type="text" id="calon_jamaah" class="form-control" value="{{ $umroh->calon_jamaah }}" name="calon_jamaah" placeholder="Tulis Calon Jamaah"
                   required/>
              </div>
            </div>
            {{-- Pembimbing --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="pembimbing">Pembimbing</label>
              <div class="col-sm-10">
                <input type="text" id="pembimbing" name="pembimbing" value="{{ $umroh->pembimbing }}" class="form-control " placeholder="Tuliskan Pmebimbing"
                  aria-label="Tuliskan Pembimbing" required/>
              </div>
            </div>
            {{-- Keberangkatan --}}
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="keberangkatan">Tanggal Keberangkatan</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" value="{{ $umroh->keberangkatan }}" id="keberangkatan" name="keberangkatan" required/>
              </div>
            </div>
              {{-- Pekerjaan --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="pekerjaan">Pekerjaan</label>
                <div class="col-sm-10">
                  <input type="text" id="pekerjaan" name="pekerjaan" value="{{ $umroh->pekerjaan }}" class="form-control " placeholder="Tulis Pekerjaan Susuai KTP"
                    aria-label="Tulis Pekerjaan Susuai KTP" required/>
                </div>
              </div>
              {{-- Gamabr --}}
              @if ($umroh->foto)
              <img src="{{ asset('assets/uploads/foto/'.$umroh->foto) }}" width="100" class="img-thumbnail rounded border border-primary" alt="foto">
              <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="foto">Ganti Foto</label>
                  <div class="col-sm-10">
                      <input type="file" id="foto" name="foto" class="form-control" />
                  </div>
              </div>
              @endif
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