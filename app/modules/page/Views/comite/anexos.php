
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
      <tr>
        <td>
          <div align="center">Desprendible(s) de pago<div>
        </td>
        <td>
          <div align="center">
            <?php if($this->documentos->desprendible_pago!=""){ ?>
            <a href="/images/<?php echo $this->documentos->desprendible_pago; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">1</button></a>
            <?php } ?>
            <?php if($this->documentos->desprendible_pago2!=""){ ?>
            <a href="/images/<?php echo $this->documentos->desprendible_pago2; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">2</button></a>
            <?php } ?>
            <?php if($this->documentos->desprendible_pago3!=""){ ?>
            <a href="/images/<?php echo $this->documentos->desprendible_pago3; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">3</button></a>
            <?php } ?>
            <?php if($this->documentos->desprendible_pago4!=""){ ?>
            <a href="/images/<?php echo $this->documentos->desprendible_pago4; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">4</button></a>
            <?php } ?>
            <div>
        </td>
      </tr>
      <?php if($this->documentos->certificacion!=""){ ?>
      <tr>
        <td>
          <div align="center">Certificado Laboral<div>
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
      <?php } ?>

      <?php if($this->documentos->certificado_laboral!=""){ ?>
      <tr>
        <td>
          <div align="center">Certificado Laboral<div>
        </td>
        <td>
          <div align="center">
            <?php if($this->documentos->certificado_laboral!=""){ ?>
            <a href="/images/<?php echo $this->documentos->certificado_laboral; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <div>
        </td>
      </tr>
      <?php } ?>      
      
      <?php if($this->documentos->cotizacion!=""){ ?>
      <tr>
        <td>
          <div align="center">Cotización<div>
        </td>
        <td>
          <div align="center">
            <?php if($this->documentos->cotizacion!=""){ ?>
            <a href="/images/<?php echo $this->documentos->cotizacion; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <div>
        </td>
      </tr>
      <?php } ?>
      <?php if($this->documentos->certificado_tradicion!=""){ ?>
      <tr>
        <td>
          <div align="center">Certificado tradición<div>
        </td>
        <td>
          <div align="center">
            <?php if($this->documentos->certificado_tradicion!=""){ ?>
            <a href="/images/<?php echo $this->documentos->certificado_tradicion; ?>" target="_blank"><button
                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <div>
        </td>
      </tr>
      <?php } ?>
      <?php if($this->documentos->recibo_matricula!=""){ ?>
      <tr>
        <td>
          <div align="center">Recibo de matricula<div>
        </td>
        <td>
          <div align="center">
            <?php if($this->documentos->recibo_matricula!=""){ ?>
            <a href="/images/<?php echo $this->documentos->recibo_matricula; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <div>
        </td>
      </tr>
      <?php } ?>
      <?php if($this->documentos->impuesto_vehiculo!=""){ ?>
      <tr>
        <td>
          <div align="center">Impuesto del vehículo<div>
        </td>
        <td>
          <div align="center">
            <?php if($this->documentos->impuesto_vehiculo!=""){ ?>
            <a href="/images/<?php echo $this->documentos->impuesto_vehiculo; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <div>
        </td>
      </tr>
      <?php } ?>
      <?php if($this->documentos->soat!=""){ ?>
      <tr>
        <td>
          <div align="center">Soat<div>
        </td>
        <td>
          <div align="center">
            <?php if($this->documentos->soat!=""){ ?>
            <a href="/images/<?php echo $this->documentos->soat; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <div>
        </td>
      </tr>
      <?php } ?>
      <?php if($this->documentos->otros_ingresos!=""){ ?>
      <tr>
        <td>
          <div align="center">Otros documentos<div>
        </td>
        <td>
          <div align="center">
            <?php if($this->documentos->otros_ingresos!=""){ ?>
            <a href="/images/<?php echo $this->documentos->otros_ingresos; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <div>
        </td>
      </tr>
      <?php } ?>
      <?php if($this->documentos->otros_documentos1!=""){ ?>
      <tr>
        <td>
          <div align="center">Otros documentos<div>
        </td>
        <td>
          <div align="center">
            <?php if($this->documentos->otros_documentos1!=""){ ?>
            <a href="/images/<?php echo $this->documentos->otros_documentos1; ?>" target="_blank"><button type="button"
                class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <?php if($this->documentos->otros_documentos2!=""){ ?>
            <br><a href="/images/<?php echo $this->documentos->otros_documentos2; ?>" target="_blank"><button
                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <?php if($this->documentos->otros_documentos3!=""){ ?>
            <br><a href="/images/<?php echo $this->documentos->otros_documentos3; ?>" target="_blank"><button
                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <?php if($this->documentos->otros_documentos4!=""){ ?>
            <br><a href="/images/<?php echo $this->documentos->otros_documentos4; ?>" target="_blank"><button
                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <?php if($this->documentos->otros_documentos5!=""){ ?>
            <br><a href="/images/<?php echo $this->documentos->otros_documentos4; ?>" target="_blank"><button
                type="button" class="btn btn-sm btn-secondary">Abrir</button></a>
            <?php } ?>
            <div>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
</div>