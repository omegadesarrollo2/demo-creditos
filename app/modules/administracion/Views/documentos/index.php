<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form action="<?php echo $this->route; ?>" method="post">
        <div class="content-dashboard">
            <div class="row">
				<div class="col-3">
		            <label>solicitud</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="solicitud" value="<?php echo $this->getObjectVariable($this->filters, 'solicitud') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>cedula</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="cedula" value="<?php echo $this->getObjectVariable($this->filters, 'cedula') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>desprendible_pago</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="desprendible_pago" value="<?php echo $this->getObjectVariable($this->filters, 'desprendible_pago') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>desprendible_pago2</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="desprendible_pago2" value="<?php echo $this->getObjectVariable($this->filters, 'desprendible_pago2') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>desprendible_pago3</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="desprendible_pago3" value="<?php echo $this->getObjectVariable($this->filters, 'desprendible_pago3') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>desprendible_pago4</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="desprendible_pago4" value="<?php echo $this->getObjectVariable($this->filters, 'desprendible_pago4') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>certificado_laboral</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-morado " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="certificado_laboral" value="<?php echo $this->getObjectVariable($this->filters, 'certificado_laboral') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>otros_ingresos</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="otros_ingresos" value="<?php echo $this->getObjectVariable($this->filters, 'otros_ingresos') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>certificado_tradicion</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="certificado_tradicion" value="<?php echo $this->getObjectVariable($this->filters, 'certificado_tradicion') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>estado_obligacion</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="estado_obligacion" value="<?php echo $this->getObjectVariable($this->filters, 'estado_obligacion') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>estado_obligacion2</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="estado_obligacion2" value="<?php echo $this->getObjectVariable($this->filters, 'estado_obligacion2') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>estado_obligacion3</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="estado_obligacion3" value="<?php echo $this->getObjectVariable($this->filters, 'estado_obligacion3') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>factura_proforma</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="factura_proforma" value="<?php echo $this->getObjectVariable($this->filters, 'factura_proforma') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>recibo_matricula</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="recibo_matricula" value="<?php echo $this->getObjectVariable($this->filters, 'recibo_matricula') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>contrato_vivienda</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="contrato_vivienda" value="<?php echo $this->getObjectVariable($this->filters, 'contrato_vivienda') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>declaracion_renta</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-morado " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="declaracion_renta" value="<?php echo $this->getObjectVariable($this->filters, 'declaracion_renta') ?>"></input>
		            </label>
		        </div>
				<div class="col-3">
		            <label>tipo</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-verde " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="tipo" value="<?php echo $this->getObjectVariable($this->filters, 'tipo') ?>"></input>
		            </label>
		        </div>
                <div class="col-3">
                    <label class="line-break">&nbsp;</label>
                    <button type="submit" class="btn btn-block btn-azul"> <i class="fas fa-filter"></i> Filtrar</button>
                </div>
                <div class="col-3">
                    <label class="line-break">&nbsp;</label>
                    <a class="btn btn-block btn-azul-claro " href="<?php echo $this->route; ?>?cleanfilter=1" > <i class="fas fa-eraser"></i> Limpiar Filtro</a>
                </div>
            </div>
        </div>
    </form>
    <div align="center">
		<ul class="pagination justify-content-center">
	    <?php
	    	$url = $this->route;
	        if ($this->totalpages > 1) {
	            if ($this->page != 1)
	                echo '<li class="page-item" ><a class="page-link"  href="'.$url.'?page='.($this->page-1).'"> &laquo; Anterior </a></li>';
	            for ($i=1;$i<=$this->totalpages;$i++) {
	                if ($this->page == $i)
	                    echo '<li class="active page-item"><a class="page-link">'.$this->page.'</a></li>';
	                else
	                    echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.$i.'">'.$i.'</a></li>  ';
	            }
	            if ($this->page != $this->totalpages)
	                echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($this->page+1).'">Siguiente &raquo;</a></li>';
	        }
	  	?>
	  	</ul>
	</div>
	<div class="content-dashboard">
	    <div class="franja-paginas">
		    <div class="row">
		    	<div class="col-5">
		    		<div class="titulo-registro">Se encontraron <?php echo $this->register_number; ?> Registros</div>
		    	</div>
		    	<div class="col-3 text-end">
		    		<div class="texto-paginas">Registros por pagina:</div>
		    	</div>
		    	<div class="col-1">
		    		<select class="form-control form-control-sm selectpagination">
		    			<option value="20" <?php if($this->pages == 20){ echo 'selected'; } ?>>20</option>
		    			<option value="30" <?php if($this->pages == 30){ echo 'selected'; } ?>>30</option>
		    			<option value="50" <?php if($this->pages == 50){ echo 'selected'; } ?>>50</option>
		    			<option value="100" <?php if($this->pages == 100){ echo 'selected'; } ?>>100</option>
		    		</select>
		    	</div>
		    	<div class="col-3">
		    		<div class="text-end"><a class="btn btn-sm btn-success" href="<?php echo $this->route."\manage"; ?>"> <i class="fas fa-plus-square"></i> Crear Nuevo</a></div>
		    	</div>
		    </div>
	    </div>
		<div class="content-table">
		<table class=" table table-striped  table-hover table-administrator text-start">
			<thead>
				<tr>
					<td>solicitud</td>
					<td>cedula</td>
					<td>desprendible_pago</td>
					<td>desprendible_pago2</td>
					<td>desprendible_pago3</td>
					<td>desprendible_pago4</td>
					<td>certificado_laboral</td>
					<td>otros_ingresos</td>
					<td>certificado_tradicion</td>
					<td>estado_obligacion</td>
					<td>estado_obligacion2</td>
					<td>estado_obligacion3</td>
					<td>factura_proforma</td>
					<td>recibo_matricula</td>
					<td>contrato_vivienda</td>
					<td>declaracion_renta</td>
					<td>tipo</td>
					<td width="100"></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->lists as $content){ ?>
				<?php $id =  $content->id; ?>
					<tr>
						<td><?=$content->solicitud;?></td>
						<td><?=$content->cedula;?></td>
						<td><?=$content->desprendible_pago;?></td>
						<td><?=$content->desprendible_pago2;?></td>
						<td><?=$content->desprendible_pago3;?></td>
						<td><?=$content->desprendible_pago4;?></td>
						<td><?=$content->certificado_laboral;?></td>
						<td><?=$content->otros_ingresos;?></td>
						<td><?=$content->certificado_tradicion;?></td>
						<td><?=$content->estado_obligacion;?></td>
						<td><?=$content->estado_obligacion2;?></td>
						<td><?=$content->estado_obligacion3;?></td>
						<td><?=$content->factura_proforma;?></td>
						<td><?=$content->recibo_matricula;?></td>
						<td><?=$content->contrato_vivienda;?></td>
						<td><?=$content->declaracion_renta;?></td>
						<td><?=$content->tipo;?></td>
						<td class="text-end">
							<div>
								<a class="btn btn-azul btn-sm" href="<?php echo $this->route;?>/manage?id=<?= $id ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar"><i class="fas fa-pen-alt"></i></a>
								<span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar"><a class="btn btn-rojo btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?= $id ?>"  ><i class="fas fa-trash-alt" ></i></a></span>
							</div>
							<!-- Modal -->
							<div class="modal fade text-start" id="modal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  	<div class="modal-dialog" role="document">
							    	<div class="modal-content">
							      		<div class="modal-header">
							        		<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
							        		<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							      	</div>
							      	<div class="modal-body">
							        	<div class="">¿Esta seguro de eliminar este registro?</div>
							      	</div>
								      <div class="modal-footer">
								        	<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
								        	<a class="btn btn-danger" href="<?php echo $this->route;?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf;?><?php echo ''; ?>" >Eliminar</a>
								      </div>
							    	</div>
							  	</div>
							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<input type="hidden" id="csrf" value="<?php echo $this->csrf ?>"><input type="hidden" id="page-route" value="<?php echo $this->route; ?>/changepage">
	</div>
	 <div align="center">
		<ul class="pagination justify-content-center">
	    <?php
	    	$url = $this->route;
	        if ($this->totalpages > 1) {
	            if ($this->page != 1)
	                echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($this->page-1).'"> &laquo; Anterior </a></li>';
	            for ($i=1;$i<=$this->totalpages;$i++) {
	                if ($this->page == $i)
	                    echo '<li class="active page-item"><a class="page-link">'.$this->page.'</a></li>';
	                else
	                    echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.$i.'">'.$i.'</a></li>  ';
	            }
	            if ($this->page != $this->totalpages)
	                echo '<li class="page-item"><a class="page-link" href="'.$url.'?page='.($this->page+1).'">Siguiente &raquo;</a></li>';
	        }
	  	?>
	  	</ul>
	</div>
</div>