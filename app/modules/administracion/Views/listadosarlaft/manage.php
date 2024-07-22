<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>

<div class="cotext-startluid">

	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>" data-bs-toggle="validator">

		<div class="content-dashboard">

			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">

			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">

			<?php if ($this->content->id) { ?>

				<input type="hidden" name="id" id="id" value="<?= $this->content->id; ?>" />

			<?php }?>

			<div class="row">

				<div class="col-12 form-group">

					<label for="cedula"  class="control-label">cedula</label>

					<label class="input-group">

						<div class="input-group-prepend">

							<span class="input-group-text input-icono  fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>

						</div>

						<input type="text" value="<?= $this->content->cedula; ?>" name="cedula" id="cedula" class="form-control"   >

					</label>

					<div class="help-block with-errors"></div>

				</div>

				<div class="col-12 form-group">

					<label for="fecha"  class="control-label">fecha actualizacion</label>

					<label class="input-group">

						<div class="input-group-prepend">

							<span class="input-group-text input-icono  fondo-azul " ><i class="fas fa-pencil-alt"></i></span>

						</div>

						<input type="text" value="<?= $this->content->fecha; ?>" name="fecha" id="fecha" class="form-control"   >

					</label>

					<div class="help-block with-errors"></div>

				</div>

			</div>

		</div>

		<div class="botones-acciones">

			<button class="btn btn-guardar" type="submit">Guardar</button>

			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>

		</div>

	</form>

</div>