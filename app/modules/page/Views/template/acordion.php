<div class="accordion" id="accordion<?php echo $columna->contenido_id;?>">
	<?php foreach ( $acordioncontent as $key3 => $acordion): ?>
		<div class="card">
			<div class="card-header" id="heading<?php echo $acordion->contenido_id;?>"  type="button"   data-toggle="collapse" data-target="#collapse<?php echo $acordion->contenido_id;?>" <?php if($key3 == 0){ ?> aria-expanded="true" <?php } ?> aria-controls="collapse<?php echo $acordion->contenido_id;?>">
				<?php echo $acordion->contenido_titulo;?>
			</div>
			<div id="collapse<?php echo $acordion->contenido_id;?>" class="collapse <?php if($key3 == 0){ ?>show<?php } ?>" aria-labelledby="heading<?php echo $acordion->contenido_id;?>" data-parent="#accordion<?php echo $columna->contenido_id;?>">
				<div class="card-body">
					<?php if($acordion->contenido_imagen){ ?>
						<div class="imagen-contenido">
							<div><img src="/images/<?php echo $acordion->contenido_imagen; ?>"></div>
						</div>
					<?php } ?>
					<div>
						<div class="descripcion">
							<?php echo $acordion->contenido_descripcion; ?>
						</div>
						<?php if($acordion->contenido_enlace){ ?>
							<div>
								<a href="<?php $acordion->contenido_enlace; ?>" <?php if($acordion->contenido_enlace_abrir == 1){ ?> target="_blank" <?php } ?>   class="btn btn-block btn-vermas"> <?php if( $acordion->contenido_vermas){ ?><?php echo $acordion->contenido_vermas; ?><?php } else { ?>Ver Más<?php } ?></a>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach ?>
</div>