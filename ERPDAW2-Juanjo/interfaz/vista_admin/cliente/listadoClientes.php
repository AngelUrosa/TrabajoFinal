<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
</head>

<body>

    <h1>Listado de Clientes</h1>

    <div class="">
        <table class="table text-center table-light table-hover">
            <thead class="table bg-darkgreen">
                <tr>
                    <th scope="col">ID Cliente</th>
                    <th scope="col">ID Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido 1</th>
                    <th scope="col">Apellido 2</th>
                    <th scope="col">NIF</th>
                    <th scope="col">Nº Cuenta</th>
                    <th scope="col">Cómo nos conoció</th>
                    <th scope="col">Activo</th>
                </tr>
            </thead>
            <tbody">
                <?php
                $tCliente = Clientes::singletonClientes();
                $tf = $tCliente->getClientes();


                foreach ($tf as $f) {
                    echo "<tr>";
                    echo "<td>" . $f->getIdCliente() . "</td>";
                    echo "<td>" . $f->getIdUsuario() . "</td>";
                    echo "<td>" . $f->getNombre() . "</td>";
                    echo "<td>" . $f->getApellido1() . "</td>";
                    echo "<td>" . $f->getApellido2() . "</td>";
                    echo "<td>" . $f->getNif() . "</td>";
                    echo "<td>" . $f->getNumcta() . "</td>";
                    echo "<td>" . $f->getcomoNosConocio() . "</td>";
                    echo "<td>" . $f->getActivo() . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>



</body>

</html>