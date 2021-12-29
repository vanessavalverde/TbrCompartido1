<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Registro de Estudiantes</title>
  <link rel="stylesheet" href="css/css_listaestudiante.css">

</head>
<body>	
	<section>
	  <!--for demo wrap-->
        <h1 class="page-header">estudiantes</h1>

        <div class="tbl-header">
            <a class="btn btn-primary" href="?c=estudiante&a=Crud">Nueva estudiante</a>
            <a class="btn btn-primary" href="?c=principal&a=Index">Volver</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width:180px;">Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Genero</th>
                    <th>Id Programa</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($this->model->Listar() as $r): ?>
                <tr>
                    <td><?php echo $r->Nombre; ?></td>
                    <td><?php echo $r->Apellido; ?></td>
                    <td><?php echo $r->Edad; ?></td>
                    <td><?php echo $r->Genero; ?></td>
                    <td><?php echo $r->idPrograma; ?></td>
                    <td>
                        <a href="?c=estudiante&a=Crud&idEstudiante=<?php echo $r->idEstudiante; ?>">Editar</a>
                    </td>
                    <td>
                        <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=estudiante&a=Eliminar&idEstudiante=<?php echo $r->idEstudiante; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table> 
