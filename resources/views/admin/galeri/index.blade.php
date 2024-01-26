@extends('app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  @if (session('success'))
  <div class="alert alert-primary alert-dismissible" role="alert">
    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Well done :)</h6>
    <p class="mb-0">{{ session('success') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
  @endif
  <!-- Modal Tambah Gambar -->
  <a href="#" class="btn btn-primary text-white mb-3" title="Tambah gambar" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class='bx bx-image-add'></i>
  </a>
  @include('components.galeri_mt')
  {{-- /modal --}}
<div class="row">
  @foreach ($galeris as $galeri)
  <div class="gal col-lg-3 col-md-12">
      <a href="javascript:void(0)" class="delete-galeri" data-url="{{ route('galeri.delete', $galeri->id) }}"> 
        <div class="card bg-image hover-overlay ripple shadow-1-strong rounded">
          <img src="{{ asset('assets/uploads/galeri/'.$galeri->image) }} " class="card-img-top" alt="...">
          <div class="card-body">
            <h6 class="card-text">{{ $galeri->deskripsi }}</h6>
          </div>
        </div>
      </a>
  </div>
  @endforeach
<div class="d-flex justify-content-center mt-3">
  {{ $galeris->links('pagination::bootstrap-4') }}
</div>
</div>
</div> 
@endsection