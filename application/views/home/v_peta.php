<?php echo $map['js']; ?>
<script>
	function selectChange(val)
	{
		$('#WilayahForm').submit();
	}
</script>
<br><br><br><br><br><br>
<div class="container">

	<h2 class="demoHeaders">Cari Wilayah</h2>
	<div class="col-md-5">
		<form id="wilayahForm" class="form-horizontal form-label-left" action="<?php echo base_url('home/peta2') ?>" method="post">
			<div class="input-group">
                    <select class="form-control" name="id" onChange=selectChange(this.value)>
					<?php foreach ($wisata_data as $p): ?>
						<option value="<?php echo $p->id_wilayah ?>"><?php echo $p->nama ?> </option>
					<?php endforeach ?>
					</select>
            </div>
		</form>
	</div>
	<br><br>
    <?php echo $map['html']; ?>
    <br><br>
</div


