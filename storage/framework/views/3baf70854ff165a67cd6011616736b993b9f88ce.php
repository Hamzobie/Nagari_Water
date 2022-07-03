<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nagari Water</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">
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
                        <li><a href="/admin">Admin</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm|md|lg|xl|xxl-12 articles center" id="site-content">
                <h3>Edit Data Pelanggan</h3>
                <form class="form-horizontal" role="form" method="post" action="<?php echo e(url($data->id, [])); ?>">
                    <?php echo method_field('patch'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="lg">Nama Pelanggan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="lg" name="nama" value="<?php echo e($data->nama); ?>">
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label" for="lg">Blok Rumah</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="lg" name="blok" value="<?php echo e($data->blok); ?>">
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="col-sm-2 control-label" for="sm">ID Pelanggan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="sm" name="id_pelanggan" value="<?php echo e($data->pelanggan_id); ?>">
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="col-sm-2 control-label" for="sm">ID Pembayaran</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="sm" name="id_pembayaran" value="<?php echo e($data->id); ?>">
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="col-sm-2 control-label" for="sm">Total Pembayaran</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="sm" name="total_bayar" value="<?php echo e($data->total_biaya); ?>">
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="col-sm-2 control-label" for="sm">Tanggal Pembayaran</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="date" id="sm" name="tanggal" value="<?php echo e($data->tanggal_pembayaran); ?>">
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="col-sm-2 control-label" for="sm">Meteran Awal</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="sm" name="meteran_awal" value="<?php echo e($data->meteran_awal); ?>">
                        </div>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="col-sm-2 control-label" for="sm">Meteran Akhir</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="sm" name="meteran_akhir" value="<?php echo e($data->meteran_akhir); ?>">
                        </div>
                    </div>
                    <input type="submit" value="Edit" class="btn btn-primary" style="margin: 20px">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 footer" id="site-footer">
                <footer class=”copyright text-center”><p>&copy; 2022 Nagari Water</p></footer>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH E:\Programing stuff\Basisdata\nagari-water\resources\views/editData.blade.php ENDPATH**/ ?>