<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>

<jsp:include page="/ui/head.jsp"></jsp:include>

<body>
<jsp:include page="/ui/header.jsp"></jsp:include>

<div class="container">
    <jsp:include page="listado.jsp">
        <jsp:param name="titulo" value="Listado de articulos"/>
    </jsp:include>
</div>

<jsp:include page="/ui/footer.jsp"></jsp:include>

</body>
</html>
