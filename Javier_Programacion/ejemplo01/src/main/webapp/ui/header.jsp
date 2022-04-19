<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" style="width: 50px;" alt="Logo"/>Alumnos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="alumnosDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Alumnos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="alumnosDropdown">
                        <li><a class="dropdown-item" href="alumnos/alta">Alta</a></li>
                        <li><a class="dropdown-item" href="alumnos/borra">Borrado</a></li>
                        <li><a class="dropdown-item" href="alumnos/listado">Listado</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<%if (request.getAttribute("alertSuccess") != null) {%>
<div class="alert alert-success mensaje-temporal"><%=request.getAttribute("alertSuccess")%>
</div>
<%}%>
<%if (request.getAttribute("alertDanger") != null) {%>
<div class="alert alert-danger mensaje-temporal"><%=request.getAttribute("alertDanger")%>
</div>
<%}%>
<%if (request.getAttribute("alertWarning") != null) {%>
<div class="alert alert-warning mensaje-temporal"><%=request.getAttribute("alertWarning")%>
</div>
<%}%>
<%if (request.getAttribute("alertInfo") != null) {%>
<div class="alert alert-info mensaje-temporal"><%=request.getAttribute("alertInfo")%>
</div>
<%}%>