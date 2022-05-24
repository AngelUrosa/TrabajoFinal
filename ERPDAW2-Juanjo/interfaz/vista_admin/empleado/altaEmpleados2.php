<script src="js/formulario-bootstrap.js" defer></script>
<script src="js/combo_ajax.js" defer></script><script>
    window.addEventListener("load", function () {


        inicializarCombo('provincia', 'ajax.php?script=comboPoblacionesJSON', 'localidad')

    });
</script>
<h1>Empleado</h1>
	<form name=altaCliente method="POST" action="indexAdminAlumnos.php?principal=interfaz/vista_admin/empleado/altaEmpleados.php">

	<div class="mb-3">
		<label for="nombre" class="form-label">Nombre</label>
		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
	</div>
	<div class="mb-3">
		<label for="apellido1" class="form-label">Apellido 1</label>
		<input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Primer Apellido">
	</div>
	<div class="mb-3">
		<label for="apellido2" class="form-label">Apellido 2</label>
		<input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido">
	</div>
	<div class="mb-3">
		<label for="nif" class="form-label">NIF</label>
		<input type="text" class="form-control" id="nif" name="nif" placeholder="NIF">
	</div>
	<div class="mb-3">
		<label for="numcta" class="form-label">Número de cuenta</label>
		<input type="text" class="form-control" id="numcta" name="numcta" placeholder="Número de cuenta">
	</div>
	<div class="mb-3">
		<label for="movil" class="form-label">Móvil</label>
		<input type="text" class="form-control" id="movil" name="movil" placeholder="Movil">
	</div>

	<div class="mb-3">
		<label for="direccion" class="form-label">Dirección</label>
		<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
	</div>

	<div class="mb-3">
		<label for="codPostal" class="form-label">Código postal</label>
		<input type="text" class="form-control" id="codPostal" name="codPostal" placeholder="Código Postal">
	</div>

	<div class="mb-3">
		<label for="pais" class="form-label">País</label>
		<input type="text" class="form-control" id="pais" name="pais" placeholder="Pais">
	</div>

	<div class="mb-3">
		<label for="rutafoto" class="form-label">Ruta foto</label>
		<input type="text" class="form-control" id="rutafoto" name="rutafoto" placeholder="rutafoto">
	</div>
	<div class="mb-3">
		<label for="provincia" class="form-label">Provincia</label>
		<select name="provincia" id="provincia" class="form-control">
			<option value="1">Cáceres</option>
			<option value="2">Badajoz</option>
		</select>                                
	</div>
	<div class="mb-3">
		<label for="localidad" class="form-label">Localidad</label>
		<select name="localidad" id="localidad" class="form-control">
		</select>                                
	</div>
	<div class="col-12">
    	<button class="btn btn-primary" name="alta"  type="submit">Enviar</button>
    	<button class="btn btn-danger float-right" name="reset"  type="reset">Borrar</button>
  	</div>	
	
	</fieldset>
	</form>

    <?php 
	
	if (isset($_POST['alta'])){
		//Estos significa que el usuario ha pulsado el botón submit

		$tEmpleado=Empleados::singletonEmpleados();
		$nombre=$_POST['nombre'];
		$apellido1=$_POST['apellido1'];
		$apellido2=$_POST['apellido2'];
		$nif=$_POST['nif'];
		$numcta=$_POST['numcta'];
        $movil=$_POST['movil'];
        $direccion=$_POST['direccion'];
        $codPostal=$_POST['codPostal'];
        $provincia=$_POST['provincia'];
		$localidad=$_POST['localidad'];
        $pais=$_POST['pais'];
        $rutafoto=$_POST['rutafoto'];

		//testear que no se repitan nombres de familias
		//controlar la unicidad de nombres
		$id=1; //cualquier valor xq lo genera la bd
		$idEmpleado=1; ///algoritmo que elabore el idFamilia
		$idDepartamento=1;
        $idUsuario=1;
		$activo=1; //constante cada vez que se trate de dar de alta una nueva familia (por defecto)
		$c=new Empleado($id,$idEmpleado,$idDepartamento,$idUsuario,$nombre,$apellido1,$apellido2,$nif,$numcta,$movil,$direccion,$codPostal,$provincia,$localidad,$pais,$rutafoto,$activo);
		//pregunta de Alvaro

		$insertado=$tEmpleado->addUnEmpleado($c);

		if ($insertado){
			echo "Se ha insertado satisfactoriamente";
		}
		else{
			echo "Ha habido algún error en la inserción de empleado";
		}
	}
 ?>
</body>
</html>