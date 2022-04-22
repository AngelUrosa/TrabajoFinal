<%@ page import="com.daw2final.trabajofinaljsp.model.entity.Articulo" %>
<%@ page import="java.util.Map" %>
<%@ page import="java.util.List" %>
<%@ page import="com.daw2final.trabajofinaljsp.model.entity.Proveedor" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Articulo articulo = (Articulo) request.getAttribute("articulo");
    Map errorsItems = (Map) request.getAttribute("errorsItems");
    List<Proveedor> proveedores = (List) request.getAttribute("proveedores");
    String readonly = request.getAttribute("readonly") != null ? (String) request.getAttribute("readonly") : "";
    String disabled = request.getAttribute("disabled") != null ? (String) request.getAttribute("disabled") : "";
%>

<div class="card bg-dark text-white row col-md-8 offset-md-2 mt-4">
    <div class="card-body">
        <div class="row">

            <div class="col-auto">
                <label for="refBusca" class="col-form-label">REF a buscar</label>
            </div>
            <div class="col-auto">
                <input id="refBusca" name="refBusca" type="text"
                       value=""
                       class="form-control"/>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>

        </div>
    </div>
</div>




