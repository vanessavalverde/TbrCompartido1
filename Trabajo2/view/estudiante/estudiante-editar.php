<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- Site CSS -->
      <link rel="stylesheet" href="css/style.css" />
<h1 class="page-header">
    <?php echo $est->idEstudiante!= null ? $est->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=estudiante">Estudiantes</a></li>
  <li class="active"><?php echo $est->idEstudiante != null ? $est->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form idEstudiante="frm-estudiante" action="?c=estudiante&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idEstudiante" value="<?php echo $est->idEstudiante; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $est->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $est->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Edad</label>
        <input type="text" name="Edad" value="<?php echo $est->Edad; ?>" class="form-control" placeholder="Ingrese su edad" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Genero</label>
        <input type="text" name="Genero" value="<?php echo $est->Genero; ?>" class="form-control" placeholder="Ingrese su genero" data-validacion-tipo="requerido|min:1|max:2" />
    </div>
    
    <div class="form-group">
        <label>Id Programa</label>
        <input type="text" name="idPrograma" value="<?php echo $est->idPrograma; ?>" class="form-control" placeholder="Ingrese su programa" data-validacion-tipo="requerido|min:1" />
    </div>
        
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-estudiante").submit(function(){
            return $(this).validate();
        });
    })
</script>