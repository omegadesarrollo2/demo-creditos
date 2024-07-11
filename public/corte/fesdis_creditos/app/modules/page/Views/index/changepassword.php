<style type="text/css">
.logo2 {
    margin-top: -10px;
}
</style>
<?php //echo password_hash("admin.2008", PASSWORD_DEFAULT);?>
<div class="fondo_negro"></div>
<img src="/corte/fondo.jpg" class="fondo1">
<div class="container-fluid no-padding">

    <div class="container text-center zindexlogin">
        <div class="row">
            <div class="col-md-3 col-md-35"></div>
            <div class="col-md-12 col-lg-5">

                <form method="post" action="/page/index/changepassword" data-toggle="validator"
                    class="col-md-12 no_pad_cel borde_login">
                    <?php if ($this->error != '') {?>
            <div class="text-center alert alert-danger">
                <?= $this->error;?>
            </div>
            <br>
            <div class="text-center boton-cambio"><a href="/page/index" class="olvido">Volver al Login</a></div>
        <?php } else { ?>
            <?php if ($this->message != '') { ?>
                <div class="text-center alert alert-success">
                    <?php echo $this->message; ?>
                </div>
                <br>
                <div class="text-center boton-cambio"><a href="/page/index" class="olvido">Volver al Login</a></div>
            <?php }else{?>
                    <div align="center" class="caja_login col-md-12 no_pad_cel">
                        <div class="titulo_login_azul blanco col-md-12">Recordar contraseña</div>
                        <div align="center">
                            <div class="separador_login"></div>
                        </div>
                        <div class="col-sm-12 col-md-12 form-group">
                            <br><br>
                            <div class="col-sm-12 col-md-12 margen_icono">
                                <div class="row">
                                    <div class="col-md-2 no-padding z_icono"><img src="/corte/fedeaa_05.png"
                                            class="icono_usuario" /></div>
                                    <div class="col-md-10 no-padding"><label
                                            class="control-label sr-only">Contraseña:</label>
                                        <input type="password" name="password" id="inputPassword" class="form-control"
                                            placeholder="Contraseña" required value="" />
                                            <div class="help-block with-errors text-danger"></div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 margen_icono">
                                <div class="row">
                                    <div class="col-md-2 no-padding z_icono"><img src="/corte/fedeaa_05.png"
                                            class="icono_usuario" /></div>
                                    <div class="col-md-10 no-padding"><label class="control-label sr-only">Repita Contraseña:</label>
                            <input type="password" name="re_password" class="form-control" data-match="#inputPassword" data-match-error="Las dos Contraseñas no son iguales"  value="" placeholder="Repita Contraseña" required/>
                            <div class="help-block with-errors text-danger"></div>
                                    </div>
                                    
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="text-center w-100 my-4">
                                    <button class="btn btn-azul" type="submit">Enviar <i class="fas fa-chevron-right flecha"></i></button>
                                    </div>
                                    <input type="hidden" name="code" value="<?php echo $_GET["code"] ?>" />
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <input type="hidden" name="e" value="<?php echo $_GET['e']; ?>">
                    <input type="hidden" name="login_codeudor" value="<?php echo $_GET['login_codeudor']; ?>">
                    <?php } ?>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>



</div>