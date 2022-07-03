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
                        <li><a href="#">Admin</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm|md|lg|xl|xxl-12 articles center" id="site-content">
                <h3 >Data Pelanggan</h3>
                <a class="btn btn-primary" href="<?php echo e(url('/add')); ?>" id="data" >Tambah Data</a>
                <div class="mb-3">
                  <label for="" class="form-label"></label>
                  <input type="text" class="form-control" name="" id="searching" aria-describedby="helpId" placeholder="">
                  <small id="helpId" class="form-text text-muted">Masukan Nama Pelanggan</small>
                </div>
                <table class="table table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID Pembayaran</th>
                            <th>Nama Pelanggan</th>
                            <th>ID Pelanggan</th>
                            <th>Penggunaan Air</th>
                            <th>Total Pembayaran</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Button</th>
                        </tr>
                        </thead>
                        <tbody id="list">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($row->id); ?></td>
                                <td><?php echo e($row->nama); ?></td>
                                <td><?php echo e($row->pelanggan_id); ?></td>
                                <td><?php echo e($row->total); ?></td>
                                <td><?php echo e($row->total_biaya); ?></td>
                                <td><?php echo e($row->tanggal_pembayaran); ?></td>
                                <td >
                                    <form action="" style="display: inline">
                                        <a href="<?php echo e(url($row->id)); ?>" type="button" class="btn btn-info">Edit</a>
                                    </form>
                                    <form action="<?php echo e(url('admin', $row->id)); ?>" style="display: inline" method="POST" onsubmit="return confirm('Yakin Hapus Data?')">
                                        <?php echo method_field('delete'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH E:\Programing stuff\Basisdata\nagari-water\resources\views/admin.blade.php ENDPATH**/ ?>