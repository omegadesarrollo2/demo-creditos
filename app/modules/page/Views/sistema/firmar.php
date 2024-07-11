<div class="container">
  <div class="row">
    <div class="col-12">
      <form class="formITSign row mt-4" action="/page/sistema/completarFirma" method="post" id="formITSign">
        <input type="hidden" name="id" value="<?php echo $this->id; ?>">
        <input type="hidden" name="token" value="<?php echo $this->token; ?>">
        <input type="hidden" name="pagare" value="<?php echo $this->pagare_url; ?>">
        <input type="hidden" name="solicitud" value="<?php echo $this->solicitud_url; ?>">
        <div class="col-12 mb-4">
          <h2>Firmar Documentos</h2>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <h4>Pagaré</h4>
            </div>
            <div class="col-12">
              <object data="<?php echo $this->pagare_url ?>" type="application/pdf" width="100%" height="600px">
                <p>Tu navegador no soporta PDF. Descarga el archivo <a href="<?php echo $this->pagare_url ?>">aquí</a>.
                </p>
              </object>
            </div>
            <div class="col-12 pl-5 pt-3">
              <input type="checkbox" class="form-check-input" id="pagare_check" required>
              <label class="form-check-label" for="pagare_check">Acepto firma de pagare</label>
            </div>
          </div>
        </div>
        <div class="col-12 my-5">
          <div class="row">
            <div class="col-12">
              <h4>Solicitud de crédito</h4>
            </div>
            <div class="col-12">
              <object data="<?php echo $this->solicitud_url ?>" type="application/pdf" width="100%" height="600px">
                <p>Tu navegador no soporta PDF. Descarga el archivo <a href="<?php echo $this->solicitud_url ?>">aquí</a>.
                </p>
              </object>
            </div>
            <div class="col-12 pl-5 pt-3">
              <input type="checkbox" class="form-check-input" id="solicitud_check" required>
              <label class="form-check-label" for="solicitud_check">Acepto firma solicitud de crédito</label>
            </div>
          </div>
        </div>
        <div class="col-12 mb-5">
          <button type="submit" class="btn w-100" id="btnFirmar">Firmar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="loader">
  <div class="spinner-border text-danger" role="status">
  </div>
</div>
<style>
  #btnFirmar.disabled{
   filter: grayscale(1);
   cursor: not-allowed;
  }
  .loader{
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100%;
    background-color: #00000050;
    display: none;
    justify-content: center;
    align-items: center;
  }
  .loader.active{
    display: flex;
  }
</style>
<script>
  $("#pwd1, #pwd2").on('keyup', function () {
    let pwd1 = $("#pwd1").val()
    let pwd2 = $("#pwd2").val()
    if (pwd1 !== pwd2) {
      $("#pwd1").addClass('is-invalid')
      $("#pwd2").addClass('is-invalid')
      $("button").attr('disabled', true)
      $(".invalid-pwd").show()
    }
    else {
      $("#pwd1").removeClass('is-invalid')
      $("#pwd2").removeClass('is-invalid')
      $("button").attr('disabled', false)
      $(".invalid-pwd").hide()
    }
  })
  $('#formITSign').on('submit', function(e){
    e.preventDefault()
    $('#btnFirmar').attr('disabled', true)
    $('#btnFirmar').addClass('disabled')
    $('.loader').addClass('active')
    this.submit();
  })

</script>