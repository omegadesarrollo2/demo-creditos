<?php echo $this->contenidos; ?>
<?php if($this->editoromega == 1){?>
    <div class="text-right">
        <a class="btn-seccion btn-verde ls-modal" href="/editor/seccion/manage?seccion=<?php echo $this->seccion; ?>&url=page"><i class="fas fa-plus"></i></a>
    </div>
<?php } ?>