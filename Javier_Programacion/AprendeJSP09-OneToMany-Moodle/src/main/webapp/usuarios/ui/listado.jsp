<%@ page import="com.daw2.aprende.model.entity.Usuario" %>
<%@ page import="java.util.List" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%
    List<Usuario> usuarios = (List) request.getAttribute("usuarios");
%>
<h2 class="text-center mt-4"><%=request.getParameter("titulo")%>
</h2>

<table class="table table-striped">
    <thead>
    <tr scope="row">
        <th scope="col" class="text-center">NIF</th>
        <th scope="col" class="text-center">Nombre</th>
        <th scope="col" class="text-center">Apellido 1º</th>
        <th scope="col" class="text-center">Apellido 2º</th>
        <th scope="col" class="text-center">Acciones</th>
    </tr>
    </thead>

    <tbody>
    <% for (Usuario usuario : usuarios) {%>
    <tr scope="row">
        <td class="text-center"><%=usuario.getNif()%>
        </td>
        <td><%=usuario.getNombre()%>
        </td>
        <td><%=usuario.getApellido1()%>
        </td>
        <td><%=usuario.getApellido2()%>
        </td>
        <td class="text-center">
            <a href="usuarios/consulta?nifBusca=<%=usuario.getNif()%>">
                <button class="btn btn-success btn-sm">ver</button>
            </a>
            <a href="usuarios/actualiza?nifBusca=<%=usuario.getNif()%>">
                <button class="btn btn-info btn-sm">editar</button>
            </a>
            <a href="usuarios/borra?nifBusca=<%=usuario.getNif()%>">
                <button class="btn btn-danger btn-sm">borrar</button>
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>

</table>
