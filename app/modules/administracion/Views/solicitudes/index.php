<style type="text/css">
  .table td, .table th {
    padding: .5rem;
  }

  .content-table {
    margin-left: 10px;
    margin-right: 10px;
  }
  .content-dashboard {
    background: #ffffff;
    border-top: 3px solid #cdd1db;
    padding: 20px;
    margin-top: 0;
    margin-bottom: 20px;
}
</style>

<h1 class="titulo-principal"><i class="fas fa-hand-holding-usd"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
<?php
    $validaciones = array("En estudio", "Aprobado", "Desembolsado");
    $validaciones[6] = "Cambio de condiciones";
    $validaciones[4] = "Rechazado";
    $validaciones[5] = "Radicado";
    $validaciones[8] = "Pasar a desembolso";
    $validaciones[9] = "En devolución";

  ?>
  <div class="menu-filter">
    <?php
      $estilo = "";
      if ($_GET['i'] == "" and $_GET['incompletas'] == "" and $_GET['sin_terminar'] == "") {
        $estilo = "background:#7CB33E; ";
      }
    ?>
    <?php
      $estilo = "";

      if ($_GET['i'] == "todas") {
        $estilo = "background:#7CB33E; ";
      }
    ?>
    <a href="/administracion/solicitudes?i=todas" class="btn btn-primary btn-sm mb-2" style=" <?php echo $estilo; ?>">Todas</a>
    <?php for ($i = 0; $i <= 9; $i++) { ?>
      <?php
      $estilo = "";
      if ($validaciones[$i]) {
        if ($_GET['i'] == $i and $_GET['i'] != "" && $_GET['i'] != "todas") {
          $estilo = "background:#7CB33E; ";
        }
        ?>
        <a href="/administracion/solicitudes/?i=<?php echo $i; ?>" class="btn btn-primary btn-sm mb-2 btn-sl-filters"
           style=" <?php echo $estilo; ?>">
          <?php
            if ($i == 9) {
              $redPoint = count($this->slDevolucion);
              echo '<span class="red-point">' . $redPoint . '</span>';
            }
          ?>
          <?php echo $validaciones[$i]; ?>
        </a>
      <?php }
    } ?>

    <?php
      $estilo = "";
      if ($_GET['incompletas'] == "1") {
        $estilo = "background:#7CB33E; ";
      }
    ?>
    <a href="/administracion/solicitudes/?incompletas=1" class="btn btn-primary btn-sm mb-2"
       style=" <?php echo $estilo; ?>">Aplazados</a>
    <?php
      $estilo = "";
      if ($_GET['sin_terminar'] == "1") {
        $estilo = "background:#7CB33E; ";
      }
    ?>
    <a href="/administracion/solicitudes/?sin_terminar=1" class="btn btn-primary btn-sm mb-2"
       style=" <?php echo $estilo; ?>">Sin terminar</a>
    <?php
      $estilo = "";
      if ($_GET['confirmadas_asociado'] == "1") {
        $estilo = "background:#7CB33E; ";
      }
    ?>
    <a href="/administracion/solicitudes/?confirmadas_asociado=1" class="btn btn-primary btn-sm mb-2"
       style=" <?php echo $estilo; ?>">Aprobadas por el asociado</a>
    <?php
      $estilo = "";
      if ($_GET['rechazadas_asociado'] == "1") {
        $estilo = "background:#7CB33E; ";
      }
    ?>
    <a href="/administracion/solicitudes/?rechazadas_asociado=1" class="btn btn-primary btn-sm mb-2"
       style=" <?php echo $estilo; ?>">Rechazadas por el asociado</a> 

  </div>
  <div class="col-lg-12 text-end margin10">
    <button class="btn btn-warning btn-sm search-button" onclick="$('#div_filtro').toggle();">Ver filtro <i class="fas fa-search"></i></button>
  </div>
  <form
    action="<?php echo $this->route; ?>?i=<?= $_GET['i']; ?>&incompletas=<?= $_GET['incompletas']; ?>&sin_terminar=<?= $_GET['sin_terminar']; ?>&confirmadas_asociado=<?= $_GET['confirmadas_asociado']; ?>&rechazadas_asociado=<?= $_GET['rechazadas_asociado']; ?>"
    method="post" id="div_filtro" style="display: none;">
    <div class="content-dashboard">
      <div class="row filters">
        <div class="col-lg-2">
          <label>cédula</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" class="form-control" name="cedula"
                   value="<?php echo $this->getObjectVariable($this->filters, 'cedula') ?>"></input>
          </label>
        </div>
        <div class="col-lg-2">
          <label>línea</label>
          <label class="input-group">
            <select class="form-control" name="linea">
              <option value="">Todas</option>
              <?php foreach ($this->list_linea_desembolso as $key => $value) : ?>
                <option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'linea') == $key) {
                  echo "selected";
                } ?>><?= $value; ?></option>
              <?php endforeach ?>
            </select>


          </label>
        </div>
        <div class="col-lg-2">
          <label>línea desembolso</label>
          <label class="input-group">
            <select class="form-control" name="linea_desembolso">
              <option value="">Todas</option>
              <?php foreach ($this->list_linea_desembolso as $key => $value) : ?>
                <option
                  value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'linea_desembolso') == $key) {
                  echo "selected";
                } ?>><?= $value; ?></option>
              <?php endforeach ?>
            </select>


          </label>
        </div>
        <div class="col-lg-2 d-none">
          <label>validación</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-rosado "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" class="form-control" name="validacion"
                   value="<?php echo $this->getObjectVariable($this->filters, 'validacion') ?>"></input>
          </label>
        </div>
        <div class="col-lg-2">
          <label>nombres</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-cafe "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" class="form-control" name="nombres"
                   value="<?php echo $this->getObjectVariable($this->filters, 'nombres') ?>"></input>
          </label>
        </div>
        <div class="col-lg-2">
          <label>apellido 1</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-azul "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" class="form-control" name="apellido1"
                   value="<?php echo $this->getObjectVariable($this->filters, 'apellido1') ?>"></input>
          </label>
        </div>
        <div class="col-lg-2">
          <label>apellido 2</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-rojo-claro "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" class="form-control" name="apellido2"
                   value="<?php echo $this->getObjectVariable($this->filters, 'apellido2') ?>"></input>
          </label>
        </div>
        <div class="col-lg-2">
          <label>asignado</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-verde "><i class="far fa-list-alt"></i></span>
            </div>
            <select class="form-control" name="asignado">
              <option value="">Todas</option>
              <?php foreach ($this->list_asignado as $key => $value) : ?>
                <option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'asignado') == $key) {
                  echo "selected";
                } ?>><?= $value; ?></option>
              <?php endforeach ?>
            </select>
          </label>
        </div>
        <div class="col-lg-4">
          <label>fecha asignado</label>
          <label class="input-group">
            <input type="date" class="form-control" name="fecha_asignado"
                   value="<?php echo $this->getObjectVariable($this->filters, 'fecha_asignado') ?>"></input>
            <span class="px-3 d-flex justify-content-center align-items-center">
                  -
                </span>
            <input type="date" class="form-control" name="fecha_asignado2"
                   value="<?php echo $this->getObjectVariable($this->filters, 'fecha_asignado2') ?>"></input>
          </label>
        </div>
        <div class="col-lg-2">
          <label>pagaré</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-rosado "><i class="fas fa-pencil-alt"></i></span>
            </div>
            <input type="text" class="form-control" name="pagare"
                   value="<?php echo $this->getObjectVariable($this->filters, 'pagare') ?>"></input>
          </label>
        </div>
        <div class="col-lg-2">
          <label>quién</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-azul-claro "><i class="far fa-list-alt"></i></span>
            </div>
            <select class="form-control" name="quien">
              <option value="">Todas</option>
              <?php foreach ($this->list_quien as $key => $value) : ?>
                <option value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'quien') == $key) {
                  echo "selected";
                } ?>><?= $value; ?></option>
              <?php endforeach ?>
            </select>
          </label>
        </div>
        <div class="col-lg-2">
          <label>estado autorizo</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-morado "><i class="far fa-list-alt"></i></span>
            </div>
            <select class="form-control" name="estado_autorizo">
              <option value="">Todas</option>
              <?php foreach ($this->list_estado_autorizo as $key => $value) : ?>
                <option
                  value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'estado_autorizo') == $key and $this->getObjectVariable($this->filters, 'estado_autorizo') != "") {
                  echo "selected";
                } ?>><?= $value; ?></option>
              <?php endforeach ?>
            </select>
          </label>
        </div>
        <div class="col-lg-2">
          <label>Regional</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-morado "><i class="far fa-list-alt"></i></span>
            </div>
            <select class="form-control" name="regional">
              <option value="">Todas</option>
              <?php foreach ($this->list_regional as $key => $value) : ?>
                <option
                  value="<?= $key; ?>" <?php if ($this->getObjectVariable($this->filters, 'regional') == $key and $this->getObjectVariable($this->filters, 'regional') != "") {
                  echo "selected";
                } ?>><?= $value; ?></option>
              <?php endforeach ?>
            </select>
          </label>
        </div>
        <div class="col-lg-2">
          <label>Ente Aprobador</label>
          <label class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text input-icono fondo-morado "><i class="far fa-list-alt"></i></span>
            </div>
            <select class="form-control" name="ente_aprobador">
              <option value="">Todas</option>
              <option
                value="Comite de credito" <?php if ($this->getObjectVariable($this->filters, 'ente_aprobador') == "Comite de credito" and $this->getObjectVariable($this->filters, 'ente_aprobador') != "") {
                echo "selected";
              } ?>>Comite de credito
              </option>
              <option
                value="Gerencia" <?php if ($this->getObjectVariable($this->filters, 'ente_aprobador') == "Gerencia" and $this->getObjectVariable($this->filters, 'ente_aprobador') != "") {
                echo "selected";
              } ?>>Gerencia
              </option>
              <option
                value="Junta directiva" <?php if ($this->getObjectVariable($this->filters, 'ente_aprobador') == "Junta directiva" and $this->getObjectVariable($this->filters, 'ente_aprobador') != "") {
                echo "selected";
              } ?>>Junta directiva
              </option>
              <option
                value="Analista" <?php if ($this->getObjectVariable($this->filters, 'ente_aprobador') == "Analista") {
                echo "selected";
              } ?>>Analista
              </option>
            </select>
          </label>
        </div>
        <div class="col-lg-2">
          <label>Fecha desembolso</label>
          <label class="input-group">
            <input type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd"
                   data-date-language="es" name="fecha_desembolso"
                   value="<?php echo $this->getObjectVariable($this->filters, 'fecha_desembolso') ?>">
            <span class="d-flex px-2 justify-content-center align-items-center">
                -
              </span>
            <input type="text" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd"
                   data-date-language="es" name="fecha_desembolso_final"
                   value="<?php echo $this->getObjectVariable($this->filters, 'fecha_desembolso_final') ?>">
          </label>
        </div>
        <div class="col-2">
          <label class="line-break">&nbsp;</label>
          <a
            href="/administracion/solicitudes/exportar?excel=1&i=<?php echo $_GET["i"] ?>&incompletas=<?= $_GET['incompletas']; ?>&sin_terminar=<?= $_GET['sin_terminar']; ?>&confirmadas_asociado=<?= $_GET['confirmadas_asociado']; ?>&rechazadas_asociado=<?= $_GET['rechazadas_asociado']; ?>&fecha_asignado=<?php echo $this->getObjectVariable($this->filters, 'fecha_asignado') ?>&fecha_asignado2=<?php echo $this->getObjectVariable($this->filters, 'fecha_asignado2') ?>"
            class="btn btn-block btn-rosado"> <i class="fas fa-file-excel"></i> Exportar Excel</a>
        </div>
        <div class="col-lg-2">
          <label class="line-break">&nbsp;</label>
          <button type="submit" class="btn btn-block btn-azul"><i class="fas fa-filter"></i> Filtrar</button>
        </div>
        <div class="col-lg-2">
          <label class="line-break">&nbsp;</label>
          <a class="btn btn-block btn-azul-claro " href="<?php echo $this->route; ?>?cleanfilter=1"> <i
              class="fas fa-eraser"></i> Limpiar Filtro</a>
        </div>
      </div>
    </div>
  </form>



  <div align="center">
    <ul class="pagination justify-content-center">
      <?php
        $url = $this->route;
        $max = $this->page + 10;
        $min = $this->page - 10;
        if ($min < 1) {
          $min = 1;
        }

        if ($this->totalpages > 1) {
          if ($this->page != 1)
            echo '<li class="page-item" ><a class="page-link"  href="' . $url . '?page=' . ($this->page - 1) . '&i=' . $_GET["i"] . '"> &laquo; Anterior </a></li>';
          for ($i = 1; $i <= $this->totalpages; $i++) {
            if ($this->page == $i) {
              echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
            } else {
              if ($i <= $max and $i >= $min) {
                echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '&i=' . $_GET["i"] . '">' . $i . '</a></li>  ';
              }
            }
          }
          if ($this->page != $this->totalpages)
            echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '&i=' . $_GET["i"] . '">Siguiente &raquo;</a></li>';
        }
      ?>
    </ul>
  </div>
  <div class="content-dashboard">
    <div class="franja-paginas">
      <div class="row justify-content-between">
        <div class="col-lg-5">
          <div class="titulo-registro">Se encontraron <?php echo $this->register_number; ?> Registros</div>
        </div>
        <div class="col-lg-3 text-end ms-auto">
          <div class="texto-paginas">Registros por pagina:</div>
        </div>
        <div class="col-lg-1">
          <select class="form-control form-control-sm selectpagination">
            <option value="20" <?php if ($this->pages == 20) {
              echo 'selected';
            } ?>>20
            </option>
            <option value="30" <?php if ($this->pages == 30) {
              echo 'selected';
            } ?>>30
            </option>
            <option value="50" <?php if ($this->pages == 50) {
              echo 'selected';
            } ?>>50
            </option>
            <option value="100" <?php if ($this->pages == 100) {
              echo 'selected';
            } ?>>100
            </option>
          </select>
        </div>
        <div class="col-lg-3 d-none">
          <div class="text-end"><a class="btn btn-sm btn-success" href="<?php echo $this->route . "\manage"; ?>"> <i
                class="fas fa-plus-square"></i> Crear Nuevo</a></div>
        </div>
      </div>
    </div>
    <div class="content-table">
      <table class=" table table-striped  table-hover table-administrator text-start">
        <thead>
        <tr>
          <td>ID</td>
          <td>cédula</td>
          <td>línea</td>
          <?php if (!$_SESSION['kt_login_level'] != "13") { ?>
            <td>estado</td>
          <?php } ?>
          <td>nombres</td>
          <td>apellido 1</td>
          <td>apellido 2</td>
          <td>asignado a</td>
          <?php if ($_GET["i"] == 2) { ?>
            <td>fecha desembolsado</td>
          <?php } else { ?>
            <td>fecha asignado</td>
          <?php } ?>
          <td>pagare</td>
          <td>aprobado por</td>
          <td>Enviado a</td>
          <td>VBo</td>
        </tr>
        </thead>
        <tbody>
        <?php $validaciones[3] = "Aplazado"; ?>
        <?php foreach ($this->lists as $content) { ?>
          <?php $id = $content->id; ?>
          <tr>
            <td><?= $content->id; ?></td>
            <td><?= $content->cedula; ?></td>
            <td><?php echo $this->list_linea_desembolso[$content->linea_desembolso]; ?></td>
            <?php if (!$_SESSION['kt_login_level'] != "13") { ?>
              <td>
                
                <?php if ($content->paso != "8") { ?>
                  <?php if ($content->incompleta != "") { ?>
                    Sin terminar
                  <?php } else { ?>
                    Aplazada
                  <?php } ?>
                <?php } else if ($content->validacion == "0" && $content->estado_autorizo == "") {
                  echo "Radicado";
                } else if (($content->confimar_solicitud == 1 || $content->acepto_cambios == 1) && $_GET['i'] != 2 && $_GET['i'] != 8 && ($content->validacion != "8" && $content->validacion != "2" && $content->validacion != "4") && $content->estado_autorizo != "4") {
                  echo " Aprobado por el asociado";
                } else if (($content->confimar_solicitud == 2 || $content->vencimiento_aplazado == 1 || $content->vencimiento_aprobado == 1) && $_GET['i'] != 2 && $_GET['i'] != 8) {
                  echo " Rechazado por el asociado";
                } else if ( $_GET['i'] == 'todas' || $_GET['i'] == 2 || $_GET['incompletas'] == 1 || $_GET['i'] == 1 || $_GET['i'] == 6 || $_GET['i'] == 4 || $_GET['i'] == 0 || $_GET['i'] == 8 || $_GET['i'] == 9) { ?>
                  <?php
                  $validacion = $validaciones[$content->validacion];
                  if ($content->estado_autorizo == "4") {
                    $validacion = "Rechazada";
                  }
                  if (!$validacion and $content->incompleta != "") {
                    echo "Aplazado";
                  }
                  echo $validacion;
                  if( $content->validacion == '4' && $content->rechazo_datacredito == '1'){
                    echo ' (Datacredito)';
                  }
                  ?>
                <?php }  //echo $content->validacion;?>
              </td>
            <?php } ?>
            <td><?= $content->nombres; ?></td>
            <td><?= $content->apellido1; ?></td>
            <td><?= $content->apellido2; ?></td>
            <td><?= $this->list_asignado[$content->asignado]; ?>
              <?php if ($_GET["i"] == 2){ ?>
            <td><?php
                $fecha_des = explode(" ", $content->fecha_desembolso);
                echo $fecha_des[0]; ?></td>
          <?php } else { ?>
            <td><?= $content->fecha_asignado; ?></td>
          <?php } ?>
            <td><?= $content->pagare; ?></td>
            <td>
              <?php
                if ($content->confimar_solicitud == '1' && $content->quien_aprobo == '') {
                  echo "Aprobado por el usuario";
                } else {
                  echo $content->quien_aprobo;
                }
              ?>
            </td>
            <td>
              <?php if ($content->enviadoa) { ?>
                <?php echo $content->enviadoa ?>
              <?php } else { ?>
                <?php echo 'Analista' ?>
              <?php } ?>
            </td>
            <td><?= $this->list_estado_autorizo[$content->estado_autorizo]; ?></td>
          </tr>
          <tr>
          <td colspan="13" class="text-end">
          <div class="buttons-row">
          <div>

            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "16" or $_SESSION['kt_login_level'] == "8") { ?>
              <a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/manage?id=<?= $id ?>"
                 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar"><i class="fas fa-pen-alt"></i></a>
            <?php } ?>

            <a class="btn btn-morado btn-sm" href="<?php echo $this->route; ?>/documentosFirmados?id=<?= $id ?>"
               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Documentos firmados"><i
                class="fas fa-signature"></i></a>

            <?php if ($_SESSION['kt_login_level'] == "13" or $_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "14" or $_SESSION['kt_login_level'] == "15" or $_SESSION['kt_login_level'] == "16") { ?>
              <button class="btn btn-verde btn-sm" data-placement="top" title="Editar Correos" data-bs-toggle="modal" data-bs-target="#emails_model_<?php echo $content->id ?>">
                <i class="fas fa-at" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar correos"></i>
              </button>
                 <div class="modal fade modal-correos" id="emails_model_<?php echo $content->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <h4 class="comun-title">Editar correos</h4>
                            </div>
                            <div class="form-group col-12 mt-1">
                              <label for="">Solicitud</label>
                              <input type="text" class="form-control" name="id" value="<?php echo $content->id ?>" readonly>
                            </div>
                            <div class="form-group col-12 mt-1">
                              <label for="">Correo Personal</label>
                              <input type="email" name="correo_personal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $content->correo_personal ?>">
                            </div>
                            <div class="form-group col-12">
                              <label for="">Correo Empresarial </label>
                              <input type="email" name="correo_empresarial" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $content->correo_empresarial ?>">
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-2">
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                              <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            <?php } ?>

            <a class="btn btn-warning btn-sm" href="<?php echo $this->route; ?>/detalle/?id=<?= $id ?>"
               data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detalle"><i class="fas fa-search"></i></a>

            <?php if ($_SESSION['kt_login_level'] == "3" || $_SESSION['kt_login_id'] == "1" or $_SESSION['kt_login_level'] == "16") { ?>
              <?php if ($content->validacion == "0" || $content->validacion == "" || $content->id == 454 || $_SESSION['kt_login_id'] == "18") { ?>
                <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Aprobar"><a class="btn btn-success btn-sm"
                                                                                    href="/administracion/solicitudes/aprobaranalista?id=<?php echo $content->id ?>"><i
                      class="fas fa-check-circle text-white"></i></a></span>

              <?php } ?>
            <?php } ?>
            <?php if ($_SESSION['kt_login_level'] == "8") { ?>
              <?php if ($content->validacion == "0" || $content->validacion == "" || $content->id == 454) { ?>
                <span
                  class="<?php if ($_SESSION['kt_login_level'] == "8" && $content->enviadoa == 'Comite de credito') {
                    echo 'd-none';
                  } ?>" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Aprobar"><a class="btn btn-success btn-sm"
                                                                                      href="/administracion/solicitudes/aprobargerencia?id=<?php echo $content->id ?>"><i
                      class="fas fa-check-circle text-white"></i></a></span>

              <?php } ?>
            <?php } ?>

            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8" or $_SESSION['kt_login_level'] == "13" or $_SESSION['kt_login_level'] == "14" or $_SESSION['kt_login_level'] == "15" or $_SESSION['kt_login_level'] == "16" or $_SESSION['kt_login_level'] == "17" or $_SESSION['kt_login_level'] == "18") { ?>
              <a class="btn btn-rojo btn-sm" data-bs-toggle="modal" data-bs-target="#documents_modal_<?php echo $content->id ?>">
                <i class="fas fa-file" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Documentos adicionales"></i>
              </a>
              <!-- <a class="btn btn-rojo btn-sm" href="/administracion/documentosadicionales/?solicitud=<?= $id ?>">
                <i class="fas fa-file" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Documentos adicionales"></i>
              </a> -->
                <div class="modal fade modal-correos" id="documents_modal_<?php echo $content->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-start">
                        <form action="/administracion/documentosadicionales/insert2" class="row" method="post" enctype="multipart/form-data">
                          <div class="col-12">
                            <h4 class="comun-title">Documentos adicionales</h4>
                          </div>
                          <div class="col-6 form-group">
                            <label for="titulo" class="control-label">titulo</label>
                            <label class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text input-icono  fondo-verde-claro "><i class="fas fa-pencil-alt"></i></span>
                              </div>
                              <input type="text" value="<?= $this->content->titulo; ?>" name="titulo" id="titulo" class="form-control"
                                required>
                            </label>
                            <div class="help-block with-errors"></div>
                          </div>
                          <div class="col-6 form-group">
                            <label for="archivo">archivo</label>
                            <input type="file" name="archivo" id="archivo" class="form-control  file-document"
                              data-buttonName="btn-primary" onchange="validardocumento('archivo');" accept=" image/*, application/pdf">
                            <div class="help-block with-errors"></div>
                          </div>
                          <input type="hidden" name="fecha" value="<?php echo date("Y-m-d H:i:s"); ?>">
                          <input type="hidden" name="quien" value="<?php echo $_SESSION['kt_login_id']; ?>">
                          <input type="hidden" name="solicitud" value="<?php echo $content->id ?>">
                          <div class="col-12 d-flex justify-content-center mt-2">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                          </div>
                        </form>
                        <div class="col-12">
                          <hr>
                        </div>
                        <div class="col-12">
                          <div class="contenedor-documentos">
                            <div class="table-header">
                              <div class="row">
                                  <div class="col-4 col">Titulo</div>
                                  <div class="col-4 col">Archivo</div>
                                  <div class="col-4 col"></div>
                              </div>
                            </div>
                            <div class="table-body">
                              <?php foreach ($content->documentos_adicionales as $adicionales) : ?>
                                <?php $id_adicionales =  $adicionales->id; ?>
                                
                                <div class="row">
                                  <div class="col-4 col">
                                    <?=$adicionales->titulo;?>
                                  </div>
                                  <div class="col-4 col">
                                    <a href="/images/<?php echo $adicionales->archivo;?>" target="_blank"><?php echo $adicionales->archivo;?></a>
                                  </div>
                                  <div class="col-4 col d-flex justify-content-end">
                                    <div>
                                      <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar">
                                        <a class="btn btn-rojo btn-sm btn-delete-documents" data-om-target="modal_adicionales<?= $id_adicionales ?>" data-om-parent="documents_modal_<?php echo $content->id ?>"><i class="fas fa-trash-alt"></i></a>
                                      </span>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade text-start" id="modal_adicionales<?= $id_adicionales ?>" tabindex="-1" role="dialog"
                                      aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                          </div>
                                          <div class="modal-body">
                                            <h4 class="modal-title comun-title mb-3" id="myModalLabel">Eliminar Registro</h4>
                                            <div class="">¿Esta seguro de eliminar este registro?</div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
                                            <a class="btn btn-danger"
                                              href="/administracion/documentosadicionales/delete2?id=<?= $id_adicionales ?>">Eliminar</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <?php endforeach; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>

            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8" or $_SESSION['kt_login_level'] == "13" or $_SESSION['kt_login_level'] == "16") { ?>
              <!-- <a class="btn btn-azul-claro btn-sm" href="/administracion/solicitudes/solicitudgarantias/?solicitud=<?= $id ?>" data-bs-toggle="modal" data-bs-target="garantias_modal_<?php echo $content->id ?>">
                <i class="fas fa-list" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Garantias"></i>
              </a> -->
              <a class="btn btn-azul-claro btn-sm" data-bs-toggle="modal" data-bs-target="#garantias_modal_<?php echo $content->id ?>">
                <i class="fas fa-list" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Garantias"></i>
              </a>
                <div class="modal fade modal-correos" id="garantias_modal_<?php echo $content->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-start">
                        <form action="/administracion/solicitudes/updategarantia" method="post" class="row">
                          <div class="col-12">
                            <h4 class="comun-title">Editar Garantías</h4>
                          </div>
                          <div class="form-group col-12 mt-1">
                            <label for="">Solicitud</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $content->id ?>" readonly>
                          </div>
                          <div class="form-group col-12 mt-1">
                            <label for="">Tipo de garantía</label>
                            <select name="tipo_garantia" id="" class="form-control">
                            <option value="" selected disabled>Seleccione</option>
                              <?php foreach($this->garantias as $gar): ?>
                                <option value="<?php echo $gar->garantia_id ?>" <?php if($content->tipo_garantia == $gar->garantia_id){ echo 'selected'; } ?> ><?php echo $gar->garantia_nombre ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group col-12 mt-1">
                            <label for="">Garantía adicional</label>
                            <select name="garantia_adicional" id="" class="form-control">
                              <option value="" selected disabled>Seleccione</option>
                              <?php foreach($this->garantias as $gar): ?>
                                <option value="<?php echo $gar->garantia_id ?>" <?php if($content->garantia_adicional == $gar->garantia_id){ echo 'selected'; } ?> ><?php echo $gar->garantia_nombre ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-12 d-flex justify-content-center">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Guardar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>

            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8" or $_SESSION['kt_login_level'] == "4" or $_SESSION['kt_login_level'] == "9" or $_SESSION['kt_login_level'] == "16") { ?>
              <a class="btn btn-verde btn-sm" href="<?php echo $this->route; ?>/incompleta/?id=<?= $id ?>"
                 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Incompleta / Rechazada"><i
                  class="fas fa-exclamation-triangle"></i></a>
            <?php } ?>
            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8" or $_SESSION['kt_login_level'] == "13" or $_SESSION['kt_login_level'] == "14" or $_SESSION['kt_login_level'] == "15" or $_SESSION['kt_login_level'] == "16") { ?>

              <?php if ($content->validacion == "1" || $content->validacion == "8") { ?>
                <a class="btn <?php if ($content->correo_aprobacion_enviado == 1) {
                  echo "btn-warning";
                } else {
                  echo "btn-success";
                } ?> btn-sm" href="<?php echo $this->route; ?>/correoaprobacion/?id=<?= $id ?>" data-bs-toggle="tooltip"
                   data-placement="top" title="Enviar correo de aprobación"><?php if ($content->recoger_credito == 1) {
                    echo "R ";
                  } ?><i class="fas fa-envelope"></i></a>
              <?php } ?>

            <?php } ?>
            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8" or $_SESSION['kt_login_level'] == "13" or $_SESSION['kt_login_level'] == "16" or $_SESSION['kt_login_level'] == "14" or $_SESSION['kt_login_level'] == "15") { ?>
              <?php if ($content->notificacion_enviada == "1") { ?>
                <a class="btn btn-morado btn-sm"
                   href="<?php echo $this->route; ?>/reenviarcambiocondiciones/?id=<?= $id ?>" data-bs-toggle="tooltip"
                   data-placement="top" title="reennviar cambio condiciones"><i class="fas fa-envelope"></i></a>
              <?php } else { ?>

              <?php } ?>
            <?php } ?>
            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8") { ?>
              <?php if ($content->validacion == "1" || $content->validacion == "2" or $_SESSION['kt_login_level'] == "16") { ?>
                <?php if ($_GET['i'] != 2) { ?>
                  <a class="btn btn-morado btn-sm" href="<?php echo $this->route; ?>/pasardesembolso/?id=<?= $id ?>"
                     data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pasar a Desembolso"><i
                      class="fas fa-forward"></i></a>
                <?php } ?>
              <?php } ?>
            <?php } ?>
            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8" or $_SESSION['kt_login_level'] == "16") { ?>
              <?php if ($content->validacion == "8") { ?>
                <a class="btn btn-azul-claro btn-sm d-none" href="<?php echo $this->route; ?>/desembolso/?id=<?= $id ?>"
                   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Desembolsar"><i class="fas fa-forward"></i></a>
                <a class="btn btn-morado btn-sm" onclick="confirmar_desembolso2('<?= $id; ?>');"
                   style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Desembolsar"><i
                    class="fas fa-forward"></i></a>
              <?php } ?>
            <?php } ?>

            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8" or $_SESSION['kt_login_level'] == "13" or $_SESSION['kt_login_level'] == "14" or $_SESSION['kt_login_level'] == "15" or $_SESSION['kt_login_level'] == "16" or $_SESSION['kt_login_level'] == "17" or $_SESSION['kt_login_level'] == "18") { ?>

              <a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/historialestados/?id=<?= $id ?>" data-bs-toggle="modal" data-bs-target="#historial_modal_<?php echo $content->id ?>">
                <i class="fa fa-file" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Historial de estados"></i>
              </a>
                 <div class="modal fade modal-correos" id="historial_modal_<?php echo $content->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-start">
                        <form action="/administracion/solicitudes/updategarantia" method="post" class="row">
                          <div class="col-12">
                            <h4 class="comun-title">Historial de estados</h4>
                          </div>
                          <div class="contenedor-documentos historial">
                          <?php if(is_countable($content->logestado) && count($content->logestado)>0){?>
                            <div class="table-header">
                              <div class="row">
                                <div class="col col-3">Estado</div>
                                <div class="col col-3">Fecha</div>
                                <div class="col col-3">Quien</div>
                                <div class="col col-3">Observación</div>
                              </div>
                            </div>
                            <div class="table-body">
                              <?php foreach($content->logestado as $key => $value){?>
                                <div class="row">
                                  <div class="col col-3"><?php echo $value->estado?></div>
                                  <div class="col col-3"><?php echo $value->fecha?></div>
                                  <div class="col col-3">
                                    <?php 
                                      if($this->usuarios[$value->usuario]!=""){ 
                                        echo $this->usuarios[$value->usuario]; 
                                      }else{
                                        echo $value->usuario;
                                      }
                                      ?>
                                  </div>
                                  <div class="col col-3"><?php echo $value->observacion?></div>
                                </div>
                              <?php }?>
                            </div>
                          <?php }else{?>
                            <div class="table-header">
                              <div class="row">
                                <div class="col col-3">Estado</div>
                                <div class="col col-3">Fecha</div>
                                <div class="col col-3">Quien</div>
                                <div class="col col-3">Observación</div>
                              </div>
                            </div>
                            <div class="table-body">
                              <?php if($content->fecha_asignado){?>
                                <div class="row">
                                  <div class="col col-3"><b>Radicado</b></div>
                                  <div class="col col-3"><?php echo $content->fecha_asignado;?></div>
                                  <div class="col col-3">Asociado</div>
                                  <div class="col col-3"></div>
                                </div>
                              <?php }?>
                              <?php if($content->fecha_autorizo){?>
                                <div class="row">
                                  <div class="col col-3"><b><?php echo $this->list_estado_autorizo[$content->estado_autorizo];?></b></div>
                                  <div class="col col-3"><?php echo $content->fecha_autorizo;?></div>
                                  <div class="col col-3"><?php echo $this->usuarios[$content->asignado]; ?></div>
                                  <div class="col col-3"></div>
                                </div>
                              <?php }?>
                              <?php if($content->fecha_incompleta){?>
                                <div class="row">
                                  <div class="col col-3"><b>Aplazada (incompleta)</b></div>
                                  <div class="col col-3"><?php echo $content->fecha_incompleta;?></div>
                                  <div class="col col-3"><?php echo $this->usuarios[$content->asignado]; ?></div>
                                  <div class="col col-3"><?php echo $content->incompleta; ?></div>
                                </div>
                              <?php }?>
                              <?php if($content->fecha){?>
                                <div class="row">
                                  <div class="col col-3"><b><?php echo $this->validaciones[$content->validacion];?></b></div>
                                  <?php if($content->validacion==2){ ?>
                                  <div class="col col-3"><?php echo $content->fecha_desembolso;?></div>
                                  <?php }else if($content->fecha_estado){?>
                                  <div class="col col-3"><?php echo $content->fecha_estado?></div>
                                  <?php }else{?>
                                  <div class="col col-3"><?php echo $content->fecha?></div>
                                  <?php }?>
                                  <div class="col col-3">
                                    <?php if($content->validacion==2 or $content->validacion==8){ ?>
                                    <?php echo $this->usuarios[$content->quien_desembolso]; ?>
                                    <?php }else{ ?>
                                    <?php echo $this->usuarios[$content->asignado]; ?>
                                    <?php } ?>
                                  </div>
                                </div>
                              <?php }?>

                              <?php if($content->fecha_aceptacion){?>
                                <div class="row">
                                  <div class="col col-3"><b><?php echo $this->acepto_condiciones[$content->acepto_cambios];?></b></div>
                                  <div class="col col-3"><?php echo $content->fecha_aceptacion;?></div>
                                  <div class="col col-3">Asociado</div>
                                  <div class="col col-3"></div>
                                </div>
                              <?php }?>

                              <?php if(is_countable($this->envios) && count($this->envios)>0){?>
                              <?php foreach ($this->envios as $key => $value): ?>
                                <div class="row">
                                  <div class="col col-3"><b><?php if($key==0){ echo "Envio Pagaré"; }else{ echo "Reenvio Pagaré"; } ?></b></div>
                                  <div class="col col-3"><?php echo $value->envio_fecha;?></div>
                                  <div class="col col-3"><?php echo $this->usuarios[$value->envio_quien]; ?></div>
                                  <div class="col col-3"></div>
                                </div>
                              <?php endforeach ?>
                              <?php }?>
                              <?php if($this->existe_pagare->estado=="1"){?>
                                <div class="row">
                                  <div class="col col-3"><b>Pagaré Firmado</b></div>
                                  <div class="col col-3"><?php echo $this->existe_pagare->fecha_firma;?></div>
                                  <div class="col col-3">Asociado</div>
                                  <div class="col col-3"></div>
                                </div>
                              <?php }?>
                            </div>
                          <?php }?>
                          </div>
                          <div class="col-12 d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <!-- <button type="submit" class="btn btn-success">Guardar</button> -->
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            <?php } ?>

            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8" or $_SESSION['kt_login_level'] == "13" or $_SESSION['kt_login_level'] == "16") { ?>
              <?php if ($content->linea_desembolso == "SO") { ?>
                <a class="btn btn-warning btn-sm" href="<?php echo $this->route; ?>/soat/?id=<?= $id ?>"
                   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Archivo soat"><i class="fas fa-car"></i></a>
              <?php } ?>
            <?php } ?>

            <!-- Boton comunicacion con el asociado -->
            <?php if (Session::getInstance()->get('kt_login_level') == '1' or Session::getInstance()->get('kt_login_level') == '3' or $_SESSION['kt_login_level'] == "16") { ?>
              <a class="btn btn-warning text-white btn-sm" href="<?php echo $this->route; ?>/message?id=<?= $id ?>"
                 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Comunicación con el asociado">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
              </a>
            <?php } ?>
            <?php if (Session::getInstance()->get('kt_login_level') == '1' or Session::getInstance()->get('kt_login_level') == '3' or $_SESSION['kt_login_level'] == "16") { ?>
              <a class="btn btn-info text-white btn-sm" href="<?php echo $this->route; ?>/plan?id=<?= $id ?>"
                 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Enviar plan de pagos">
                <i class="fas fa-file-alt"></i>
              </a>
            <?php } ?>

            <?php if ($_SESSION['kt_login_level'] == "1") { ?>
              <span data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar"><a class="btn btn-rojo btn-sm"
                                                                                   data-bs-toggle="modal"
                                                                                   data-bs-target="#modal<?= $id ?>"><i
                    class="fas fa-trash-alt"></i></a></span>
            <?php } ?>
          </div>

          

          <?php if ($_SESSION['kt_login_level'] == "13" or $_SESSION['kt_login_level'] == "12") { ?>
            <?php if ($content->estado_autorizo == "1") { ?>
              <a class="btn btn-success btn-sm" href="<?php echo $this->route; ?>/formatocomite/?id=<?= $id ?>"
                 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Formato aprobación comité de crédito"
                 target="_blank"><i class="fas fa-users"></i></a>
              <a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/formatocomiteespecial/?id=<?= $id ?>"
                 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Formato aprobación aprobación junta directiva"
                 target="_blank"><i class="fas fa-users"></i></a>
              <a class="btn btn-warning btn-sm" href="<?php echo $this->route; ?>/formatogerencia/?id=<?= $id ?>"
                 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Formato aprobación gerencia" target="_blank"><i
                  class="fas fa-user"></i></a>
              <?php if ($content->quien_aprobo == "Analista") { ?>
                <a class="btn btn-success btn-sm" href="<?php echo $this->route; ?>/formatoanalista/?id=<?= $id ?>"
                   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Formato aprobación analista" target="_blank"><i
                    class="fas fa-user"></i></a>
              <?php } ?>
            <?php } ?>
          <?php } ?>
          <?php if ($content->paso == 8) { ?>
            <?php if ($content->linea_desembolso != "SO" && $content->linea_desembolso != "SE" && $content->linea_desembolso != "CDU" && $content->linea_desembolso != "CF") { ?>
              <?php if ($content->pagare != "" and ($content->validacion == 1 || $content->validacion == 2 || $content->validacion == 8) and ($content->confimar_solicitud == 1 or $content->acepto_cambios == 1)) { ?>
                <?php ?>
                <?php if ($this->pagares_estado[$content->pagare] != "1") { ?>
                  <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "15" or $_SESSION['kt_login_level'] == "14") { ?>
                    <?php if ($this->pagares_estado[$content->pagare] == "") { ?>
                      <a class="btn btn-verde btn-sm" href="<?php echo $this->route; ?>/aprobar/?id=<?= $id ?>"
                         data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Generar pagaré"><i
                          class="fas fa-file-signature"></i></a>
                    <?php } else if ($this->pagares_estado[$content->pagare] == 0) { ?>
                      <a class="btn btn-info btn-sm mt-2" href="<?php echo $this->route; ?>/aprobar/?id=<?= $id ?>"
                         data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="reenviar pagaré"><i
                          class="fas fa-file-signature"></i></a>
                    <?php } ?>

                  <?php } ?>
                <?php } else { ?>

                  <a class="btn btn-warning btn-sm mt-2" href="<?php echo $this->route; ?>/detallepagare/?id=<?= $id ?>"
                     data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Pagaré"><i class="fas fa-file-signature"></i></a>
                <?php } ?>
              <?php } ?>
            <?php } ?>


            <?php if (count($content->recientes) > 1) { ?>
              <div class="mt-1 mb-1"><a class="btn btn-sm btn-primary" style="background-color: #5e2129;"
                                        href="/administracion/solicitudes/?documento=<?= $content->cedula; ?>&recientes=1">Solicitudes
                  recientes(<?php echo count($content->recientes); ?>)</a></div>
            <?php } ?>

            <!-- Modal -->
            <div class="modal fade text-start" id="modal<?= $id ?>" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="">¿Esta seguro de eliminar este registro?</div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger"
                       href="<?php echo $this->route; ?>/delete?id=<?= $id ?>&csrf=<?= $this->csrf; ?><?php echo ''; ?>">Eliminar</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade text-start" id="aprobar<?= $id ?>" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Aprobar Solicitud</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                    <div class="">¿Esta seguro de aprobar esta solicitud?</div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" href="<?php echo $this->route; ?>/aprobarsolicitud/?id=<?= $id ?>">Aprobar</a>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <?php if ($_SESSION['kt_login_level'] == "1" or $_SESSION['kt_login_level'] == "3" or $_SESSION['kt_login_level'] == "8" or $_SESSION['kt_login_level'] == "14" or $_SESSION['kt_login_level'] == "15" or $_SESSION['kt_login_level'] == "16" or $_SESSION['kt_login_level'] == "17" or $_SESSION['kt_login_level'] == "18") { ?>
            <?php if ($content->estado_autorizo == "1" || $content->estado_autorizo == "4") { ?>
              <div class="margin10"><b>Ente Aprobador:</b>

                <?php if (Session::getInstance()->get('kt_login_level') != '14' && Session::getInstance()->get('kt_login_level') != '15' && Session::getInstance()->get('kt_login_level') != '17' && Session::getInstance()->get('kt_login_level') != '18') { ?>
                  <a class="btn btn-success btn-sm" href="<?php echo $this->route; ?>/enviaracomite/?id=<?= $id ?>"
                     data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Enviar a comité de crédito"><i
                      class="fas fa-users"></i></a>
                <?php } ?>

                <a class="btn btn-success btn-sm" href="<?php echo $this->route; ?>/formatocomite/?id=<?= $id ?>"
                   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Formato aprobación comité de crédito"
                   target="_blank"><i class="fas fa-users"></i></a>

                <?php if (Session::getInstance()->get('kt_login_level') != '14' && Session::getInstance()->get('kt_login_level') != '15' && Session::getInstance()->get('kt_login_level') != '17' && Session::getInstance()->get('kt_login_level') != '18') { ?>
                  <a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/enviaracomiteespecial/?id=<?= $id ?>"
                     data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Enviar a junta directiva"><i
                      class="fas fa-users"></i></a>
                <?php } ?>
                <a class="btn btn-azul btn-sm" href="<?php echo $this->route; ?>/formatocomiteespecial/?id=<?= $id ?>"
                   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Formato aprobación junta directiva"
                   target="_blank"><i class="fas fa-users"></i></a>

                <?php if (Session::getInstance()->get('kt_login_level') != '14' && Session::getInstance()->get('kt_login_level') != '15' && Session::getInstance()->get('kt_login_level') != '17' && Session::getInstance()->get('kt_login_level') != '18') { ?>
                  <a class="btn btn-warning btn-sm" href="<?php echo $this->route; ?>/enviaragerencia/?id=<?= $id ?>"
                     data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Enviar a gerencia"><i
                      class="fas fa-user"></i></a>
                <?php } ?>

                <a class="btn btn-warning btn-sm" href="<?php echo $this->route; ?>/formatogerencia/?id=<?= $id ?>"
                   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Formato aprobación gerencia" target="_blank"><i
                    class="fas fa-user"></i></a>

                <?php if ($content->quien_aprobo == "Analista") { ?>
                  <a class="btn btn-success btn-sm" href="<?php echo $this->route; ?>/formatoanalista/?id=<?= $id ?>"
                     data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Formato aprobación analista" target="_blank"><i
                      class="fas fa-user"></i></a>
                <?php } ?>

              </div>
            <?php } ?>
          <?php } ?>
            </td>

            </tr>
          <?php } ?>
        <?php } ?>
        </tbody>
      </table>
    </div>
    <input type="hidden" id="csrf" value="<?php echo $this->csrf ?>"><input type="hidden" id="page-route"
                                                                            value="<?php echo $this->route; ?>/changepage">
  </div>
  <div align="center">
    <ul class="pagination justify-content-center">
      <?php
        $url = $this->route;
        if ($this->totalpages > 1) {
          if ($this->page != 1)
            echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page - 1) . '&i=' . $_GET["i"] . '"> &laquo; Anterior </a></li>';
          for ($i = 1; $i <= $this->totalpages; $i++) {
            if ($this->page == $i) {
              echo '<li class="active page-item"><a class="page-link">' . $this->page . '</a></li>';
            } else {
              if ($i <= $max and $i >= $min) {
                echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . $i . '&i=' . $_GET["i"] . '">' . $i . '</a></li>  ';
              }
            }
          }
          if ($this->page != $this->totalpages)
            echo '<li class="page-item"><a class="page-link" href="' . $url . '?page=' . ($this->page + 1) . '&i=' . $_GET["i"] . '">Siguiente &raquo;</a></li>';
        }
      ?>
    </ul>
  </div>
</div>

<script type="text/javascript">
    function confirmar_desembolso(id) {
        var x = confirm("pasar a desembolso la solicitud " + id + "?");
        if (x === true) {
            window.location = "<?php echo $this->route;?>/pasardesembolso/?id=" + id;
        }
    }

    function confirmar_desembolso2(id) {
        var x = confirm("pasar a desembolso la solicitud " + id + "?");
        if (x === true) {
            window.location = "<?php echo $this->route;?>/desembolso/?id=" + id;
        }
    }
</script> 
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
    display: flex;
    align-items: center;
    justify-content: center;
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
    width: 100%;
  }
  .contenedor-documentos.historial{
    padding-top: 20px;
  }
</style>