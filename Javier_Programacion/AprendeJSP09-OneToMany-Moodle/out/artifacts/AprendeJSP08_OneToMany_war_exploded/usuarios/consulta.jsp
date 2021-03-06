<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>

<jsp:include page="/ui/head.jsp"></jsp:include>

<body>
<jsp:include page="/ui/header.jsp"></jsp:include>
<div class="container">
    <h2 class="text-center mt-4">Consulta Usuario</h2>
    <form method="get" action="usuarios/consulta">
        <jsp:include page="ui/filtro.jsp"></jsp:include>
    </form>
    <jsp:include page="ui/formulario.jsp">
        <jsp:param name="readonly" value='readonly'/>
    </jsp:include>
    <hr/>

    <%--Probamos también el paso de parámetros --%>
    <jsp:include page="ui/listado.jsp">
        <jsp:param name="titulo" value="Listado de usuarios"/>
    </jsp:include>

</div>

<jsp:include page="/ui/footer.jsp"></jsp:include>

</body>
</html>
