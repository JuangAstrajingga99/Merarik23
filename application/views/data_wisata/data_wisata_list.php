<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List <small>Data Wisata</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">




        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-8 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('data_wisata/word'), 'Word', 'class="btn btn-primary"'); ?>                
            </div>
        </div>
        <?php $group = 3; if ($this->ion_auth->in_group($group)): ?>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Admin Penginput</th>
                    <th>Nama Wilayah</th>
                    <th>Jenis Wisata</th>
                    <th>Harga Tiket</th>
                    <th>Luas Wisata</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($data_wisata_data as $data_wisata)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $data_wisata->username ?></td>
            <td><?php echo $data_wisata->nama ?></td>
            <td><?php echo $data_wisata->nama_wisata ?></td>
            <td><?php echo $data_wisata->harga_tiket ?></td>
            <td><?php echo $data_wisata->luas_wisata.' m2' ?></td>
            <td><img src="<?php echo base_url('gambar/wisata/'.$data_wisata->gambar) ?>" width="50px" height="50px"></td>
            <td><?php echo $data_wisata->tanggal ?></td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
            <?php else: ?>

<table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Admin Penginput</th>
                    <th>Nama Wilayah</th>
                    <th>Jenis Wisata</th>
                    <th>Harga Tiket</th>
                    <th>Luas Wisata</th>
                    <th>Lat</th>
                    <th>Lng</th>
                    <th>Gambar</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($data_wisata_data as $data_wisata)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $data_wisata->username ?></td>
            <td><?php echo $data_wisata->nama_wisata ?></td>
            <td><?php echo $data_wisata->nama_wilayah ?></td>
            <td><?php echo $data_wisata->harga_tiket ?></td>
            <td><?php echo $data_wisata->luas_wisata ?></td>
            <td><?php echo $data_wisata->lat ?></td>
            <td><?php echo $data_wisata->lng ?></td>
            <td><img src="<?php echo base_url('gambar/wisata/'.$data_wisata->gambar) ?>" width="50px" height="50px"></td>
            <td><?php echo $data_wisata->tanggal ?></td>
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('data_wisata/update/'.$data_wisata->id_wisata),'Update'); 
            echo ' | '; 
            echo anchor(site_url('data_wisata/delete/'.$data_wisata->id_wisata.'/'.$data_wisata->id_wisata),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            ?>
            </td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        <?php endif ?>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>




                                </div>
                            </div>
                        </div>
                    </div>

                </div>