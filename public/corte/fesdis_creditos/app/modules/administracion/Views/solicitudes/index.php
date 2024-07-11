<style type="text/css">
.table td, .table th {
    padding: .5rem;
}
.content-table {
    margin-left: 10px;
    margin-right: 10px;
}
</style>

<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<div class="col-lg-12 text-right margin10"><button class="btn btn-warning btn-sm" onclick="$('#div_filtro').toggle();">Ver filtro</button></div>
	<form action="<?php echo $this->route; ?>" method="post" id="div_filtro" style="display: none;">
        <div class="content-dashboard">
            <div class="row">
				<div class="col-lg-3">
		            <label>cedula</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-verde-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="cedula" value="<?php echo $this->getObjectVariable($this->filters, 'cedula') ?>"></input>
		            </label>
		        </div>
				<div class="col-lg-3">
		            <label>linea</label>
		            <label class="input-group">
	                    <select class="form-control" name="linea">
	                        <option value="">Todas</option>
	                        <?php foreach ($this->list_linea_desembolso as $key => $value) : ?>
	                            <option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'linea') ==  $key) { echo "selected";} ?>><?= $value; ?></option>
	                        <?php endforeach ?>
	                    </select>


		            </label>
		        </div>
				<div class="col-lg-3 d-none">
		            <label>validacion</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="validacion" value="<?php echo $this->getObjectVariable($this->filters, 'validacion') ?>"></input>
		            </label>
		        </div>
				<div class="col-lg-3">
		            <label>nombres</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-cafe " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="nombres" value="<?php echo $this->getObjectVariable($this->filters, 'nombres') ?>"></input>
		            </label>
		        </div>
				<div class="col-lg-3">
		            <label>apellido1</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-azul " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="apellido1" value="<?php echo $this->getObjectVariable($this->filters, 'apellido1') ?>"></input>
		            </label>
		        </div>
				<div class="col-lg-3">
		            <label>apellido2</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-rojo-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="apellido2" value="<?php echo $this->getObjectVariable($this->filters, 'apellido2') ?>"></input>
		            </label>
		        </div>
				<div class="col-lg-3">
					<label>asignado</label>
	                <label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-verde " ><i class="far fa-list-alt"></i></span>
						</div>
	                    <select class="form-control" name="asignado">
	                        <option value="">Todas</option>
	                        <?php foreach ($this->list_asignado as $key => $value) : ?>
	                            <option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'asignado') ==  $key) { echo "selected";} ?>><?= $value; ?></option>
	                        <?php endforeach ?>
	                    </select>
	               </label>
	            </div>
				<div class="col-lg-3">
		            <label>fecha asignado</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-azul-claro " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="fecha_asignado" value="<?php echo $this->getObjectVariable($this->filters, 'fecha_asignado') ?>"></input>
		            </label>
		        </div>
				<div class="col-lg-3">
		            <label>pagare</label>
		            <label class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text input-icono fondo-rosado " ><i class="fas fa-pencil-alt"></i></span>
							</div>
		            <input type="text" class="form-control" name="pagare" value="<?php echo $this->getObjectVariable($this->filters, 'pagare') ?>"></input>
		            </label>
		        </div>
				<div class="col-lg-3">
					<label>quien</label>
	                <label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-azul-claro " ><i class="far fa-list-alt"></i></span>
						</div>
	                    <select class="form-control" name="quien">
	                        <option value="">Todas</option>
	                        <?php foreach ($this->list_quien as $key => $value) : ?>
	                            <option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'quien') ==  $key) { echo "selected";} ?>><?= $value; ?></option>
	                        <?php endforeach ?>
	                    </select>
	               </label>
	            </div>
				<div class="col-lg-3">
					<label>estado autorizo</label>
	                <label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono fondo-morado " ><i class="far fa-list-alt"></i></span>
						</div>
	                    <select class="form-control" name="estado_autorizo">
	                        <option value="">Todas</option>
	                        <?php foreach ($this->list_estado_autorizo as $key => $value) : ?>
	                            <option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'estado_autorizo') ==  $key and $this->getObjectVariable($this->filters, 'estado_autorizo')!="") { echo "selected";} ?>><?= $value; ?></option>
	                        <?php endforeach ?>
	                    </select>
	               </label>
	            </div>
                <div class="col-lg-3">
                    <label>&nbsp;</label>
                    <button type="submit" class="btn btn-block btn-azul"> <i class="fas fa-filter"></i> Filtrar</button>
                </div>
                <div class="col-lg-3">
                    <label>&nbsp;</label>
                    <a class="btn btn-block btn-azul-claro " href="<?php echo $this->route; ?>?cleanfilter=1" > <i class="fas fa-eraser"></i> Limpiar Filtro</a>
                </div>
            </div>
        </div>
    </form>

	<?php
		$validaciones = array("En estudio","Aprobado","Desembolsado","Anulado","Rechazado","Procesado","Aplazado");
	?>
	<div align="left">
		<?php
	    $estilo = "";
	    if($_GET['i']=="" and $_GET['incompletas']=="" and $_GET['sin_terminar']==""){
	        $estilo="background:#7CB33E; ";
	    }
	    ?>
	    <a href="/administracion/solicitudes/" class="btn btn-primary btn-sm" style=" <?php echo $estilo; ?>">Todas</a> &nbsp;
	    <?php for($i=0;$i<=6;$i++){?>
	    <?php
	    $estilo = "";
	    if($_GET['i']==$i and $_GET['i']!=""){
	        $estilo="background:#7CB33E; ";
	    }
	    ?>
	    	<a href="/administracion/solicitudes/?i=<?php echo $i; ?>" class="btn btn-primary btn-sm" style=" <?php echo $estilo; ?>"><?php echo $validaciones[$i]; ?></a> &nbsp;
		<?php }?>

		<?php
	    $estilo = "";
	    if($_GET['incompletas']=="1"){
	        $estilo="background:#7CB33E; ";
	    }
		?>
	    <a href="/administracion/solicitudes/?incompletas=1" class="btn btn-primary btn-sm" style=" <?php echo $estilo; ?>">Incompletas</a> &nbsp;
		<?php
	    $estilo = "";
	    if($_GET['sin_terminar']=="1"){
	        $estilo="background:#7CB33E; ";
	    }
		?>
	    <a href="/administracion/solicitudes/?sin_terminar=1" class="btn btn-primary btn-sm" style=" <?php echo $estilo; ?>">Sin terminar</a> &nbsp;
	</div>

    <div align="center">
    	<br>
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
		    	<div class="col-lg-5">
		    		<div class="titulo-registro">Se encontraron <?php echo $this->register_number; ?> Registros</div>
		    	</div>
		    	<div class="col-lg-3 text-right">
		    		<div class="texto-paginas">Registros por pagina:</div>
		    	</div>
		    	<div class="col-lg-1">
		    		<select class="form-control form-control-sm selectpagination">
		    			<option value="20" <?php if($this->pages == 20){ echo 'selected'; } ?>>20</option>
		    			<option value="30" <?php if($this->pages == 30){ echo 'selected'; } ?>>30</option>
		    			<option value="50" <?php if($this->pages == 50){ echo 'selected'; } ?>>50</option>
		    			<option value="100" <?php if($this->pages == 100){ echo 'selected'; } ?>>100</option>
		    		</select>
		    	</div>
		    	<div class="col-lg-3 d-none">
		    		<div class="text-right"><a class="btn btn-sm btn-success" href="<?php echo $this->route."\manage"; ?>"> <i class="fas fa-plus-square"></i> Crear Nuevo</a></div>
		    	</div>
		    </div>
	    </div>
		<div class="content-table">
		<table class=" table table-striped  table-hover table-administrator text-left">
			<thead>
				<tr>
					<td>ID</td>
					<td>cedula</td>
					<td>linea</td>
					<td>estado</td>
					<td>nombres</td>
					<td>apellido1</td>
					<td>apellido2</td>
					<td>asignado a</td>
					<td>fecha asignado</td>
					<td>pagare</td>
					<td>aprobado por</td>
					<td>VBo</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->lists as $content){ ?>
				<?php $id =  $content->id; ?>
					<tr>
						<td><?=$content->id;?></td>
						<td><?=$content->cedula;?></td>
						<td><?php echo $this->list_linea_desembolso[$content->linea]; ?></td>
						<td>
							<?php if($content->paso!="8"){ ?>
								<?php if($content->incompleta==""){ ?>
									Sin terminar
								<?php }else{ ?>
									Incompleta
								<?php } ?>
							<?php }else{ ?>
								<?php
									$validacion = $validaciones[$content->validacion];
									if($content->estado_autorizo=="4"){
										$validacion = "Rechazada";
									}
									echo $validacion;
								?>
							<?php } ?>
						</td>
						<td><?=$content->nombres;?></td>
						<td><?=$content->apellido1;?></td>
						<td><?=$content->apellido2;?></td>
						<td><?= $this->list_asignado[$content->asignado];?>
						<td><?=$content->fecha_asignado;?></td>
						<td><?=$content->pagare;?></td>
						<td><?= $this->list_quien[$content->quien];?>
						<td><?= $this->list_estado_autorizo[$content->estado_autorizo];?>
					</tr>
					<tr>
						<td colspan="12" class="text-right">
							<div>
								<?php if($_SESSION['kt_login_level']=="1" or $_SESSION['kt_login_level']=="3" or $_SESSION['kt_login_level']=="8"){ ?>
								<a class="btn btn-azul btn-sm" href="<?php echo $this->route;?>/manage?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pen-alt"></i></a>
								<?php } ?>

								<a class="btn btn-warning btn-sm" href="<?php echo $this->route;?>/detalle/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Detalle"><i class="fas fa-search"></i></a>

								<?php if($_SESSION['kt_login_level']=="1" or $_SESSION['kt_login_level']=="3" or $_SESSION['kt_login_level']=="8"){ ?>
								<a class="btn btn-rojo btn-sm" href="/administracion/documentosadicionales/?solicitud=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Documentos adicionales"><i class="fas fa-file"></i></a>
								<?php } ?>

								<?php if($_SESSION['kt_login_level']=="1" or $_SESSION['kt_login_level']=="3" or $_SESSION['kt_login_level']=="8"  or $_SESSION['kt_login_level']=="4"  or $_SESSION['kt_login_level']=="9"){ ?>
								<a class="btn btn-verde btn-sm" href="<?php echo $this->route;?>/incompleta/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Incompleta / Rechazada"><i class="fas fa-exclamation-triangle"></i></a>
								<?php } ?>

								<?php if($_SESSION['kt_login_level']=="1" or $_SESSION['kt_login_level']=="3" or $_SESSION['kt_login_level']=="8"){ ?>
									<?php if($content->validacion=="1"){ ?>
										<a class="btn btn-azul-claro btn-sm" href="<?php echo $this->route;?>/desembolso/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Pasar a Desembolsado"><i class="fas fa-forward"></i></a>
									<?php } ?>
								<?php } ?>

								<?php if($_SESSION['kt_login_level']=="1"){ ?>
									<span data-toggle="tooltip" data-placement="top" title="Eliminar"><a class="btn btn-rojo btn-sm" data-toggle="modal" data-target="#modal<?= $id ?>"  ><i class="fas fa-trash-alt" ></i></a></span>
								<?php } ?>
							</div>

							<?php if($_SESSION['kt_login_level']=="1" or $_SESSION['kt_login_level']=="3" or $_SESSION['kt_login_level']=="8"){ ?>
								<?php if($content->estado_autorizo=="1"){ ?>
									<div class="margin10"><b>Aprobación:</b>
									<a class="btn btn-success btn-sm" href="<?php echo $this->route;?>/enviaracomite/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Enviar a comité de crédito"><i class="fas fa-users"></i></a>

									<a class="btn btn-success btn-sm" href="<?php echo $this->route;?>/formatocomite/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Formato aprobación comité de crédito" target="_blank"><i class="fas fa-users"></i></a>

									<a class="btn btn-azul btn-sm" href="<?php echo $this->route;?>/enviaracomiteespecial/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Enviar a junta directiva"><i class="fas fa-users"></i></a>

									<a class="btn btn-azul btn-sm" href="<?php echo $this->route;?>/formatocomiteespecial/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Formato aprobación junta directiva" target="_blank"><i class="fas fa-users"></i></a>

									<a class="btn btn-warning btn-sm" href="<?php echo $this->route;?>/enviaragerencia/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Enviar a gerencia"><i class="fas fa-user"></i></a>

									<a class="btn btn-warning btn-sm" href="<?php echo $this->route;?>/formatogerencia/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Formato aprobación gerencia" target="_blank"><i class="fas fa-user"></i></a>
									</div>
								<?php } ?>
							<?php } ?>

							<?php if($_SESSION['kt_login_level']=="11" or $_SESSION['kt_login_level']=="12"){ ?>
								<?php if($content->estado_autorizo=="1"){ ?>
									<a class="btn btn-success btn-sm" href="<?php echo $this->route;?>/formatocomite/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Formato aprobación comité ordinario" target="_blank"><i class="fas fa-users"></i></a>
									<a class="btn btn-azul btn-sm" href="<?php echo $this->route;?>/formatocomiteespecial/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Formato aprobación comité especial" target="_blank"><i class="fas fa-users"></i></a>
									<a class="btn btn-warning btn-sm" href="<?php echo $this->route;?>/formatogerencia/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Formato aprobación gerencia" target="_blank"><i class="fas fa-user"></i></a>
								<?php } ?>
							<?php } ?>
							<?php if($content->paso==8){ ?>
							<?php if($content->pagare!="" ){?>
									<?php if($this->pagares_estado[$content->pagare]!="1" ){ ?>
										<?php if($_SESSION['kt_login_level']=="1" or $_SESSION['kt_login_level']=="3"){ ?>

												<a class="btn btn-verde btn-sm mt-2" href="<?php echo $this->route;?>/aprobar/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Generar pagaré"><i class="fas fa-file-signature"></i></a>


										<?php } ?>
									<?php }else{ ?>
										<a class="btn btn-warning btn-sm mt-2" href="<?php echo $this->route;?>/detallepagare/?id=<?= $id ?>" data-toggle="tooltip" data-placement="top" title="Pagaré"><i class="fas fa-file-signature"></i></a>
									<?php } ?>
									<?php } ?>
								<?php } ?>
							<!-- Modal -->
							<div class="modal fade text-left" id="modal<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  	<div class="modal-dialog" role="document">
							    	<div class="modal-content">
							      		<div class="modal-header">
							        		<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
							        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							      	</div>
							      	<div class="modal-body">
							        	<div class="">¿Esta seguro de eliminar este registro?</div>
							      	</div>
								      <div class="modal-footer">
								        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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


<div class="d-none">
	<iframe src="/administracion/listadosarlaft/actualizarnombres/?n=<?php echo microtime(); ?>"></iframe>
</div>