@extends('layouts.auth')

@section('judul')
    <title>Akun</title>
@endsection

@section('content')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('include.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('include.header-admin')
            <div class="container-fluid">
                <a href="{{ route('register') }}"><button type="button" class="btn btn-success m-1 mb-3">Tambah Akun</button></a>

                <h5>Admin</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td class="col-md-1">{{ $loop->iteration }}</td>
                                    <td class="col-md-2">{{ $admin->name }}</td>
                                    <td class="col-md-2">{{ $admin->nohp }}</td>
                                    <td class="col-md-2">
                                        <form action="{{ route('destroyAkun', $admin->id) }}" method="POST">
                                            <a href="{{ route('editAkun', $admin->id) }}" class="me-2" style="text-decoration: none;">
                                                edit
                                            </a>

                                            <a href="{{ route('editPassword', $admin->id) }}" style="text-decoration: none; color: green;">
                                                ubah password
                                            </a>
            
                                            @csrf
                                            @method('DELETE')
            
                                            <button class="btn mb-1" type="submit" style="color: red">
                                                hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h5>Guru</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gurus as $guru)
                                <tr>
                                    <td class="col-md-1">{{ $loop->iteration }}</td>
                                    <td class="col-md-2">{{ $guru->name }}</td>
                                    <td class="col-md-2">{{ $guru->nohp }}</td>
                                    <td class="col-md-2">
                                        <form action="{{ route('destroyAkun', $guru->id) }}" method="POST">
                                            <a href="{{ route('editAkun', $guru->id) }}" class="me-2" style="text-decoration: none;">
                                                edit
                                            </a>

                                            <a href="{{ route('editPassword', $guru->id) }}" style="text-decoration: none; color: green;">
                                                ubah password
                                            </a>
            
                                            @csrf
                                            @method('DELETE')
            
                                            <button class="btn mb-1" type="submit" style="color: red">
                                                hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h5>Orangtua</h5>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ortus as $ortu)
                                <tr>
                                    <td class="col-md-1">{{ $loop->iteration }}</td>
                                    <td class="col-md-2">{{ $ortu->name }}</td>
                                    <td class="col-md-2">{{ $ortu->nohp }}</td>
                                    <td class="col-md-2">
                                        <form action="{{ route('destroyAkun', $ortu->id) }}" method="POST">
                                            <a href="{{ route('editAkun', $ortu->id) }}" class="me-2" style="text-decoration: none;">
                                                edit
                                            </a>

                                            <a href="{{ route('editPassword', $ortu->id) }}" style="text-decoration: none; color: green;">
                                                ubah password
                                            </a>
            
                                            @csrf
                                            @method('DELETE')
            
                                            <button class="btn mb-1" type="submit" style="color: red">
                                                hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
