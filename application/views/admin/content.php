<!-- page content -->
            <div class="right_col" role="main">

                <br />
                <div class="">

                    <div class="row top_tiles">
                    <?php $group = 3; 
                        if ($this->ion_auth->in_group($group)): ?>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_wilayah ?></div>

                                <h3>Wilayah </h3>
                                <p>Terdaftar di Sistem</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_wisata ?></div>

                                <h3>Data Wilayah Wisata</h3>
                                <p>Terdaftar di Sistem</p>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_berita ?></div>

                                <h3>Berita</h3>
                                <p>Diterbitkan di situs</p> 
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_jenis ?></div>

                                <h3>Jenis Wisata</h3>
                                <p>Terdaftar di Sistem</p>
                            </div>
                        </div>


                    <?php else: ?>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_wilayah ?></div>

                                <h3>Wilayah </h3>
                                <a href="<?= base_url('wilayah') ?>"><p>Terdaftar di Sistem</p></a>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_wisata ?></div>

                                <h3>Data Wilayah Wisata</h3>
                                <a href="<?= base_url('data_wisata') ?>"><p>Terdaftar di Sistem</p></a>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_berita ?></div>

                                <h3>Berita</h3>
                                <a href="<?php echo base_url('berita') ?>"> <p>Diterbitkan di situs</p> </a>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="count"><?php echo $total_jenis ?></div>

                                <h3>Jenis Wisata</h3>
                                <a href="<?= base_url('jenis_wisata') ?>"><p>Terdaftar di Sistem</p></a>
                            </div>
                        </div>
                    <?php endif ?>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">

                                <div class="x_title">
                                    <!--<h2>Peta <small>Data Tanah Penduduk | Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a>
                                    </small></h2> -->
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    <?php echo $map['js']; ?>
                                    <?php echo $map['html']; ?>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>