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
        <th scope="col">NIF</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido 1º</th>
        <th scope="col">Apellido 2º</th>
    </tr>
    </thead>

    <tbody>
    <% for (Usuario usuario : usuarios) {%>
    <tr scope="row">
        <td><%=usuario.getNif()%>
        </td>
        <td><%=usuario.getNombre()%>
        </td>
        <td><%=usuario.getApellido1()%>
        </td>
        <td><%=usuario.getApellido2()%>
        </td>
    </tr>
    <%}%>
    </tbody>

</table>
