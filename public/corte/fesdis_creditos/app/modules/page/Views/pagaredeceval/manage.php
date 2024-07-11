<div class="container-fluid">
<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-toggle="validator">
	<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
	<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
	<?php if ($this->content->id) { ?>
		<input type="hidden" name="id" id="id" value="<?= $this->content->id; ?>" />
	<?php }?>
	<div class="row">
		<div class="col-xs-1 form-group">
			<label for="pagare"  class="control-label">pagare</label>
			<input type="text" value="<?= $this->content->pagare; ?>" name="pagare" id="pagare" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="pagare_deceval"  class="control-label">pagare_deceval</label>
			<input type="text" value="<?= $this->content->pagare_deceval; ?>" name="pagare_deceval" id="pagare_deceval" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="fecha"  class="control-label">fecha</label>
			<input type="text" value="<?= $this->content->fecha; ?>" name="fecha" id="fecha" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="estado"  class="control-label">estado</label>
			<input type="text" value="<?= $this->content->estado; ?>" name="estado" id="estado" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="token"  class="control-label">token</label>
			<input type="text" value="<?= $this->content->token; ?>" name="token" id="token" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="modalidad"  class="control-label">modalidad</label>
			<input type="text" value="<?= $this->content->modalidad; ?>" name="modalidad" id="modalidad" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="fecha_firma"  class="control-label">fecha_firma</label>
			<input type="text" value="<?= $this->content->fecha_firma; ?>" name="fecha_firma" id="fecha_firma" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="ip"  class="control-label">ip</label>
			<input type="text" value="<?= $this->content->ip; ?>" name="ip" id="ip" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="fecha_firma1"  class="control-label">fecha_firma1</label>
			<input type="text" value="<?= $this->content->fecha_firma1; ?>" name="fecha_firma1" id="fecha_firma1" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="ip1"  class="control-label">ip1</label>
			<input type="text" value="<?= $this->content->ip1; ?>" name="ip1" id="ip1" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="fecha_firma2"  class="control-label">fecha_firma2</label>
			<input type="text" value="<?= $this->content->fecha_firma2; ?>" name="fecha_firma2" id="fecha_firma2" class="form-control"   >
		</div>
		<div class="col-xs-1 form-group">
			<label for="ip2"  class="control-label">ip2</label>
			<input type="text" value="<?= $this->content->ip2; ?>" name="ip2" id="ip2" class="form-control"   >
		</div>
	</div>
	<div class="row">
		<div class="col-xs-6">
			<button class="btn btn-success btn-block" type="submit">Guardar</button>
		</div>
		<div class="col-xs-6">
			<a class="btn btn-primary btn-block"  href="<?php echo $this->route; ?>">Cancelar</a>
		</div>
	</div>
</form>
</div>