

<div class="container">
	<div class="row">
	    <form id="form1" name="form1" method="post" action="/page/sistema/guardarpaso/" class="col-12">
			<div class="col-12">
				<div class="row">
					<div class="col-6 text-left"><h3 class="titulo">Solicitud WEB<?php echo $this->numero; ?></h3></div>
					<div align="left" class="col-12">
						<div class="separador_login2"></div>
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="row form-group">

					<div class="col-md-12 col-lg-12">

						<?php if($_GET['mod']!="detalle_solicitud"){ ?>
							<div class="row text-center">
								<div class="col-12 titulo-seccion">Solicitud radicada</div>
								<div class="col-12 text-center texto-solcompleta"><br><p class="text-center">Apreciado asociado, su solicitud de crédito ha sido radicada.<br></p>
								</div>
                <div class="col-12">
                  <ul id="requirement-list">
                    <li class="requirement-item animate__animated">
                      <div class="d-flex align-items-center">
                          <div class="icono-estado text-success"><i class="fas fa-check-circle"></i></div>
                          <div class="texto-estado">Validación de datos</div>
                      </div>
                    </li>
                    <li class="requirement-item animate__animated">
                      <div class="d-flex align-items-center">
                        <div class="icono-estado text-success"><i class="fas fa-check-circle"></i></div>
                        <div class="texto-estado">Linea de crédito habilitada para ti</div>
                      </div>
                    </li>
                    <li class="requirement-item animate__animated">
                      <div class="d-flex align-items-center">
                          <div class="icono-estado text-success"><i class="fas fa-check-circle"></i></div>
                          <div class="texto-estado">Condiciones aprobadas</div>
                      </div>
                    </li>
                    <li class="requirement-item animate__animated">
                      <div class="d-flex align-items-center">
                        <?php if($this->solicitud->validacion == '1'){ ?>
                          <div class="icono-estado text-success"><i class="fas fa-check-circle"></i></div>
                          <div class="texto-estado">Estudio datacredito</div>
                        <?php }else{ ?>
                          <div class="icono-estado text-danger"><i class="fas fa-times-circle"></i></div>
                          <div class="texto-estado">Estudio datacredito</div>
                        <?php } ?>
                      </div>
                    </li>
                    <li class="requirement-item animate__animated">
                      <div class="d-flex align-items-center">
                        <?php if($this->solicitud->validacion == '1'){ ?>
                          <div class="alert alert-success" role="alert">
                            ¡Felicitaciones! Tu solicitud ha sido aprobada. <br>
                            Muy pronto recibiras un correo para continuar con la firma de tus documentos y el desembolso de tu crédito.
                          </div>
                        <?php }else{ ?>
                          <div class="alert alert-danger" role="alert">
                            Lamentablemente no podemos aprobar tu solicitud en este momento, por favor comunícate con nosotros para más información.
                          </div>
                        <?php } ?>
                      </div>
                    </li>
                  </ul>
                </div>
							</div>
						<?php } ?>
						<div class="row">
							<div class="col-lg-8 offset-lg-2">
								<?php echo $this->tabla; ?>
							</div>
						</div>

					</div>

				</div>
			</div>





	    </form>
	</div>
</div>

<?php
if($this->solicitud->recoger_credito!="1" and $this->solicitud->correo_aprobacion_enviado!="1" and 1==0){
?>
<div style="display:none;">
  <iframe src="https://creditosfondtodos.com.co/administracion/solicitudes/correoaprobacion/?id=<?php echo $this->id ?>"></iframe>
</div>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        // Tiempo entre animaciones en milisegundos
        const animationInterval = 1000;

        // Obtén todos los elementos de la lista
        const items = $('#requirement-list .requirement-item');

        // Función para animar los ítems uno por uno
        function animateItems(index) {
            if (index < items.length) {
                // Agrega la clase de animación
                $(items[index]).addClass('animate__fadeIn');
                // Llama a la función recursivamente después del intervalo
                setTimeout(function() {
                    animateItems(index + 1);
                }, animationInterval);
            }
        }

        // Inicia la animación con el primer ítem
        animateItems(0);
    });
</script>

<style>
  .requirement-item {
    opacity: 0; /* Ocultar ítems inicialmente */
  }

  .requirement-item.animate__fadeIn {
    opacity: 1; /* Mostrar ítems cuando se animan */
  }
  ul{
    list-style: none;
  }

  ul li{
    padding: 15px 30px;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    font-size: 20px;
    margin-bottom: 15px;
  }
  ul li i{
    font-size: 40px;
    margin-right: 20px;
  }
</style>