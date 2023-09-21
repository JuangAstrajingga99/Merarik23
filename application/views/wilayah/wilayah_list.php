<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>List Data</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-md-6">
                                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <?php echo anchor(site_url('wilayah/create'), '<i class="fa fa-plus-square"> </i> Tambah Wilayah', 'class="btn btn-primary"'); ?>
                                        <!--
                                            <?php echo anchor(site_url('wilayah/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                                            <?php echo anchor(site_url('wilayah/word'), 'Word', 'class="btn btn-primary"'); ?>
                                        -->
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-striped" id="mytable">
                                        <thead>
                                            <tr>
                                                <th width="80px">No</th>
                                                <th>No Wilayah</th>
                                                <th>Nama Wilayah</th>
                                                <th>Alamat</th>
                                                <th>No Telepon Pengelola</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $start = 0;
                                        foreach ($wilayah_data as $wilayah)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo ++$start ?></td>
                                                <td><?php echo $wilayah->no_wilayah ?></td>
                                                <td><?php echo $wilayah->nama_wilayah ?></td>
                                                <td><?php echo $wilayah->alamat ?></td>
                                                <td><?php echo $wilayah->no_telepon_pengelola ?></td>
                                                <td style="text-align:center" width="200px">
                                                <?php 
                                                echo anchor(site_url('data_wisata/wilayah/'.$wilayah->id_wilayah),'<i class="fa fa-eye"></i> Data Wilayah', 'class="btn btn-success btn-xs"'); 
                                                echo anchor(site_url('wilayah/update/'.$wilayah->id_wilayah),'<i class="fa fa-edit"></i>', 'class="btn btn-warning btn-xs"'); 
                                                echo anchor(site_url('wilayah/delete/'.$wilayah->id_wilayah),'<i class="fa fa-trash"></i>','class="btn btn-danger btn-xs" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                                ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
                <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
                <script type="text/javascript">
                        $(document).ready(function () {
                            $("#mytable").dataTable();
                        });
                </script>