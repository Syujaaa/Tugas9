<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.css')}}">
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header text-center">
                <h1>Daftar Users Random</h1>
            </div>
            <div class="card-body p-5">
                @if(session('berhasil'))

                <div class="alert alert-success text-center">
                    {{session('berhasil')}}
                </div>
                @endif
                <a href="/tambahUser10" class="btn btn-warning mb-5">Tambah 10 Users</a> @if($users->isNotEmpty()) <a href="/hapusSemua" class="btn btn-danger mb-5" onclick="return confirm('Yakin akan dihapus semua data yang ada di Users?')">Hapus Semua Data Users</a> @endif
                <table class="table table-striped">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                    @php if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    $no = 1 + (6 * ($page-1));
                    }else{
                    $no = 1;
                    }
                    @endphp
                    @foreach($users as $x)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{$x -> name}}</td>
                        <td>{{$x -> email}}</td>
                        <td>{{$x -> password}}</td>
                        <td><a href="/hapus/{{$x -> id}}" class="btn btn-danger" onclick="return confirm('Yakin akan dihapus data users dengan Nama {{$x -> name}}?')">Hapus</a></td>
                    </tr>
                    @endforeach
                    @if($users->isEmpty())
                    <tr>
                        <td colspan="5">
                            <div class="text-center">
                                <h1 class="p-5">Data Users Kosong</h1>
                            </div>
                        </td>
                    </tr>
                    @endif
                </table>

                {{ $users->links('pagination::bootstrap-5') }}

            </div>
        </div>
    </div>
</body>

</html>