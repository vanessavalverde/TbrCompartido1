<!DOCTYPE html>

 <html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Gestion de Inscripcion</title>
  <link rel="stylesheet" href="css/css_est.css">
  
</head>
<body>

<h1 class="register-title">Estudiante del Curso</h1>
  <form class="register" action="../negocio/registroInscripcion.php" method="post">
   
	<?php
		require("../negocio/recuperarEstudiantes.php"); //incluye declaraciones implementadas
		$registros = array();
		$obj = new ListaEstudiantes();// instancio el objeto
		$registros = $obj->listar(); // recibo un vector de objetos
		if(isset($registros)){		
	?>		
			<tr>
			<label  class="" >Escoja el Estudiante</label>
				<select name="codigo" id="codigo">
				<?php foreach ($registros as $datos) { //muestra los registros en la tabla   
					echo " <option value='".$datos->codigo."'> ".$datos->codigo." </option>";
				 } //fin de foreach 
				 }//fin del if ?>
				</select>
					
				</div>
			</div>
			
			</tr>

	<?php
		require("../negocio/recuperarCursos.php");//incluye declaraciones implementadas
		$registros = array();
		$registros = array();
		$obj = new ListaCursos();
		$registros = $obj->listar();
		if(isset($registros)){		
	?>		
			<tr>
			<label for="name_surname" class="" >Escoja el curso</label>
				<select name="curso" id="curso">
					<?php foreach ($registros as $datos) { //muestra los registros en la tabla   
					echo " <option value='".$datos->nombre."'> ".$datos->nombre." </option>";
					 } //fin de foreach 
				 }//fin del if ?>
				</select>
					
				</div>
			</div>
			
			</tr>

    <input type="submit" name="submit" value="Inscribirse" class="register-button">
  </form>





	
		<?php
		require("../negocio/recuperarInscrito.php");
		$reginsc = array();
		$objinsc = new ListaInscritos();
		$reginsc = $objinsc->listar();
		if(isset($reginsc)){		
		?>
		
		
	<section>
	<link rel="stylesheet" href="css/css_listaestudiante.css">
	  <!--Inicio de tabla-->
	  <h1>Lista Estudiantes Inscritos por Cursos</h1>
	  <div class="tbl-header">
		<table cellpadding="0" cellspacing="0" border="0">
		  <thead>
			<tr>
			  <th>Codigo</th>	
			  <th>Nombres</th>
			  <th>Apellidos</th>
			  <th>Curso</th>
			  <th>Fecha Inicio</th>
			  <th>Fecha Fin</th>
			</tr>
		  </thead>
		</table>
	  </div>
	  <div class="tbl-content">
		<table cellpadding="0" cellspacing="0" border="0">
		  <tbody>
			
			<!--Escribir los datos en la tabla-->
			<tr>
			<?php foreach ($reginsc as $datoinc) { //muestra los registros en la tabla   
				if($datoinc !== end($reginsc)){     ?>
			  <!--Consumo de datos del archivo instructor curso y publicación en la tabla-->	
			  <td><?php echo $datoinc->codigoestudiante ?></td>
			  <!--llamada de la funcio devuelveDatosEst  y publicación en la tabla-->
			  <td><?php $est = devuelveDatosEst($datoinc->codigoestudiante); echo $nombre = $est->nombre; ?></td>
			  <td><?php echo $apellido = $est->apellido; ?> </td>
			  <!--Consumo de datos del archivo instructor curso y publicación en la tabla-->
			  <td><?php echo $datoinc->nombrecurso ?></td>
			  <!--llamada de la funcio devuelveDatosCurso  y publicación en la tabla-->
			  <td><?php $cur = devuelveDatosCurso($datoinc->nombrecurso); echo $fechainicio = $cur->fechainicio; ?></td>
			  <td><?php echo $fechafin = $cur->fechafin; ?> </td>
			  
			</tr>
		<?php	} // if del if que identifica el fin del array	
			} //fin de foreach
        } //fin de if  ?>
			
		  </tbody>
		</table>
	  </div>
	  <div>
		<table cellpadding="0" cellspacing="0" border="0">
			<tbody>
				<tr>
					<td>
						<button type="button" onclick="location.href='../vista/index.html'">Regresar</button>
					</td>
				</tr>
			</tbody>
		</table>	
	  </div>
	</section>
		
  </body>
</html>

<?php
    require_once("../negocio/recuperarEstudiantes.php");
	require_once("../entidades/estudiante.php");

	function devuelveDatosEst($codigoestudiante){
		
		$regest = array();
		$objest = new ListaEstudiantes();
		$regest = $objest->listar();
		if(isset($regest)){
			foreach ($regest as $datoest) {
				if($datoest->codigo == $codigoestudiante){ 
					$estudiante = new Estudiante($datoest->cedula,$datoest->nombre,$datoest->apellido,$datoest->codigo);
					break;
				}
			}   
		} 
		return $estudiante;
   }
?>

<?php
    require_once("../negocio/recuperarCursos.php");
	require_once("../entidades/curso.php");

	function devuelveDatosCurso($nombrecurso){
		
		$regcur = array();
		$objcur = new ListaCursos();
		$regcur = $objcur->listar();
		if(isset($regcur)){
			$num = count($regcur);
			$i=0;
			do {
				if(trim($regcur[$i]->nombre) == trim($nombrecurso)){ 
					$curso = new Curso($regcur[$i]->nombre,$regcur[$i]->descripcion,$regcur[$i]->fechainicio,$regcur[$i]->fechafin,$regcur[$i]->costo,$regcur[$i]->duracion,$regcur[$i]->cupo,$regcur[$i]->vigente,$regcur[$i]->inicio);
					break;
				}
				$i++;
			} while ($i < $num);
		}	
		return $curso;
   }
?>