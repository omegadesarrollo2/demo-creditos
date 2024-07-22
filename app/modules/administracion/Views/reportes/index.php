<script>
    function generateModalTable(data) {
    let tableBody = $('#modalTableBody');
    tableBody.empty(); // Limpiar cualquier dato previo
    for (let i = 0; i < data.labels.length; i++) {
      let solicitudes = data.datasets[i] !== null ? data.datasets[i] : 0;
      let total = data.mounts[i].total !== null ? data.mounts[i].total : 0;
      let porcentaje = data.percentages[i] !== null ? data.percentages[i] : 0;

      let row = `<tr>
        <td>${data.labels[i]}</td>
        <td>${solicitudes}</td>
        <td>${total}</td>
        <td>${porcentaje}%</td>
      </tr>`;
      tableBody.append(row);
    }
  }

  $(document).ready(function() {
    $('.search-button').on('click', function() {
      let url = $(this).data('url'); // Obtener la URL específica de la data attribute

      // Hacer la petición AJAX
      $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        success: function(response) {
          // Generar la tabla en el modal con los datos recibidos
          generateModalTable(response);

          // Mostrar el modal
          $('#detailModal').modal('show');
        }
      });
    });
  });
</script>
<h1 class="titulo-principal"><i class="fas fa-chart-pie"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid d-none">
  <div class="row">
    <div class="col-12"><br></div>
    <div class="col-12 botones-reportes">
      <?php if ($_SESSION['kt_login_level'] == 1 or $_SESSION['kt_login_level'] == 4 or $_SESSION['kt_login_level'] == 3) { ?>
        <a href="/administracion/reportes/solicitudes_estado/" class="btn btn-primary">Solicitudes por estado</a>
        <a href="/administracion/reportes/solicitudes_linea/" class="btn btn-primary">Solicitudes por línea</a>
        <a href="/administracion/reportes/solicitudes_paso/" class="btn btn-primary">Solicitudes no finalizadas</a>
        <a href="/administracion/reportes/solicitudes_gestion/" class="btn btn-primary">Gestión solicitudes</a>
        <a href="/administracion/reportes/solicitudes_gestion2/" class="btn btn-primary">Gestión analistas</a>
        <a href="/administracion/reportes/solicitudes/" class="btn btn-primary">Visualizar solicitudes</a>
      <?php } ?>
      <?php if (1 == 0) { ?>
        <a href="../pp.php?mod=reporte_solicitudes" class="btn btn-primary">Exportar solicitudes</a>
        <a href="../pp.php?mod=reporte_solicitudes_no_finalizadas" class="btn btn-primary">Exportar solicitudes no finalizadas</a>
        <a href="../pp.php?mod=reporte_solicitudes_seguro" class="btn btn-primary">Exportar solicitudes seguro</a>
        <a href="../pp.php?mod=reporte_solicitudes_seguro2" class="btn btn-primary">Exportar solicitudes seguro2</a>
        <?php if ($_SESSION['kt_login_level'] == 1 or $_SESSION['kt_login_level'] == 4) { ?>
          <a href="../pp.php?mod=reporte_autorizaciones" class="btn btn-primary">Exportar autorizaciones</a>
          <a href="exportar.php?excel=1" class="btn btn-primary">Exportar LINIX</a>
          <a href="exportar_info.php?excel=1" class="btn btn-primary">Exportar Info Usuarios</a>
          <a href="../pp.php?mod=exportar_encuestas" class="btn btn-primary">Exportar encuestas</a>
        <?php } ?>
      <?php } ?>
    </div>
  </div>
