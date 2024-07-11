<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="formITSign row mt-4">
        <div class="col-12 my-2">
          <a href="/administracion/solicitudes" class="btn btn-info">Regresar</a>
        </div>
        <div class="col-12 mb-4">
          <h2>Documentos firmados</h2>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <h4>Pagaré</h4>
            </div>
            <?php if($this->pagare_url){ ?>
              <div class="col-12">
                <object data="/images/<?php echo $this->pagare_url ?>" type="application/pdf" width="100%" height="600px">
                  <p>Tu navegador no soporta PDF. Descarga el archivo <a href="<?php echo $this->pagare_url ?>">aquí</a>.
                  </p>
                </object>
              </div>
            <?php }else{ ?>
              <div
                class="alert alert-warning"
                role="alert"
              >
                Este documento no ha sido firmado.
              </div>
              
            <?php } ?>
          </div>
        </div>
        <div class="col-12 my-5">
          <div class="row">
            <div class="col-12">
              <h4>Solicitud de crédito</h4>
            </div>
            <?php if($this->solicitud_url){ ?>
              <div class="col-12">
                <object data="/images/<?php echo $this->solicitud_url ?>" type="application/pdf" width="100%" height="600px">
                  <p>Tu navegador no soporta PDF. Descarga el archivo <a href="<?php echo $this->solicitud_url ?>">aquí</a>.
                </p>
              </object>
            </div>
            <?php }else{ ?>
              <div
                class="alert alert-warning"
                role="alert"
              >
                Este documento no ha sido firmado.
              </div>
              
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
