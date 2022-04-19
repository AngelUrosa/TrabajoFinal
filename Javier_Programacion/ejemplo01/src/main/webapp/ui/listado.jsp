<%@ page import="java.util.List" %>
<%@ page import="com.daw2.ejemplo01.model.entity.Alumno" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%
    List<Alumno> alumnos = (List) request.getAttribute("alumnos");
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
        <th scope="col" class="text-center">Pago</th>

    </tr>
    </thead>

    <tbody>
    <% for (Alumno alumno : alumnos) {%>
    <tr scope="row">
        <td class="text-center"><%=alumno.getNif()%>
        </td>
        <td class="text-center"><%=alumno.getNombre()%>
        </td>
        <td class="text-center"><%=alumno.getApellido1()%>
        </td>
        <td class="text-center"><%=alumno.getApellido2()%>
        </td>
        <td class="text-center"><%=alumno.getPago()%>
        </td>
        <td class="text-center">
            <a href="alumnos/borra?nifBusca=<%=alumno.getNif()%>">
                <button class="btn btn-danger btn-sm">borrar</button>
            </a>
        </td>
    </tr>
    <%}%>
    </tbody>

</table>
