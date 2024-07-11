<form  autocomplete="off" action="/administracion/loginuser" method="post" >
    <div class="form-group " >
        <label class="control-label sr-only">Usuario</label>
        <div class="input-group">
            <i class="fas fa-user-tie icon-input-left"></i>
            <input type="text" class="form-control" id="user" name="user" placeholder="Usuario" required>
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label sr-only">Contraseña</label>
        <div class="input-group">
            <i class="fas fa-shield-alt icon-input-left"></i>
            <input type="password" class="form-control " id="password" name="password" placeholder="Contraseña" required>
            <div class="help-block with-errors"></div>
        </div>
    </div>
    <?php if($this->error_login){ ?>
        <div class="error_login"><?php echo $this->error_login; ?></div>
    <?php } ?>
    <input type="hidden" id="csrf" name="csrf" value="<?php echo $this->csrf; ?>" />
    <?php if($_GET["url"]!=""){ ?>
    <input type="hidden" name="url" value="<?php echo $_GET["url"]?>">
    <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
    <input type="hidden" name="e" value="<?php echo $_GET["e"]?>">
    <?php } ?>
    <div class="text-center"><a href="/administracion/index/olvido" class="olvido">¿Haz olvidado tu contraseña?</a></div>
    <div class="text-center"><button  class="btn-azul-login" type="submit">Entrar</button></div>
</form>