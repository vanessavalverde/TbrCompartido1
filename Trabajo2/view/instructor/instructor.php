<h1 class="page-header">Instructores</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=instructor&a=Crud">Nueva Instructor</a>
    <a class="btn btn-primary" href="?c=principal&a=Index">Volver</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Titulo</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Apellido; ?></td>
            <td><?php echo $r->Edad; ?></td>
            <td><?php echo $r->Genero; ?></td>
            <td><?php echo $r->titulo; ?></td>
            <td>
                <a href="?c=instructor&a=Crud&idInstructor=<?php echo $r->idInstructor; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=instructor&a=Eliminar&idInstructor=<?php echo $r->idInstructor; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
