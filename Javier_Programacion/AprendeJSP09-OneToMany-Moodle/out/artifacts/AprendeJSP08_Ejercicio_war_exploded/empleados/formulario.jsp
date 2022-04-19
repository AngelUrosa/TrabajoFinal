<%@ page import="java.util.Map" %>
<%@ page import="com.daw2.aprende.model.entity.Empleado" %>
<%@ page import="com.daw2.aprende.util.UtilFecha" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Empleado empleado = (Empleado) request.getAttribute("empleado");
    Map errorsItems = (Map) request.getAttribute("errorsItems");
%>

<div class="card bg-dark text-white row col-md-8 offset-md-2 mt-4">
    <div class="card-body">
        <div class="form-group row">
            <label for="nif" class="col-12 col-md-3 col-form-label">Nif <span class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-4">
                <input id="nif" name="nif" type="text"
                       value="<%=empleado.getNif()%>"
                       class="form-control"/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorNif") != null ? errorsItems.get("errorNif") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="nombre" class="col-12 col-md-3  col-form-label">Nombre <span
                    class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-9">
                <input id="nombre" name="nombre" type="text"
                       value="<%=empleado.getNombre()%>"
                       class="form-control"/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorNombre") != null ? errorsItems.get("errorNombre") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="apellido1" class="col-12 col-md-3  col-form-label">Apellido 1º <span
                    class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-9">
                <input id="apellido1" name="apellido1" type="text"
                       value="<%=empleado.getApellido1()%>"
                       class="form-control"/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorApellido1") != null ? errorsItems.get("errorApellido1") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="apellido2" class="col-12 col-md-3 col-form-label">Apellido2</label>
            <div class="col-12 col-md-9">
                <input id="apellido2" name="apellido2" type="text"
                       value="<%=empleado.getApellido2()%>"
                       class="form-control"/>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="telefono" class="col-12 col-md-3 col-form-label">Teléfono</label>
            <div class="col-12 col-md-9">
                <input id="telefono" name="telefono" type="text"
                       value="<%=empleado.getTelefono()%>"
                       class="form-control"/>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="sueldo" class="col-12 col-md-3 col-form-label">Sueldo</label>
            <div class="col-12 col-md-9">
                <input id="sueldo" name="sueldo" type="number"
                       value="<%=empleado.getSueldo()%>"
                       class="form-control"/>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="fechaAlta" class="col-12 col-md-3 col-form-label">Fecha de Alta</label>
            <div class="col-12 col-md-9">
                <input id="fechaAlta" name="fechaAlta" type="date"
                       value="<%=UtilFecha.dateTo_yyyy_mm_dd(empleado.getFechaAlta())%>"
                       class="form-control" size="10">
            </div>
        </div>

        <div class="row justify-content-end mt-3">
            <button type="submit" class="btn btn-primary col-12 col-md-4">Guardar</button>
        </div>

    </div>
</div>

