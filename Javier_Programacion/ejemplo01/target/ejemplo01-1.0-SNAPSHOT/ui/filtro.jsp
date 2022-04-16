<%@ page import="com.daw2.ejemplo01.model.entity" %>
<%@ page import="java.util.Map" %>
<%@ page import="com.daw2.ejemplo01.model.entity.Alumno" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Alumno usuario = (Alumno) request.getAttribute("alumno");
    Map errorsItems = (Map) request.getAttribute("errorsItems");
    String readonly = request.getAttribute("readonly") != null ? (String) request.getAttribute("readonly") : "";
%>

<div class="card bg-dark text-white row col-md-8 offset-md-2 mt-4">
    <div class="card-body">
        <div class="row">

            <div class="col-auto">
                <label for="nifBusca" class="col-form-label">NIF a buscar</label>
            </div>
            <div class="col-auto">
                <input id="nifBusca" name="nifBusca" type="text"
                       value=""
                       class="form-control"/>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>

        </div>
    </div>
</div>




