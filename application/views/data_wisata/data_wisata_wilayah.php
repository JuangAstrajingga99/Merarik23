<?php echo $map['js']; ?>
<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <h2><?php echo $this->session->flashdata('message'); ?></h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data <small><?php echo $nama_wilayah; ?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table class="table">
                                        <tr><td>No Wilayah</td><td><?php echo $no_wilayah; ?></td></tr>
                                        <tr><td>Nama Wilayah</td><td><?php echo $nama_wilayah; ?></td></tr>
                                        <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
                                        <tr><td>No Telepon pengelola</td><td><?php echo $no_telepon_pengelola; ?></td></tr>
                                        <tr>
                                            <td><a href="<?php echo base_url('wilayah') ?>" class="btn btn-primary btn-md">Back</a></td>
                                           <!-- <td><a href="<?php echo base_url('data_wisata/cetak_per_id/'.$id_wilayah) ?>" class="btn btn-success btn-md">Cetak</a></td> -->
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Data Wilayah<small> <?php echo $nama_wilayah; ?></small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <a href="<?php echo base_url('data_wisata/create/'.$id_wilayah) ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus-square"></i> Tambah Data Wisata</a>
                                        <?php if (!$data_wisata_data): ?>
                                            <?php echo $nama_wilayah." Belum Meliliki Wilayah Wisata atau Wilayah Wisata Belum terdaftar" ?>
                                        <?php endif ?>
                                        <?php echo $map['html']; ?>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>