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
        <h5 class="mb-0">Data Paket</h5>
        <div>
          <a href="{{ route('paket.create') }}" type="submit" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
      </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Paket</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Diskripsi</th>
              <th>Pemberangkatan</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pakets as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                  <li
                    data-bs-toggle="tooltip"
                    data-popup="tooltip-custom"
                    data-bs-placement="top"
                    class="avatar avatar-xs pull-up"
                    title="{{ $item->title }}">
                    @if ($item->image)
                      <img src="{{ asset('assets/uploads/paket/'.$item->image) }}" alt="Foto" width="100" class="rounded">
                    @else
                      Foto tidak tersedia
                    @endif
                  </li>
                        {{ $item->title }}
                </ul>
              </td>
              <td>{{ $item->harga }}</td>
              <td>{{ $item->jumlah }}</td>
              <td>{{ $item->deskripsi }}</td>
              <td>{{ \Carbon\Carbon::parse($item->tanggal_keberangkatan)->isoFormat('dddd, D MMMM Y') }}</td>
              {{-- <td></td> --}}
              <td>
                    {{-- <a class="text-primary" href=""
                      ><i class='bx bx-glasses-alt me-1' title="Detail" ></i></a
                    > --}}
                    <a class="text-success" href="{{ url('paket/edit/'.$item->id) }}"
                      ><i class="bx bx-edit-alt me-1" title="Edit"></i></a
                    >
                    <a href="javascript:void(0)" class="text-danger" id="delete-paket" data-url="{{ route('paket.delete', $item->id) }}"
                      ><i class="bx bx-trash me-1" title="Hapus"></i></a
                    >
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{-- paginate --}}
      <div class="d-flex justify-content-center mt-3">
        {{-- {{ $umroh->links('pagination::bootstrap-4') }} --}}
      </div>
      {{-- /paginate --}}
    </div>
  </div>
</div>
@endsection