</div>
<div class="container-fluid mt-2 pb-3">
  <div class="row">
    <div class="col-3 mt-2">
      <div class="card">
        <div class="card-header">
          Solicitudes por estado
        </div>
        <div class="card-body">
          <div id="chart_one_1">
            <canvas id="chartOne_1"></canvas>
            <div class="col-12">
              <button class="btn search-button" data-url="/administracion/reportes/getSolicitudesEstado/">
                Ver detalle <i class="fas fa-arrow-right"></i>
              </button>
            </div>
            <script>
              $.ajax({
                url: '/administracion/reportes/getSolicitudesEstado/',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                  const ctx_one_1 = document.getElementById('chartOne_1');
                  new Chart(ctx_one_1, {
                    type: 'pie',
                    data: {
                      labels: response.labels,
                      datasets: [{
                        label: '# de Solicitudes',
                        data: response.datasets,
                        borderWidth: 1,
                        backgroundColor: ['#041d49', '#74bc1f', '#00beff', '#0033a1']
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                }
              })
            </script>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3 mt-2">
      <div class="card">
        <div class="card-header">
          Solicitudes por linea
        </div>
        <div class="card-body">
          <div>
            <canvas id="chartTwo"></canvas>
            <div class="col-12">
              <button class="btn search-button" data-url="/administracion/reportes/getSolicitudesLinea/">
                Ver detalle <i class="fas fa-arrow-right"></i>
              </button>
            </div>
            <script>
              $.ajax({
                url: '/administracion/reportes/getSolicitudesLinea/',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                  const ctx_two = document.getElementById('chartTwo');
                  new Chart(ctx_two, {
                    type: 'pie',
                    data: {
                      labels: response.labels,
                      datasets: [{
                        label: '# de Solicitudes',
                        data: response.datasets,
                        borderWidth: 1,
                        backgroundColor: ['#041d49', '#74bc1f', '#00beff', '#0033a1']
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                }
              })
            </script>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3 mt-2">
      <div class="card">
        <div class="card-header">
          Solicitudes no finalizadas
        </div>
        <div class="card-body">
          <div>
            <canvas id="chartThree"></canvas>
            <div class="col-12">
              <button class="btn search-button" data-url="/administracion/reportes/getSolicitudesNoFinalizadas/">
                Ver detalle <i class="fas fa-arrow-right"></i>
              </button>
            </div>
            <script>
              $.ajax({
                url: '/administracion/reportes/getSolicitudesNoFinalizadas/',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                  console.log(response);
                  const ctx_three = document.getElementById('chartThree');
                  new Chart(ctx_three, {
                    type: 'pie',
                    data: {
                      labels: response.labels,
                      datasets: [{
                        label: '# de Solicitudes',
                        data: response.datasets,
                        borderWidth: 1,
                        backgroundColor: ['#041d49', '#74bc1f', '#00beff', '#0033a1']
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                }
              })
            </script>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3 mt-2">
      <div class="card">
        <div class="card-header">
         Gestión de solicitudes
        </div>
        <div class="card-body">
          <div>
            <canvas id="chartFour"></canvas>
            <div class="col-12">
              <button class="btn search-button" data-url="/administracion/reportes/getSolicitudesGestion/">
                Ver detalle <i class="fas fa-arrow-right"></i>
              </button>
            </div>
            <script>
              $.ajax({
                url: '/administracion/reportes/getSolicitudesGestion/',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                  console.log(response);
                  const ctx_four = document.getElementById('chartFour');
                  var datasets = response.datasets;
                  // datesets in object
                  var datasets = Object.values(datasets);
                  new Chart(ctx_four, {
                    type: 'pie',
                    data: {
                      labels: response.labels,
                      datasets: [{
                        label: '# de Solicitudes',
                        data: datasets,
                        borderWidth: 1,
                        backgroundColor: ['#041d49', '#74bc1f', '#00beff', '#0033a1']
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                }
              })
            </script>
          </div>
        </div>
      </div>
    </div>
    <div class="col-3 mt-2">
      <div class="card">
        <div class="card-header">
         Gestión de análisis
        </div>
        <div class="card-body">
          <div>
            <canvas id="chartFive"></canvas>
            <div class="col-12">
              <button class="btn search-button" data-url="/administracion/reportes/getSolicitudesAnalisis/">
                Ver detalle <i class="fas fa-arrow-right"></i>
              </button>
            </div>
            <script>
              $.ajax({
                url: '/administracion/reportes/getSolicitudesAnalisis/',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                  console.log(response);
                  const ctx_five = document.getElementById('chartFive');
                  var datasets = response.datasets;
                  // datesets in object
                  var datasets = Object.values(datasets);
                  new Chart(ctx_five, {
                    type: 'pie',
                    data: {
                      labels: response.labels,
                      datasets: [{
                        label: '# de Solicitudes',
                        data: datasets,
                        borderWidth: 1,
                        backgroundColor: ['#041d49', '#74bc1f', '#00beff', '#0033a1']
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                }
              })
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Agrega esto en tu HTML -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Detalle de Solicitudes</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Paso</th>
              <th># de Solicitudes</th>
              <th>Total</th>
              <th>Porcentaje</th>
            </tr>
          </thead>
          <tbody id="modalTableBody">
            <!-- Aquí se llenarán los datos de la tabla -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
