<h1 class="page-header">
    <?php echo $mat->idMateria != null ? $mat->Materia : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=materia">Materias</a></li>
  <li class="active"><?php echo $mat->idMateria != null ? $mat->Materia : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-materia" action="?c=materia&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $mat->idMateria; ?>" />
    
    <div class="form-group">
        <label>Materia</label>
        <input type="text" name="Materia" value="<?php echo $mat->Materia; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Semestre</label>
        <input type="text" name="Semestre" value="<?php echo $mat->Semestre; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Id Programa</label>
        <input type="text" name="idPrograma" value="<?php echo $mat->idPrograma; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
        
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-materia").submit(function(){
            return $(this).validate();
        });
    })
</script>