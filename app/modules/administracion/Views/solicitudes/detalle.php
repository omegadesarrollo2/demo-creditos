<link rel="stylesheet" href="/skins/page/css/global.css?v=1.04">
<h1 class="titulo-principal"><i class="fas fa-hand-holding-usd"></i> Detalle solicitud de crédito</h1>
<div class="container-fluid">
  <div class="row">
    <div class="col-12"><br></div>
    <div class="col-12 button-detail-tabs">
      <a href="/administracion/solicitudes/detalle/?paso=&id=<?php echo $_GET['id']; ?>&usuario=<?php echo $_GET['usuario']; ?>" class="btn btn-primary <?php if($_GET['paso'] == ''){ echo 'active'; } ?>">Resumen</a>
      <a href="/administracion/solicitudes/detalle/?paso=1&id=<?php echo $_GET['id']; ?>&usuario=<?php echo $_GET['usuario']; ?>" class="btn btn-primary <?php if($_GET['paso'] == '1'){ echo 'active'; } ?>">Información del asociado</a>
      <a href="/administracion/solicitudes/solicitudpdf?id=<?php echo $_GET['id'] ?>&bootstrap=1" class="btn btn-primary ">Descargar solicitud de crédito</a>
      <!-- <a href="/administracion/solicitudes/detalle/?paso=4&id=<?php echo $_GET['id']; ?>&usuario=<?php echo $_GET['usuario']; ?>" class="btn btn-primary">Referencias</a>  -->
      <a href="/administracion/solicitudes/detalle/?paso=5&id=<?php echo $_GET['id']; ?>&usuario=<?php echo $_GET['usuario']; ?>" class="btn btn-primary <?php if($_GET['paso'] == '5'){ echo 'active'; } ?>"  data-bs-toggle="modal" data-bs-target="#modalGarantias">Garantía</a>
      <?php if($this->solicitud->linea == 'EDU' || $this->solicitud->linea == 'CC' || $this->solicitud->linea == 'CCC' || $this->solicitud->linea == 'VEH'){ ?>
        <a href="/administracion/solicitudes/detalle/?paso=carta&id=<?php echo $_GET['id']; ?>&usuario=<?php echo $_GET['usuario']; ?>" class="btn btn-primary <?php if($_GET['paso'] == 'carta'){ echo 'active'; } ?>">
          Carta de compromiso
        </a>
      <?php } ?>
      <a href="/administracion/solicitudes/libranza?id=<?php echo $_GET['id']; ?>" class="btn btn-primary d-none" target="_blank">Libranza</a>

      <a href="/administracion/solicitudes/detalle/?paso=6&id=<?php echo $_GET['id']; ?>&usuario=<?php echo $_GET['usuario']; ?>" class="btn btn-primary <?php if($_GET['paso'] == '6'){ echo 'active'; } ?>">Documentos</a>

      <!-- <a href="/administracion/solicitudes/detalle/?paso=sarlaft&id=<?php echo $_GET['id']; ?>&usuario=<?php echo $_GET['usuario']; ?>" class="btn btn-primary">Sarlaft</a> -->
      <?php if ($totalRows_rsReferencia > 0) { ?><a href="../pp.php?mod=detalle_solicitud&paso=referenciacion&id=<?php echo $_GET['id']; ?>&usuario=<?php echo $_GET['usuario']; ?>" class="btn btn-primary">Referenciación</a><?php } ?>
      <a class="btn btn-primary <?php if($_GET['paso'] == 'dc'){ echo 'active'; } ?>" href="/administracion/solicitudes/detalle/?paso=dc&id=<?php echo $_GET['id']; ?>">Puntaje Datacredito</a>
      <a class="btn btn-success" href="/administracion/solicitudes/">Regresar</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12" id="pasos1">
      <?php
      $getmod = "detalle_solicitud";
      if ($_GET['paso'] == "") {
        echo "<embed width='100%' height='1200' src='/page/sistema/resumen/?id=" . $_GET['id'] . "&mod=detalle_solicitud'></embed>";
      }
      if ($_GET['paso'] == 1) {
      echo "<embed width='100%' height='3050' id='embed_paso1' src='/page/sistema/paso1/?id=".$_GET['id']."&mod=detalle_solicitud&monto=1'></embed><br>
		  <div class='text-center mt-4'>
		  <!-- <a target='_blank' class='btn btn-primary' href='/administracion/solicitudes/solicitudpdf?id=".$_GET['id']."&bootstrap=1'>Descargar en PDF</a> -->
		  </div>
		  ";
      }
      if ($_GET['paso'] == 2) {
        echo "<embed width='100%' height='400' src='/page/sistema/paso2/?id=" . $_GET['id'] . "&mod=detalle_solicitud'></embed>";
      }
      if ($_GET['paso'] == 3) {
        echo "<embed width='100%' height='400' src='/page/sistema/paso3/?id=" . $_GET['id'] . "&mod=detalle_solicitud'></embed>";
      }
      if ($_GET['paso'] == "carta") {
        echo "
        <embed width='100%' height='400' src='/page/sistema/cartacompromiso/?id=" . $_GET['id'] . "&mod=detalle_solicitud'>
        </embed>
        <div class='text-center mt-4'>
          <a target='_blank' class='btn btn-primary' href='/administracion/solicitudes/cartapdf?id=".$_GET['id']."'>
            Descargar en PDF
          </a>
        </div>
        ";
        
      }

        if ($_GET['paso'] == "dc") {
          echo '
            <div class="" style="background: #fff; padding-top: 100px; padding-bottom: 100px;">
              <div class="d-flex align-items-center justify-content-center">
                 <input type="text" class="dial me-4" data-min="0" data-max="1000" value="'.$this->score.'">
                 <h3 style="font-size: 3rem; color: #0d88c1; margin-left: 50px">Puntaje Datacrédito</h3>
              </div>
            </div> 
        ';

        }
      
      if ($_GET['paso'] == 4) {
        echo "<embed width='100%' height='400' src='/page/sistema/paso4/?id=" . $_GET['id'] . "&mod=detalle_solicitud'></embed>";
      }
      if ($_GET['paso'] == 5) {
        echo "<embed width='100%' height='200' src='/page/sistema/paso5/?id=" . $_GET['id'] . "&mod=detalle_solicitud'></embed>";
        if ($_GET['prueba'] == "") {
          if ($this->solicitud->tipo_garantia == "2") {
            echo "<h2>CODEUDOR 1</h2>";
            echo "<embed width='100%' height='600' src='/page/codeudor/?id=" . $_GET['id'] . "&mod=detalle_solicitud&n=1'></embed>";
            if ($this->codeudor2->id > 0) {
              echo "<h2>CODEUDOR 2</h2>";
              echo "<embed width='100%' height='600' src='/page/codeudor/?id=" . $_GET['id'] . "&mod=detalle_solicitud&n=2'></embed>";
            }
          }
          if ($this->solicitud->tipo_garantia == "3") {
            echo "<embed width='100%' height='400' src='/page/sistema/fondomutual/?id=" . $_GET['id'] . "&mod=detalle_solicitud'></embed>";
          }
        }
      }
      if ($_GET['paso'] == 6) {
        ?>
        <!-- echo "<embed width='100%' height='400' src='/page/sistema/paso6/?id=" . $_GET['id'] . "&mod=detalle_solicitud'></embed>";
        echo "<div class='container'>";
        echo $this->getRoutPHP('modules/page/Views/comite/documentosadicionales.php');
        echo "</div><br><br><br>"; -->
        <?php
        // echo '<pre>';
        //   print_r($this->documentos);
        // echo '</pre>';
        $nombres_amigables = [
          'cedula' => 'Cédula',
          'desprendible_pago' => 'Desprendible de Pago',
          'desprendible_pago2' => 'Desprendible de Pago 2',
          'desprendible_pago3' => 'Desprendible de Pago 3',
          'desprendible_pago4' => 'Desprendible de Pago 4',
          'desprendible_pago5' => 'Desprendible de Pago 5',
          'certificado_laboral' => 'Certificado Laboral',
          'otros_ingresos' => 'Otros Ingresos',
          'certificado_tradicion' => 'Certificado de Tradición',
          'estado_obligacion' => 'Estado de Obligación',
          'estado_obligacion2' => 'Estado de Obligación 2',
          'estado_obligacion3' => 'Estado de Obligación 3',
          'factura_proforma' => 'Factura Proforma',
          'recibo_matricula' => 'Recibo de Matrícula',
          'contrato_vivienda' => 'Contrato de Vivienda',
          'declaracion_renta' => 'Declaración de Renta',
          'formulario_seguro' => 'Formulario de Seguro',
          'orden_medica' => 'Orden Médica',
          'certificacion' => 'Certificación',
          'cotizacion' => 'Cotización',
          'peritaje_vehiculo' => 'Peritaje de Vehículo',
          'evidencia_calamidad' => 'Evidencia de Calamidad',
          'impuesto_vehiculo' => 'Impuesto de Vehículo',
          'soat' => 'SOAT',
          'documento_recoge_creditos' => 'Documento Recoge Créditos',
          'otros_documentos1' => 'Otros Documentos 1',
          'otros_documentos2' => 'Otros Documentos 2',
          'otros_documentos3' => 'Otros Documentos 3',
          'otros_documentos4' => 'Otros Documentos 4',
          'otros_documentos5' => 'Otros Documentos 5'
      ];

      $documentos = $this->documentos;
      if($documentos == null){
        $documentos = new stdClass();
      }
      $documentos = get_object_vars($documentos);
      unset($documentos['id']);
      unset($documentos['solicitud']);
      unset($documentos['tipo']);
    
        ?>
        <div class="contenedor-documentos">
          <div class="table-header">
            <div class="row">
                <div class="col-6 col">Documento</div>
                <div class="col-6 col">Adjuntos</div>
            </div>
          </div>
          <div class="table-body">
            <?php foreach ($documentos as $key => $documento) : ?>
              <?php if($documento != ''){ ?>
                <div class="row">
                  <div class="col-6 col">
                    <?php echo $nombres_amigables[$key]  ?></td>
                  </div>
                  <div class="col-6 col">
                    <a href="/images/<?php echo $documento ?>" download=""><i class="fas fa-file-download"></i> Descargar documento</a>
                  </div>
                </div>
              <?php } ?>
            <?php endforeach; ?>
          </div>
        </div>
        <?php
      }
      if ($_GET['paso'] == 7) {
        echo "<embed width='100%' height='400' src='/page/sistema/paso7/?id=" . $_GET['id'] . "&mod=detalle_solicitud'></embed>";
      }
      if ($_GET['paso'] == "referenciacion") {
        echo "<embed width='100%' height='400' src='/page/sistema/referenciacion/?id=" . $_GET['id'] . "&mod=detalle_solicitud'></embed>";
      }
      if ($_GET['paso'] == "sarlaft") {
        echo "<embed width='100%' height='400' src='/page/sarlaft/?id=" . $_GET['id'] . "&documento=" . $this->solicitud->cedula . "&mod=detalle_solicitud'></embed>";
      }
      ?>
    </div>
  </div>
</div>

<div class="modal fade modal-correos" id="modalGarantias" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-start">
        <form action="/administracion/solicitudes/updatecorreos" class="row">
          <div class="col-12">
            <h4 class="comun-title">Garantías</h4>
          </div>
          <div class="form-group col-12 mt-1">
            <label for="">Garantía seleccionada</label>
            <input type="text" class="form-control" name="id" value="<?php echo $this->garantia ?>" readonly>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
  .table-header{
    background-color: #121b4b;
    color: #fff;
    border-radius: 12px;
    border: none;
  }

  .table-header .row{
    margin: 0;
  }
  .table-header .col{
    text-align: center;
    border: none;
    padding: 10px;
  }
  .table-body .row{
    border: 1px solid #e0e0e0;
    margin: 10px 0;
    border-radius: 12px;
  }
  .table-body .col{
    text-align: center;
    border: none;
    padding: 10px;
  }
  .table-body .col a{
    color: #00c6ef;
    top: none;
    transition: 300ms ease;
  }
  .table-body .col a:hover{
    color: #76b72b;
  }
  .contenedor-documentos{
    background-color: #fff;
    padding: 20px;
    padding-top: 50px;
    min-height: calc(100vh - 200px);
  }
  </style>