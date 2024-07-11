<?php if($this->solicitud->linea=="ING"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Asociado</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <!-- <tr>
				<td><div align="center">Cédula<div></td>
				<td><div align="center">
					<?php if($this->documentos->cedula!=""){ ?>
						<a href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
					<?php } ?>
					<div></td>
			</tr> -->
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Otros documentos<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->otros_ingresos!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>

<?php if($this->solicitud->linea=="TR" || $this->solicitud->linea=="LI" || $this->solicitud->linea=="FE" || $this->solicitud->linea=="AP"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Asociado</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <!-- <tr>
				<td><div align="center">Cédula<div></td>
				<td><div align="center">
					<?php if($this->documentos->cedula!=""){ ?>
						<a href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
					<?php } ?>
					<div></td>
			</tr> -->
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>

        </table>
    </div>
</div>
<?php } ?>


<?php if($this->solicitud->linea=="CD"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Asociado</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <!-- <tr>
				<td><div align="center">Cédula<div></td>
				<td><div align="center">
					<?php if($this->documentos->cedula!=""){ ?>
						<a href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
					<?php } ?>
					<div></td>
			</tr> -->
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Evidencia de la calamidad<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->evidencia_calamidad!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->evidencia_calamidad; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Otros documentos<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->otros_ingresos!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>

<?php if($this->solicitud->linea=="SA"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Asociado</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <!-- <tr>
				<td><div align="center">Cédula<div></td>
				<td><div align="center">
					<?php if($this->documentos->cedula!=""){ ?>
						<a href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
					<?php } ?>
					<div></td>
			</tr> -->
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Orden médica o de servicios<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->orden_medica!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->orden_medica; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>

<?php if($this->solicitud->linea=="EDU"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Asociado</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <!-- <tr>
				<td><div align="center">Cédula<div></td>
				<td><div align="center">
					<?php if($this->documentos->cedula!=""){ ?>
						<a href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
					<?php } ?>
					<div></td>
			</tr> -->
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Recibo Matricula<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->recibo_matricula!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->recibo_matricula; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>


<?php if($this->solicitud->linea=="CC"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Asociado</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <!-- <tr>
				<td><div align="center">Cédula<div></td>
				<td><div align="center">
					<?php if($this->documentos->cedula!=""){ ?>
						<a href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
					<?php } ?>
					<div></td>
			</tr> -->
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Certificación<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->certificacion!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->certificacion; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Otros documentos<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->otros_ingresos!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>

<?php if($this->solicitud->linea=="CCV"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Asociado</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <!-- <tr>
				<td><div align="center">Cédula<div></td>
				<td><div align="center">
					<?php if($this->documentos->cedula!=""){ ?>
						<a href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
					<?php } ?>
					<div></td>
			</tr> -->
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Cotización<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->cotizacion!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->cotizacion; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Otros documentos<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->otros_ingresos!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>

<?php if($this->solicitud->linea=="VEH"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Asociado</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <!-- <tr>
				<td><div align="center">Cédula<div></td>
				<td><div align="center">
					<?php if($this->documentos->cedula!=""){ ?>
						<a href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
					<?php } ?>
					<div></td>
			</tr> -->
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Peritaje del vehículo<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->peritaje_vehiculo!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->peritaje_vehiculo; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
			</tr>
			<tr>
                <td>
                    <div align="center">Paz y salvo del impuesto del vehículo<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->impuesto_vehiculo!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->impuesto_vehiculo; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
			</tr>
			<tr>
                <td>
                    <div align="center">SOAT vigente del vehiculo<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->soat!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->soat; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Otros documentos<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->otros_ingresos!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>

<?php if($this->solicitud->linea=="CV"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Asociado</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <!-- <tr>
				<td><div align="center">Cédula<div></td>
				<td><div align="center">
					<?php if($this->documentos->cedula!=""){ ?>
						<a href="/images/<?php echo $this->documentos->cedula; ?>" target="_blank"><button type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
					<?php } ?>
					<div></td>
			</tr> -->
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">3</button></a>
                        <?php } ?>
                        <?php if($this->documentos->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">4</button></a>
                        <?php } ?>
                        <div>
                </td>
			</tr>
			<tr>
                <td>
                    <div align="center">Certificado laboral<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->certificado_laboral!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->certificado_laboral; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Otros documentos<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos->otros_ingresos!=""){ ?>
                        <a href="/images/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>


<?php if($this->solicitud->tipo_garantia=="2"){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Codeudor</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <tr>
                <td>
                    <div align="center">Cédula<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos2->cedula!=""){ ?>
                        <a href="/images/<?php echo $this->documentos2->cedula; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos2->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos2->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos2->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos2->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos2->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos2->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos2->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos2->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>

<?php if($this->codeudor2->id>0){ ?>
<div class="row">
    <div class="col-12 titulo-seccion text-center">Anexos del Codeudor2</div>
    <div class="col-12">
        <table width="100%" border="1">
            <tr class="fondo-gris2">
                <th>
                    <div align="center">Documento</div>
                </th>
                <th>
                    <div align="center">Archivo</div>
                </th>
            </tr>
            <tr>
                <td>
                    <div align="center">Cédula<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos3->cedula!=""){ ?>
                        <a href="/images/<?php echo $this->documentos3->cedula; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">Desprendible(s) de pago<div>
                </td>
                <td>
                    <div align="center">
                        <?php if($this->documentos3->desprendible_pago!=""){ ?>
                        <a href="/images/<?php echo $this->documentos3->desprendible_pago; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">1</button></a>
                        <?php } ?>
                        <?php if($this->documentos3->desprendible_pago2!=""){ ?>
                        <a href="/images/<?php echo $this->documentos3->desprendible_pago2; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos3->desprendible_pago3!=""){ ?>
                        <a href="/images/<?php echo $this->documentos3->desprendible_pago3; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <?php if($this->documentos3->desprendible_pago4!=""){ ?>
                        <a href="/images/<?php echo $this->documentos3->desprendible_pago4; ?>" target="_blank"><button
                                type="button" class="btn btn-sm btn-secondary">2</button></a>
                        <?php } ?>
                        <div>
                </td>
            </tr>
        </table>
    </div>
</div>
<?php } ?>

<?php } ?>