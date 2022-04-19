<%@ page import="java.util.Map" %>
<%@ page import="com.daw2final.trabajofinaljsp.model.entity.Articulo" %>
<%@ page import="com.daw2final.trabajofinaljsp.model.entity.Proveedor" %>
<%@ page import="java.util.List" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Articulo articulo = (Articulo) request.getAttribute("articulos");
    Map errorsItems = (Map) request.getAttribute("errorsItems");
    List<Proveedor> proveedores = (List) request.getAttribute("proveedores");
%>

<div class="card bg-dark text-white row col-md-8 offset-md-2 mt-4">
    <div class="card-body">
        <div class="form-group row">
            <label for="ref" class="col-12 col-md-3 col-form-label">Ref <span class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-4">
                <input id="ref" name="ref" type="text"
                       value="<%=articulo.getRef()%>"
                       class="form-control"/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorRef") != null ? errorsItems.get("errorRef") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="descripcion" class="col-12 col-md-3  col-form-label">Descrpcion <span
                    class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-9">
                <input id="descripcion" name="descripcion" type="text"
                       value="<%=articulo.getDescripcion()%>"
                       class="form-control"/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorDescripcion") != null ? errorsItems.get("errorDescripcion") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="precio" class="col-12 col-md-3  col-form-label">Precio<span
                    class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-9">
                <input id="precio" name="precio" type="number"
                       value="<%=articulo.getPrecio()%>"
                       class="form-control"/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorPrecio") != null ? errorsItems.get("errorPrecio") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="stock" class="col-12 col-md-3 col-form-label">Stock</label>
            <div class="col-12 col-md-9">
                <input id="stock" name="stock" type="number"
                       value="<%=articulo.getStock()%>"
                       class="form-control"/>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="idProveedor" class="col-12 col-md-3 col-form-label">Proveedores</label>
            <div class="col-12 col-md-9">
                <select id="idProveedor" name="idProveedor" class="form-select" aria-label="Default select example">
                    <option selected>Seleccione el proveedor</option>
                    <%for (Proveedor prov : proveedores) {%>
                    <option value="<%=prov.getId()%>"><%=prov.getNombre()%><%=prov.getApellido1()%>
                    </option>
                    <%}%>
                </select>
            </div>
        </div>

        <div class="row justify-content-end mt-3">
            <button type="submit" class="btn btn-primary col-12 col-md-4">Guardar</button>
        </div>

    </div>
</div>

