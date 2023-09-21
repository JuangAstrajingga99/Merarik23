<!doctype html>
<html>
    <head>
        <title>SigWisata</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Data_Wilayah Read</h2>
        <table class="table">
	    <tr><td>Id wilayah</td><td><?php echo $id_wilayah; ?></td></tr>
	    <tr><td>Id Jenis wisata</td><td><?php echo $id_jenis_wisata; ?></td></tr>
	    <tr><td>Penginput</td><td><?php echo $penginput; ?></td></tr>
	    <tr><td>harga tiket</td><td><?php echo $harga_tiket; ?></td></tr>
	    <tr><td>Luas wisata</td><td><?php echo $luas_wisata; ?></td></tr>
	    <tr><td>Lat</td><td><?php echo $lat; ?></td></tr>
	    <tr><td>Lng</td><td><?php echo $lng; ?></td></tr>
	    <tr><td>Gambar</td><td><?php echo $gambar; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('data_wisata') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>