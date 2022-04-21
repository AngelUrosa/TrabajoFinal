<%@ page import="java.util.List" %>
<%@ page import="com.daw2final.trabajofinaljsp.model.entity.Proveedor" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%
    List<Proveedor> proveedores = (List) request.getAttribute("proveedores");
%>
<h2 class="text-center mt-4"><%=request.getParameter("titulo")%>
</h2>

<table class="table table-striped">
    <thead>
    <tr scope="row">
        <th scope="col">NIF</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido 1º</th>
        <th scope="col">Apellido 2º</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Email</th>
        <th scope="col">Razon Social</th>
    </tr>
    </thead>

    <tbody>
    <% for (Proveedor proveedor : proveedores) {%>
    <tr scope="row">
        <td><%=proveedor.getNif()%>
        </td>
        <td><%=proveedor.getNombre()%>
        </td>
        <td><%=proveedor.getApellido1()%>
        </td>
        <td><%=proveedor.getApellido2()%>
        </td>
        <td><%=proveedor.getTelefono()%>
        </td>
        <td><%=proveedor.getEmail()%>
        </td>
        <td><%=proveedor.getRazonSocial()%>
        </td>
        <td class="text-center">
            <a href="proveedores/alta">
                <button class="btn btn-secondary btn-sm">alta</button>
            </a>
            <a href="proveedores/consulta?nifBusca=<%=proveedor.getNif()%>">
                <button class="btn btn-success btn-sm">ver</button>
            </a>
            <a href="proveedores/actualiza?nifBusca=<%=proveedor.getNif()%>">
                <button class="btn btn-info btn-sm">editar</button>
            </a>
            <a href="proveedores/borra?nifBusca=<%=proveedor.getNif()%>">
                <button class="btn btn-danger btn-sm">borrar</button>
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>

</table>
