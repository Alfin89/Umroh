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
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- /Warning --}}
    <div class="card">
        <h5 class="card-header">Table within card</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Akses</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userData as $user)
                            @if ($user->id != auth()->user()->id)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role_as == 1)
                                            Admin
                                        @elseif ($user->role_as == 0)
                                            User
                                        @else
                                        $(document).ready(function () {
                                            alert('Hello, this is a test alert!');
                                        });
                                                   Role tidak valid
                                        @endif
                                    </td>
                                    <td>
                                        <a class="text-success" href="{{ url('user/edit/'.$user->id) }}"><i class="bx bx-edit-alt me-1"></i></a> 
                                        <a class="text-danger " id="delete-user" href="javascript:void(0)" data-url="{{ route('user.delete', $user->id) }}">
                                            <i class="bx bx-trash me-1" title="Hapus"></i>
                                        </a>
                                    </td> 
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /Modal -->
        </div>
    </div>
</div>

@endsection
