<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<br><br>
			Su aprobación fue enviada.<br><br>
		</div>
	</div>
</div>

<?php if($this->id!="" and $this->validacion=="1"){ ?>
	<div style="display: none;">
		<iframe src="https://creditosfondtodos.com.co/administracion/solicitudes/aprobar/?id=<?= $this->id; ?>"></iframe>
	</div>
<?php } ?>