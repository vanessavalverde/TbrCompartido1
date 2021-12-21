<h1 class="page-header">
    <?php echo $prg->IdPrograma != null ? $prg->Programa : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=programa">Programas</a></li>
  <li class="active"><?php echo $prg->IdPrograma != null ? $prg->Programa : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-programa" action="?c=programa&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $prg->IdPrograma; ?>" />
    
    <div class="form-group">
        <label>Programa</label>
        <input type="text" name="Programa" value="<?php echo $prg->Programa; ?>" class="form-control" />
    </div>
    
    <div class="form-group">
        <label>Activo</label>
        <input type="text" name="Activo" value="<?php echo $prg->Activo; ?>" class="form-control" />
    </div>
            
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-programa").submit(function(){
            return $(this).validate();
        });
    })
</script>