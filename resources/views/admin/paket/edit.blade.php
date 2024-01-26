@extends('app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Paket</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('paket/update/'.$paket->id) }}" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        {{-- Judul Paket --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="title">Judul Paket</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $paket->title }}" id="title" name="title" placeholder="Judul Paket" required/>
                            </div>
                        </div>
                        {{-- NIK --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Diskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" placeholder="Diskripsi" name="deskripsi" style="height: 50PX" required>{{ $paket->deskripsi }}</textarea>
                            </div>
                        </div>

                        {{-- tanggal_keberangkatan --}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" value="{{ $paket->tanggal_keberangkatan }}" id="tanggal_keberangkatan" name="tanggal_keberangkatan" required/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="harga">Harga Paket</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" value="{{ $paket->harga }}" id="harga" name="harga" required/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="jumlah">Jumlah Jamaah</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" value="{{ $paket->jumlah }}" id="jumlah" name="jumlah" required/>
                            </div>
                        </div>

                        {{-- Gamabr --}}
                        @if ($paket->image)
                        <img src="{{ asset('assets/uploads/paket/'.$paket->image) }}" width="100" class="img-thumbnail rounded border border-primary" alt="foto">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="image">Gambar Paket</label>
                            <div class="col-sm-10">
                                <input type="file" id="image" name="image" class="form-control"/>
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