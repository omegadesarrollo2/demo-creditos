<div style="padding:40px;text-align:center;background:#FFF">
  <div style="display:inline-block;width:700px; box-shadow: 0 0 15px 3px #00000030">
    <table border="0" cellpadding="10" cellspacing="0" width="100%">
      <thead >
        <tr bgcolor="#FFFFFF">
          <td style="border-bottom: 3px solid #ae182e;">
            <img src="http://afianzafondos.com.co/wp-content/uploads/2022/06/logo_afianzafondos.png" height="100" tabindex="0">
          </td>
          <td style="border-bottom: 3px solid #ae182e;">
            <h2 style="color:#000000"><?php echo $this->asunto_correo ?></h2>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr bgcolor="#FFF">
          <td colspan="2" style="color:#6e6e6e;text-align:left">
            <div>
              <p>Sr.(a) Asociado(a), hemos recibido su solicitud, para continuar con el proceso para desembolso debe ingresar al siguiente enlace para firmar sus documentos: </p>
              <p><a href="<?php echo $this->url ?>" target="_blank"><?php echo $this->url ?></a></p>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>