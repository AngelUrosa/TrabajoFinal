<%@ page import="com.daw2.ejemplo01.model.entity.Alumno" %>
<%@ page import="java.util.Map" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Alumno alumno = (Alumno) request.getAttribute("alumno");
    Map errorsItems = (Map) request.getAttribute("errorsItems");
    String readonly= request.getAttribute("readonly")!=null?(String)request.getAttribute("readonly"):"";
    boolean showButtonSubmit = request.getAttribute("showButtonSubmit")!=null?(boolean)request.getAttribute("showButtonSubmit"):true;
%>


<input name="id" type="hidden" value="<%=alumno.getId()%>"/>

<div class="card bg-dark text-white row col-md-8 offset-md-2 mt-4">
    <div class="card-body">
        <div class="form-group row">
            <label for="nif" class="col-12 col-md-3 col-form-label">Nif <span class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-4">
                <input id="nif" name="nif" type="text"
                       maxlength="15"
                       value="<%=alumno.getNif()%>"
                       class="form-control"
                        <%=readonly%> />
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorNif") != null ? errorsItems.get("errorNif") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="nombre" class="col-12 col-md-3  col-form-label">Nombre <span class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-9">
                <input  id="nombre" name="nombre" type="text"
                        maxlength="15"
                       value="<%=alumno.getNombre()%>"
                       class="form-control"
                        <%=readonly%>/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorNombre") != null ? errorsItems.get("errorNombre") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="apellido1" class="col-12 col-md-3  col-form-label">Apellido 1º <span class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-9">
                <input id="apellido1" name="apellido1" type="text"
                       maxlength="15"
                       value="<%=alumno.getApellido1()%>"
                       class="form-control"
                        <%=readonly%>/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorApellido1") != null ? errorsItems.get("errorApellido1") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="apellido2" class="col-12 col-md-3 col-form-label">Apellido2</label>
            <div class="col-12 col-md-9">
                <input id="apellido2" name="apellido2" type="text"
                       maxlength="15"
                       value="<%=alumno.getApellido2()%>"
                       class="form-control"
                        <%=readonly%>/>
            </div>
        </div>

        <div class="form-group row mt-1">
            <label for="pago" class="col-12 col-md-3 col-form-label">Pago</label>
            <div class="col-12 col-md-9">
                <input id="pago" name="pago" type="number"
                       value="<%=alumno.getPago()%>"
                       class="form-control"
                        <%=readonly%>/>
            </div>
        </div>

        <%if (showButtonSubmit) {%>
        <div class="row justify-content-end mt-3">
            <button type="submit" class="btn btn-primary col-12 col-md-4"><%=request.getParameter("tituloBoton")%></button>
        </div>
        <%}%>

    </div>
</div>
