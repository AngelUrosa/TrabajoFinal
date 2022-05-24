<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de proveedores</title>
</head>
<body>
    <h1>Listado de proveedores</h1>
    <div class="">
        <table class="table table-bordered text-center table-light table-hover">
            <thead class="table text-white bg-success">
                <tr>
                    <th scope="col">ID Proveedor</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido 1</th>
                    <th scope="col">Apellido 2</th>
                    <th scope="col">NIF</th>
                    <th scope="col">Código postal</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Activo</th>
                </tr>
            </thead>
            <tbody">
                <?php
                $tProveedor = Proveedores::singletonProveedores();
                $tf = $tProveedor->getProveedores();


                foreach ($tf as $f) {
                    echo "<tr>";
                    echo "<td>" . $f->getIdProveedor() . "</td>";
                    echo "<td>" . $f->getNombre() . "</td>";
                    echo "<td>" . $f->getApellido1() . "</td>";
                    echo "<td>" . $f->getApellido2() . "</td>";
                    echo "<td>" . $f->getNif() . "</td>";
                    echo "<td>" . $f->getCodPostal() . "</td>";
                    echo "<td>" . $f->getLocalidad() . "</td>";
                    echo "<td>" . $f->getProvincia() . "</td>";
                    echo "<td>" . $f->getActivo() . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>