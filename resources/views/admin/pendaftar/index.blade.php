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
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Data Pendaftar</h5>
        <div>
          <a href="{{ url('pendaftar/cetak') }}" type="submit" target="_blank" class="btn btn-secondary btn-sm">Cetak PDF</a>
        </div>
      </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>NIK</th>
              <th>Tetala</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($pendaftar) && $pendaftar->count() > 0)
            @foreach ($pendaftar as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->nik }}</td>
              <td>{{ $item->tempat_lahir }} {{ $item->tanggal_lahir }}</td>
              <td>{{ $item->jenis_kelamin }}</td>
              <td>{{ $item->alamat}}</td>
              <td>{{ $item->nomor_telepon }}</td>
              <td>
                    <a class="text-primary" href="{{ url('pendaftar/view/'.$item->id) }}"
                      ><i class='bx bx-glasses-alt me-1' title="Detail" ></i></a
                    >
                    <a class="text-danger" id="delete-daftar" href="javascript:void(0)" data-url="{{ route('pendaftar.delete', $item->id) }}"
                      ><i class="bx bx-trash me-1" title="Hapus"></i></a
                    >
              </td>
            </tr>
            @endforeach
            @else
            <p>Tidak ada Pendaftar</p>
            @endif
          </tbody>
        </table>
      </div>
      {{-- paginate --}}
      <div class="d-flex justify-content-center mt-3">
        {{ $pendaftar->links('pagination::bootstrap-4') }}
      </div>
      {{-- /paginate --}}
    </div>
  </div>
</div>
@endsection