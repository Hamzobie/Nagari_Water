<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nagari Water</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <script src="js/app.js"></script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 header" id="site-header">
                <header>
                    <h1 class="title-site">Nagari Water</h1>
                </header>
                <nav class="menus">
                    <ul>
                        <li><a href="./">Pelanggan</a></li>
                        <li><a href="./admin">Admin</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm|md|lg|xl|xxl-12 articles center" id="site-content">
                <h3>Cari Data Pelanggan</h3>
                <div class="mb-3">
                  <label for="" class="form-label"></label>
                  <input type="text" class="form-control" name="" id="searching" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Masukan Nama Pelanggan</small>
                </div>
                <table class="table table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>ID Pelanggan</th>
                            <th>Penggunaan Air</th>
                            <th>Total Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                        </tr>
                        </thead>
                        <tbody id="list">
                        @foreach($data as $row)
                            <tr>
                                <td>{{$row->nama}}</td>
                                <td>{{$row->id}}</td>
                                <td>{{$row->total}}</td>
                                <td>{{$row->total_biaya}}</td>
                                <td>{{$row->tanggal_pembayaran}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 footer" id="site-footer">
                <footer class=”copyright text-center”><p>&copy; 2022 Nagari Water</p></footer>
            </div>
        </div>
    </div>
</body>
<script src="js/script.js"></script>
</html>
