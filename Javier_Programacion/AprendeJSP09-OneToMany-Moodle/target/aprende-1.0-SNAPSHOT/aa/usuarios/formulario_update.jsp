<%@ page import="com.daw2.aprende.model.entity.Usuario" %>
<%@ page import="java.util.Map" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Usuario usuario = (Usuario) request.getAttribute("usuario");
    Map errorsItems = (Map) request.getAttribute("errorsItems");
%>


<form method="post" action="usuarios/actualiza">

    <input id="nifBusca" name="nifBusca" type="text"
           value=""
           class="form-control"/>
    <button type="submit" class="btn btn-primary">buscar</button>

</form>

</div>

</div>

