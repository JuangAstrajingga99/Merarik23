<?php echo $map['js']; ?>

<script>
update_address(<?=$latitude;?>,<?=$longitude;?>); //Set terlebih dahulu alamat lokasi pusat
function showmap()
{                       
    var place = placesAutocomplete.getPlace(); //Inisialkan auto complete atau pencarian
    if (!place.geometry) //Jika hasil tidak ada
    {
        return; //Abaikan
    }
    var lat = place.geometry.location.lat(), // Ambil Posisi Latitude Auto Complete
    lng = place.geometry.location.lng(); // Ambil Posisi Longitude Auto Complete
    document.getElementById('lat').value=lat; //Set Latitude pada input lat
    document.getElementById('lng').value=lng; //Set Longitude pada input lng
    var map = new google.maps.Map(document.getElementById('map-canvas'), { //Refresh alamat
        center: {lat: lat, lng: lng},
        zoom: 17
    });
    placesAutocomplete.bindTo('bounds', map); //Render Map Auto Complete
    
    //Tambah penandaan pada alamat
    var marker = new google.maps.Marker({
        map: map,
        draggable: true,
        title: "Drag Untuk mencari posisi",
        anchorPoint: new google.maps.Point(0, -29)
    });
    
    if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);
    }
    marker.setPosition(place.geometry.location);        
    marker_0 = createMarker_map(marker);
    
        var alamat=document.getElementById('cari');
            google.maps.event.addListener(marker_0, "dragend", function(event) {
                document.getElementById('lat').value = event.latLng.lat();
                document.getElementById('lng').value = event.latLng.lng();
                update_address(event.latLng.lat(),event.latLng.lng());              
            });
}

//Fungsi mendapatkan alamat disaat drag marker
function update_address(lat,lng)
{
    var geocoder = new google.maps.Geocoder;
    var latlng={lat: parseFloat(latitude), lng: parseFloat(longitude)};
    geocoder.geocode({'location': latlng}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {         
        document.getElementById('cari').value=results[0].formatted_address;
      } else {
        window.alert('Tidak ada hasil pencarian');
      }
    } else {
      window.alert('Geocoder error: ' + status);
    }
  });
}
</script>

            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form <small><?php echo $button ?> Data Wilayah</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-6">
                                        <?php echo form_open_multipart($action);?>
                                        <div class="form-group">
                                            <label for="int">Nama Wilayah<?php echo form_error('id_wilayah') ?></label>
                                            <input disabled="disabled" type="text" class="form-control" placeholder="<?php echo $wilayah->nama_wilayah ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="int">Jenis Wisata <?php echo form_error('id_jenis_wisata') ?></label>
                                            <select class="form-control" name="id_jenis_wisata" id="id_jenis_wisata" value="<?php echo $id_jenis_wisata; ?>">
                                                <option value="pilihhhhhh">Pilih ...</option>
                                                <?php foreach ($jenis_wisata as $jb): ?>
                                                    <option value="<?php echo $jb->id_jenis_wisata ?>"> <?php echo $jb->nama_wisata ?> </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                       <div class="form-group">
                                            <label for="varchar">Harga Tiket <?php echo form_error('harga_tiket') ?></label>
                                            <input type="text" class="form-control" name="harga_tiket" id="harga_tiket" placeholder="Harga Tiket" value="<?php echo $harga_tiket; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Luas Wisata <?php echo form_error('luas_wisata') ?></label>
                                            <input type="text" class="form-control" name="luas_wisata" id="luas_wisata" placeholder="Luas Wisata" value="<?php echo $luas_wisata; ?>" placeholder="m2" />
                                        </div>
                                            <script>
                                              $(function() {
                                                $('#luas_wisata').maskMoney();
                                              })
                                            </script>
                                        <div class="form-group">
                                            <label for="varchar">Gambar <?php echo $this->session->flashdata('error_gambar'); ?></label>
                                            <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
                                        </div>
                                         <div class="form-group">
                                            <label for="varchar">Latitude<?php echo form_error('lat') ?></label>
                                            <input type="text" class="form-control" name="lat" id="lat" value="<?php echo $lat; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar">Longitude<?php echo form_error('lng') ?></label>
                                            <input type="text" class="form-control" name="lng" id="lng" value="<?php echo $lng; ?>" />
                                        </div>
                                        <input type="hidden" name="tanggal" value="<?php echo $tanggal; ?>" />
                                        <input type="hidden" name="id_wisata" value="<?php echo $id_wisata; ?>" />
                                        <input type="hidden" name="id_wilayah" value="<?php echo $wilayah->id_wilayah; ?>" />  
                                        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                                        <a href="<?php echo site_url('data_wisata/wilayah/'.$wilayah->id_wilayah) ?>" class="btn btn-default">Cancel</a>
                                    
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                            <input type="text" id="cari" class="form-control" placeholder="Cari Alamat atau Tempat"/>
                                            </div>
                                        <?php echo $map['html']; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
