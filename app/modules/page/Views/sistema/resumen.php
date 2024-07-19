<?php
if ($_GET['prueba'] == "1") {
  print_r($_SESSION);
}
?>

<div class="container">
  <div class="row">
    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
      <div class="col-12">
        <div class="row">
          <div class="col-6 text-left">
            <h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3>
          </div>
          <div class="col-6 text-right">
            <h3 class="paso">Paso 3/3</h3>
          </div>
          <div align="left" class="col-12">
            <div class="separador_login2"></div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row form-group">
        <div class="col-12">
            <?php if($this->documentos && $this->documentos->desprendible_pago == NULL && $this->documentos->desprendible_pago2 == NULL && $this->documentos->desprendible_pago3 == NULL && $this->documentos->desprendible_pago4 == NULL && $this->documentos->desprendible_pago5 == NULL && $this->documentos->certificado_laboral == NULL && $this->documentos->otros_ingresos == NULL && $this->documentos->certificado_tradicion == NULL && $this->documentos->estado_obligacion == NULL && $this->documentos->estado_obligacion2 == NULL && $this->documentos->estado_obligacion3 == NULL && $this->documentos->factura_proforma == NULL && $this->documentos->recibo_matricula == NULL && $this->documentos->contrato_vivienda == NULL && $this->documentos->declaracion_renta == NULL && $this->documentos->formulario_seguro == NULL && $this->documentos->orden_medica == NULL && $this->documentos->certificacion == NULL && $this->documentos->cotizacion == NULL && $this->documentos->peritaje_vehiculo == NULL && $this->documentos->evidencia_calamidad == NULL && $this->documentos->impuesto_vehiculo == NULL && $this->documentos->soat == NULL && $this->documentos->documento_recoge_creditos == NULL && $this->documentos->otros_documentos1 == NULL && $this->documentos->otros_documentos2 == NULL && $this->documentos->otros_documentos3 == NULL && $this->documentos->otros_documentos4 == NULL && $this->documentos->otros_documentos5 == NULL){ ?>
              <div class="alert alert-warning" role="alert">
                Es posible que ocurriera un error al cargar los documentos, por favor revise los nombres y tamaño de los archivos.
              </div>
            <?php } ?>
          </div>
          <div class="col-md-12 col-lg-12">

            <div class="row">
              <div class="col-lg-12">
                <?php echo $this->tabla; ?>
              </div>
              <div class="col-12 text-center texto-azul"><br>
                Si está de acuerdo con su solicitud por favor haga clic en Radicar solicitud, si desea realizar algún cambio haga clic en editar.<br><br>
              </div>

              <?php if ($_GET['mod'] != "detalle_solicitud") { ?>
                <div align="center" class="col-12 text-center"><input name="Anterior" type="button" value="Editar" class="btn btn-verde d-inline-block" onclick="window.location='/page/sistema/?id=<?php echo $this->id; ?>';" /> <input name="Enviar" type="submit" value="Radicar solicitud" class="btn btn-verde d-inline-block" /></div><br>
              <?php } ?>

              <input name="paso" type="hidden" value="7" />
              <input name="id" type="hidden" value="<?php echo $this->id; ?>" />
            </div>

          </div>

        </div>
      </div>


    </form>
  </div>
</div>

<style>
  footer{
    display: none !important;
  }
</style>