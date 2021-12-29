<h1 class="page-header">
    <?php echo $inst->idInstructor!= null ? $inst->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=instructor">instructores</a></li>
  <li class="active"><?php echo $inst->idInstructor != null ? $inst->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form idInstructor="frm-instructor" action="?c=instructor&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idInstructor" value="<?php echo $inst->idInstructor; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $inst->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $inst->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Edad</label>
        <input type="text" name="Edad" value="<?php echo $inst->Edad; ?>" class="form-control" placeholder="Ingrese su edad" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Genero</label>
        <input type="text" name="Genero" value="<?php echo $inst->Genero; ?>" class="form-control" placeholder="Ingrese su genero" data-validacion-tipo="requerido|min:1|max:2" />
    </div>
    
    <div class="form-group">
        <label>Titulo</label>
        <input type="text" name="titulo" value="<?php echo $inst->titulo; ?>" class="form-control" placeholder="Ingrese su titulo" data-validacion-tipo="requerido|min:20" />
    </div>
        
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-instructor").submit(function(){
            return $(this).validate();
        });
    })
</script>