<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>wilayah List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No wilayah</th>
		<th>Nama wilayah</th>
		<th>Alamat</th>
		<th>No Telepon pengelola</th>
		
            </tr><?php
            foreach ($wilayah_data as $wilayah)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $wilayah->no_wilayah ?></td>
		      <td><?php echo $wilayah->nama_wilayah ?></td>
		      <td><?php echo $wilayah->alamat ?></td>
		      <td><?php echo $wilayah->no_telepon_pengelola ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>