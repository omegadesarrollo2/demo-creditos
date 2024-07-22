<h1 class="titulo-principal"><i class="fas fa-file-excel"></i>Importar asociados</h1>
<div class="container-fluid">
  <form class="text-start filters" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform; ?>" data-bs-toggle="validator">
    <div class="content-dashboard mb-0 pb-0">
      <input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
      <input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
      <?php if ($this->content->id) { ?>
        <input type="hidden" name="id" id="id" value="<?= $this->content->id; ?>" />
      <?php } ?>
      <div class="row">
        <input type="hidden" name="archivo" value="<?php echo $this->content->archivo ?>">
        <div class="col-12 form-group">
          <div class="row">
            <div class="col-10">
              <label for="archivo2">archivo asociados</label>
              <input type="file" name="archivo2" id="archivo2" class="form-control  file-document" data-buttonName="btn-primary" onchange="validardocumento('archivo2');" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
            </div>


            <div class="col-2">
              <label for="">
                &nbsp;
              </label>
              <a href="/corte/cedulas.xlsx" class="btn search-button text-center">Archivo de Ejemplo <i class="fas fa-download"></i></a>
            </div>
          </div>
        </div>
        <input type="hidden" name="archivo3" value="<?php echo $this->content->archivo3 ?>">
        <input type="hidden" name="archivo" value="<?php echo $this->content->archivo ?>">
        <input type="hidden" name="archivo4" value="<?php echo $this->content->archivo4 ?>">
        <input type="hidden" name="archivo_inactivos" value="<?php echo $this->content->archivo_inactivos ?>">
        <div class="botones-acciones col-12 d-flex justify-content-end">
          <button class="btn btn-guardar me-2" type="submit">Guardar</button>
          <a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
        </div>
      </div>
    </div>
  </form>
</div>

<div class="container-fluid mt-0">
  <div class="content-dashboard mt-0 altura">
    <div class="contenedor-documentos">
      <div class="col-12 p-0">
        <h3 class="documents-title">Ultimo archivo cargado</h3>
      </div>
      <div class="col-12 p-0">
        <div class="table-body">
          <?php foreach ($this->lists as $content) { ?>
            <?php $id =  $content->id; ?>
            <div class="row">
              <div class="col col-12">
                <a href="/images/<?php echo $content->archivo2; ?>" target="_blank">
                  <i class="fas fa-file-excel"></i> <?php echo $content->archivo2; ?>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .search-button {
    width: max-content;
    margin-top: 3px;
  }

  .table-header {
    background-color: #121b4b;
    color: #fff;
    border-radius: 12px;
    border: none;
  }

  .table-header .row {
    margin: 0;
  }

  .table-header .col {
    text-align: center;
    border: none;
    padding: 10px;
  }

  .table-body {
    border: 1px solid #e0e0e0;
    border-top: none;
    border-radius: 0 0 12px 12px;
    padding: 15px
  }
  .table-body .row {
    border: 1px solid #e0e0e0;
    margin: 10px 0;
    border-radius: 12px;
  }

  .table-body .col {
    text-align: center;
    border: none;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .table-body .col a {
    color: #00c6ef;
    top: none;
    transition: 300ms ease;
  }

  .table-body .col a:hover {
    color: #76b72b;
  }

  .contenedor-documentos {
    background-color: #fff;
    padding: 20px;
    padding-top: 0;
    width: 100%;
    padding-left: 0;
    padding-right: 0;
  }

  .documents-title {
    background-color: #76b72b;
    color: #fff;
    border-radius: 20px 20px 0 0;
    border: none;
    padding: 10px;
    font-size: 1.2rem !important;
    text-align: center;
    margin-bottom: 0;
  }

  .altura{
    min-height: calc(100vh - 400px);

  }
</style>