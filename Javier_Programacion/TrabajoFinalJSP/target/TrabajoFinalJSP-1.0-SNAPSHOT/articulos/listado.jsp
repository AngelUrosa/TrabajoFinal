<%@ page import="java.util.List" %>
<%@ page import="com.daw2final.trabajofinaljsp.model.entity.Articulo" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%
    List<Articulo> articulos = (List) request.getAttribute("articulos");
%>
<h2 class="text-center mt-4"><%=request.getParameter("titulo")%>
</h2>

<table class="table table-striped">
    <thead>
    <tr scope="row">
        <th scope="col">REF</th>
        <th scope="col">Descrpcion</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
        <th scope="col">Prov.</th>
    </tr>
    </thead>

    <tbody>
    <% for (Articulo articulo : articulos) {%>
    <tr scope="row">
        <td><%=articulo.getRef()%>
        </td>
        <td><%=articulo.getDescripcion()%>
        </td>
        <td><%=articulo.getPrecio()%>
        </td>
        <td><%=articulo.getStock()%>
        </td>
        <td><%=articulo.getProveedor() != null ? articulo.getProveedor().getNif() : ""%>
        </td>
    </tr>
    <%}%>
    </tbody>

</table>
