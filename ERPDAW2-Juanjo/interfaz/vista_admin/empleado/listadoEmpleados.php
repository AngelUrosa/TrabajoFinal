<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
</head>

<body>

    <h1>Listado de Empleados</h1>

    <div class="table-responsive">
        <table class="table table-bordered text-center table-light table-hover">
            <thead class="table text-white bg-success">
                <tr>
                    <th scope="col">ID Empleado</th>
                    <th scope="col">ID Departamento</th>
                    <th scope="col">ID Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido 1</th>
                    <th scope="col">Apellido 2</th>
                    <th scope="col">NIF</th>
                    <th scope="col">Nº Cuenta</th>
                    <th scope="col">Móvil</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Código Postal</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">País</th>
                    <th scope="col">Ruta foto</th>
                    <th scope="col">Activo</th>
                </tr>
            </thead>
            <tbody">
                <?php
                $tEmpleado = Empleados::singletonEmpleados();
                $tf = $tEmpleado->getEmpleados();


                foreach ($tf as $f) {
                    echo "<tr>";
                    echo "<td>" . $f->getIdEmpleado(). "</td>";
                    echo "<td>" . $f->getIdDepartamento() . "</td>";
                    echo "<td>" . $f->getIdUsuario() . "</td>";
                    echo "<td>" . $f->getNombre() . "</td>";
                    echo "<td>" . $f->getApellido1() . "</td>";
                    echo "<td>" . $f->getApellido2() . "</td>";
                    echo "<td>" . $f->getNif() . "</td>";
                    echo "<td>" . $f->getNumcta() . "</td>";
                    echo "<td>" . $f->getMovil() . "</td>";
                    echo "<td>" . $f->getDireccion() . "</td>";
                    echo "<td>" . $f->getCodPostal() . "</td>";
                    echo "<td>" . $f->getLocalidad() . "</td>";
                    echo "<td>" . $f->getProvincia() . "</td>";
                    echo "<td>" . $f->getPais() . "</td>";
                    echo "<td>" . $f->getRutaFoto() . "</td>";
                    echo "<td>" . $f->getActivo() . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>



</body>

</html>