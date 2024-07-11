<?php if(count($this->adicionales)>0){?>
<div class="row">
	<div class="col-12 titulo-seccion text-center">Documentos adicionales</div>
	<div class="col-12">
		<table width="100%" border="1">
			<tr class="fondo-gris2">
				<th><div align="center">Documento</div></th>
				<th><div align="center">Archivo</div></th>
			</tr>
			<?php foreach ($this->adicionales as $key => $documento): ?>
				<tr>
					<td><div align="center"><?php echo $documento->titulo; ?><div></td>
					<td><div align="center"><a href="/images/<?php echo $documento->archivo; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a><div></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
<?php }?>