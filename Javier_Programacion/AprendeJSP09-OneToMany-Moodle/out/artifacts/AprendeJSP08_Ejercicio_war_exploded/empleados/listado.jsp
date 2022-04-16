<%@ page import="java.util.List" %>
<%@ page import="com.daw2.aprende.model.entity.Empleado" %>
<%@ page import="com.daw2.aprende.util.UtilFecha" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%
    List<Empleado> empleados = (List) request.getAttribute("empleados");
%>
<h2 class="text-center mt-4"><%=request.getParameter("titulo")%></h2>

<table class="table table-striped">
    <thead>
    <tr scope="row">
        <th scope="col">NIF</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido 1º</th>
        <th scope="col">Apellido 2º</th>
        <th scope="col">Teléfono</th>
        <th scope="col">Sueldo</th>
        <th scope="col">F. Alta</th>
    </tr>
    </thead>

    <tbody>
    <% for (Empleado empleado : empleados) {%>
    <tr scope="row">
        <td><%=empleado.getNif()%>
        </td>
        <td><%=empleado.getNombre()%>
        </td>
        <td><%=empleado.getApellido1()%>
        </td>
        <td><%=empleado.getApellido2()%>
        </td>
        <td><%=empleado.getTelefono()%>
        </td>
        <td><%=empleado.getSueldo()%>
        </td>
        <td><%=UtilFecha.dateTo_dd_mm_yyyy(empleado.getFechaAlta(),'/')%>
        </td>
    </tr>
    <%}%>
    </tbody>

</table>
