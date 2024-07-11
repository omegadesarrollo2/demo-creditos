<?php if($this->solicitud->documentos_actualizados==0){?>
<form action="/page/editarincompleta/update" method="post" enctype="multipart/form-data">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="row form-group">
          <div class="col-md-12 col-lg-12">
            <div class="row  text-center">
              <div class="col-12 titulo-seccion">Documentos Faltantes</div><br><br>
              <div class="col-12 fondo-gris3">
                <div class="row">
                  <div align="left" class="col-lg-6"> Documentos </div>
                  <div class="">
                    <input type="file" name="otros_documentos4" id="otros_documentos4"
                      class="file-document file-document1" accept="application/pdf" required
                      <?php if($this->documentos->otros_documentos1==""){ echo ''; } ?> />
                  </div>
                  <div align="left" class="col-lg-6"></div>
                  <div class="mt-3">
                    <input type="file" name="otros_documentos5" id="otros_documentos5"
                      class="file-document file-document1" accept="application/pdf"
                      <?php if($this->documentos->otros_documentos1==""){ echo ''; } ?> />
                  </div>
                  <div align="left" class="col-lg-6"></div>
                  <div class="mt-3">
                    <input type="file" name="otros_documentos5" id="otros_documentos5"
                      class="file-document file-document1" accept="application/pdf"
                      <?php if($this->documentos->otros_documentos1==""){ echo ''; } ?> />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center my-4">
    <input type="hidden" name="id" value="<?php echo $this->id?>">
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>
<?php }?>