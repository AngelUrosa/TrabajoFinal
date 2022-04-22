<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>

<jsp:include page="/ui/head.jsp"></jsp:include>

<body>
<jsp:include page="/ui/header.jsp"></jsp:include>
<div class="container">
    <h2 class="text-center mt-4">Consulta Articulos</h2>
    <form method="get" action="articulos/consulta">
        <jsp:include page="filtroArticulos.jsp"></jsp:include>
    </form>
    <jsp:include page="formulario.jsp">
        <jsp:param name="readonly" value='readonly'/>
        <jsp:param name="disabled" value='disabled'/>
    </jsp:include>
    <hr/>

    <%--Probamos también el paso de parámetros --%>
    <jsp:include page="listado.jsp">
        <jsp:param name="titulo" value="Listado de articulos"/>
    </jsp:include>

</div>

<jsp:include page="/ui/footer.jsp"></jsp:include>

</body>
</html>
