<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>

<jsp:include page="/ui/head.jsp"></jsp:include>

<body>
<jsp:include page="/ui/header.jsp"></jsp:include>
<div class="container">
    <h2 class="text-center mt-4">Nuevo Proveedor</h2>

    <form method="post" action="proveedores/alta">
        <jsp:include page="formulario.jsp"></jsp:include>
    </form>
    <hr/>

    <%--Probamos también el paso de parámetros --%>
    <jsp:include page="listado.jsp">
        <jsp:param name="titulo" value="Listado de proveedores"/>
    </jsp:include>

</div>

<jsp:include page="/ui/footer.jsp"></jsp:include>

</body>
</html>
