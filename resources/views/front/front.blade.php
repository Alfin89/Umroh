@extends('front.app')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2>Silahkan Cek data disini</h2>
      <form class="form" method="get" action="{{ route('home.index') }}">
        <div class="form-group w-100 mb-3">
          <input type="text" name="keyword" class="form-control w-75 d-inline" id="search" placeholder="Masukkan NIK">
          <button type="submit" class="btn mb-1" style="background-color: #ffff">Cari</button>
        </div>
      </form>
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Trainers Section ======= -->
  <div class="container-xxl flex-grow-1 container-p-y">
    @if (!empty($keyword))
      @if ($umroh->isEmpty())
      <div class="card text-center mt-5 mb-5">
        <div class="card-header text-white" style="background-color: rgba(255, 9, 38, 0.363);">
          Nomor NIK tidak terdaftar.!
        </div>
      </div>
      @else
        @foreach ($umroh as $item)
          <div class="row gutters-sm mt-4">
            <div class="col-md-4 mb-1">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('assets/uploads/foto/'.$item->foto) }}" alt="Admin" class="rounded img-thumbnail border" width="200">
                    <div class="mt-3">
                      <h4>{{ $item->nama }}</h4>
                      <p class="text-secondary mb-1">{{ $item->pekerjaan }}</p>
                      <p class="text-muted font-size-sm">{{ $item->alamat }}</p>
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
                      {{ $item->nama }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIK</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $item->nik }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $item->alamat }}                    
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Calon jamaah</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $item->calon_jamaah }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pembimbing</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $item->pembimbing }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pemberangkatan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ \Carbon\Carbon::parse($item->keberangkatan)->isoFormat('dddd, D MMMM Y') }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    @else
      <div class="card text-center mt-5 mb-5">
        <div class="card-header">
          Silakan ketikkan nomor NIK untuk cek identitas
        </div>
      </div>
    @endif
  </div>
@endsection
