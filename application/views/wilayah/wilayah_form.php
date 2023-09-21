<!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small>Wilayah <?php echo $button ?></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="<?php echo $action; ?>" method="post">
                                        <div class="form-group">
                                            <label for="int">No Wilayah <?php echo form_error('no_wilayah');?> </label>
                                            <?php if ($cek == 1): ?>
                                                <input type="text" class="form-control" placeholder="No Wilayah" value="<?php echo $no_wilayah; ?>" disabled/>
                                                <input type="hidden" class="form-control" name="no_wilayah" id="no_wilayah" placeholder="No Wilayah" value="<?php echo $no_wilayah; ?>" />
                                            <?php else: ?>
                                                <input type="text" class="form-control" name="no_wilayah" id="no_wilayah" placeholder="No Wilayah" value="<?php echo $no_wilayah; ?>" />
                                            <?php endif ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Nama Wilayah <?php echo form_error('nama_wilayah') ?></label>
                                            <input type="text" class="form-control" name="nama_wilayah" id="nama_wilayah" placeholder="Nama Wilayah" value="<?php echo $nama_wilayah; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">No Telepon Pengelola <?php echo form_error('no_telepon_pengelola') ?></label>
                                            <input type="text" class="form-control" name="no_telepon_pengelola" id="no_telepon_pengelola" placeholder="No Telepon Pengelola" value="<?php echo $no_telepon_pengelola; ?>" />
                                        </div>
                                        <input type="hidden" name="id_wilayah" value="<?php echo $id_wilayah; ?>" /> 
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                                        <a href="<?php echo site_url('wilayah') ?>" class="btn btn-default">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>