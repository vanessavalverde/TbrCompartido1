<h1 class="page-header">Materias</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=materia&a=Crud">Nueva Materia</a>
    <a class="btn btn-primary" href="?c=principal&a=Index">Volver</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Materia</th>
            <th>Semestre</th>
            <th>Id Programa</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Materia; ?></td>
            <td><?php echo $r->Semestre; ?></td>
            <td><?php echo $r->idPrograma; ?></td>
            <td>
                <a href="?c=materia&a=Crud&idMateria=<?php echo $r->idMateria; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=materia&a=Eliminar&idMateria=<?php echo $r->idMateria; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
