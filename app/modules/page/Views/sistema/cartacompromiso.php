<div class="container py-4">
  <div class="row">
    <div class="col-12">
      <div class="row justify-content-center titulo-seccion no-padding">CARTA DE COMPROMISO
        CANCELACIÓN DE OBLIGACIONES Y
        LEGALIZACIÓN DE GARANTIAS</div>
      <p class="text-justify">Yo, <span
          style="text-decoration:underline;color:#000"><?php echo $this->nombrecompleto ?></span> identificado con
        cédula de
        ciudadanía número <span style="text-decoration:underline;color:#000"><?php echo $this->cedula ?></span> me
        comprometo con el Fondo de
        Empleados D1 SAS FODUNa suministrar los siguientes documentos:</p>

      <p class="text-justify">1. Para las líneas de créditos como: compra de cartera, educación y otras que
        requieran comprobantes de pago, me comprometo a presentar en un plazo
        máximo de cinco (5) días hábiles a partir de la fecha de desembolso, los soportes
        correspondientes a las obligaciones canceladas, las cuales se relacionan a
        continuación:</p>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">ENTIDAD</th>
            <th scope="col">TIPO PRODUCTO/ N° OBLIGACION</th>
            <th scope="col">VALOR
            </th>
          </tr>
        </thead>
        <tbody>
          <?php if($_GET['mod']=="detalle_solicitud"){ ?>
          <?php foreach ($this->obligaciones as $key => $value) {?>
          <tr>
            <td><input type="text" value="<?php echo $value->entidad; ?>" id="obligacion_entidad<?php echo $i ?>"
                class="form-control" name="obligacion[entidad][]" <?php if($i==0){ echo "required";} ?>></td>
            <td><input type="text" value="<?php echo $value->numero_obligacion; ?>" id="obligacion_tipo<?php echo $i ?>"
                class="form-control" name="obligacion[tipo][]" <?php if($i==0){ echo "required";} ?>></td>
            <td><input type="text" value="<?php echo $value->valor; ?>" id="obligacion_valor<?php echo $i ?>"
                class="form-control" onkeyup="puntitos(this);" name="obligacion[valor][]"
                <?php if($i==0){ echo "required";} ?>>
          </tr>
          <?php }?>
          <?php }else{?>
          <?php for ($i=0; $i < 4; $i++) { ?>
          <tr>
            <td><input type="text" id="obligacion_entidad<?php echo $i ?>" class="form-control"
                name="obligacion[entidad][]" <?php if($i==0){ echo "required";} ?>></td>
            <td><input type="text" id="obligacion_tipo<?php echo $i ?>" class="form-control" name="obligacion[tipo][]"
                <?php if($i==0){ echo "required";} ?>></td>
            <td><input type="text" id="obligacion_valor<?php echo $i ?>" class="form-control" onkeyup="puntitos(this);"
                name="obligacion[valor][]" <?php if($i==0){ echo "required";} ?>></td>
          </tr>
          <?php }?>
          <?php }?>
        </tbody>

      </table>
      <p class="text-justify">2. Para las líneas de créditos con garantía prendaria (Vehículo) me comprometo a
        constituir la garantía a nombre de FODUNen un plazo de cinco (5) días hábiles
        como máximo, tiempo que transcurrirá a partir de la fecha de desembolso.</p>
      <p class="text-justify">
        3. Entiendo acepto y autorizo, que tanto en los puntos 1 y 2 del presente documento
        se modifique por parte de Fondtodos la tasa de interés y la línea de crédito,
        correspondientes a la línea de libre inversión, lo cual aplicará para toda la vigencia
        del crédito, si no llegare a cumplir con dichos soportes en los tiempos aquí
        definidos.
      </p>
      <p class="text-justify">A través del presente documento manifiesto estar siendo notificado de que los correos a
        los cuales debo enviar los soportes pertinentes son: <a
          href="mailto:yenny.berdugo@fonkoba.com">yenny.berdugo@fonkoba.com</a> y
        <a href="mailto:katlyn.martinez@fonkoba.com">katlyn.martinez@fonkoba.com</a> indicando en el asunto la palabra
        soporte de pago con el
        respectivo número de cedula.
      </p>

      <div id="firma"></div>

      <div id="signatureShow" class="d-flex align-items-baseline">
        <span class="mr-2 font-weight-bold">Firma: </span>
        <h1 id="<?php if($_GET['mod']==""){ echo "font-5r"; }else{ echo $this->carta->font;}?>">
          <?php echo $this->carta->firma ?></h1>
      </div>

      <div class="fecha_firma mb-3 text-left">
        <span class="font-weight-bold text-left">Fecha: </span><span><?php if($_GET['mod']==""){ ?>
          <?php echo date("Y-m-d");  ?><?php }else{?><?php echo $this->carta->fecha_firma ?> <?php }?></span>
      </div>
      <?php if($_GET['mod']==""){ ?>
      <div class="form-group row align-items-center no-gutters">
        <label for="signature" class="mb-0 mr-2">Nombre</label>
        <input type="text" class="form-control col-md-4" name="firma" id="signature" placeholder="Ingrese su nombre"
          onkeyup="showSignature()" required>
        <a href="#" class="col-md-3 btn btn-font" data-toggle="modal" data-target="#exampleModal">Escoja el
          estilo
          de la firma</a>
      </div>
      <?php }?>
      <input type="hidden" name="font_input" id="font-input" value="font-5r">



    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Font</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body radios">
        <div class="row no-gutters">
          <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
            <label>
              <input type="radio" name="font-radio" value="default" id="font1">
              <h4 id="default">Default</h4>
            </label>
          </div>
          <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
            <label>
              <input type="radio" name="font-radio" value="font-2r" id="font2">
              <h4 id="font-2">Firma</h4>
            </label>
          </div>
          <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
            <label>
              <input type="radio" name="font-radio" value="font-3r" id="font3">
              <h4 id="font-3">Firma</h4>
            </label>
          </div>
          <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
            <label>
              <input type="radio" name="font-radio" value="font-4r" id="font4">
              <h4 id="font-4">Firma</h4>
            </label>
          </div>
          <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
            <label>
              <input type="radio" name="font-radio" value="font-5r" id="font5" checked>
              <h4 id="font-5">Firma</h4>
            </label>
          </div>
          <div class="col-md-4 text-center d-flex justify-content-center align-items-center">
            <label>
              <input type="radio" name="font-radio" value="font-6r" id="font6">
              <h4 id="font-6">Firma</h4>
            </label>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

</div>
