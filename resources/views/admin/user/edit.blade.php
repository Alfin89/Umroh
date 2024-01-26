@extends('app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
{{-- Warning --}}
<div class="alert alert-warning alert-dismissible" role="alert">
    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Warning :)</h6>
    <p class="mb-0">Untuk mengubah user menjadi admin harap ubah angka 0 menjadi 1</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
  </div>
{{-- /Warning --}}
    <div class="row">
      <!-- Basic with Icons -->
      <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit User</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form action="{{ url('user/update/'.$user->id) }}" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
              @csrf
              @method('PUT')
              {{-- Name --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="name">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name"  required/>
                </div>
              </div>
              {{-- Email --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="email">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email"  required/>
                </div>
              </div>
              {{-- Role --}}
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="role_as">Akses</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="{{ $user->role_as }}" id="role_as" name="role_as" required/>
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