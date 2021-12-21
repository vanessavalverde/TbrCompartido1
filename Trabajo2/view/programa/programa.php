<h1 class="page-header">Programas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=programa&a=Crud">Nueva programa</a>
    <a class="btn btn-primary" href="?c=principal&a=Index">Volver</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Programa</th>
            <th>Activo</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Programa; ?></td>
            <td><?php echo $r->Activo; ?></td>
            <td>
                <a href="?c=programa&a=Crud&id=<?php echo $r->IdPrograma; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=programa&a=Eliminar&id=<?php echo $r->IdPrograma; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
