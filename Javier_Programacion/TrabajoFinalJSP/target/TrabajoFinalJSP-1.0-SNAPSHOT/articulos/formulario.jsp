<%@ page import="java.util.Map" %>
<%@ page import="com.daw2final.trabajofinaljsp.model.entity.Articulo" %>
<%@ page import="com.daw2final.trabajofinaljsp.model.entity.Proveedor" %>
<%@ page import="java.util.List" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<%
    Articulo articulo = (Articulo) request.getAttribute("articulo");
    Map errorsItems = (Map) request.getAttribute("errorsItems");
    List<Proveedor> proveedores = (List) request.getAttribute("proveedores");
    String readonly = request.getAttribute("readonly") != null ? (String) request.getAttribute("readonly") : "";
    boolean showButtonSubmit = request.getAttribute("showButtonSubmit") != null ? (boolean) request.getAttribute("showButtonSubmit") : false;
%>

<input name="id" type="hidden" value="<%=articulo.getId()%>"/>


<div class="card bg-dark text-white row col-md-8 offset-md-2 mt-4">
    <div class="card-body">
        <div class="form-group row">
            <label for="ref" class="col-12 col-md-3 col-form-label">Ref <span class="text-danger text-sm-left">*</span></label>
            <div class="col-12 col-md-4">
                <input id="ref" name="ref" type="text"
                       placeholder=""
                       value="<%=articulo.getRef()%>"
                       class="form-control"
                        <%=readonly%>/>
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
                       placeholder=""
                       value="<%=articulo.getDescripcion()%>"
                       class="form-control"
                        <%=readonly%>/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorDescripcion") != null ? errorsItems.get("errorDescripcion") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="precio" class="col-12 col-md-3  col-form-label">Precio<span
                    class="text-danger text-sm-left"></span></label>
            <div class="col-12 col-md-9">
                <input id="precio" name="precio" type="number"
                       placeholder=""
                       value="<%=articulo.getPrecio()%>"
                       class="form-control"
                        <%=readonly%>/>
                <small class="form-text text-danger">
                    <%=errorsItems != null && errorsItems.get("errorPrecio") != null ? errorsItems.get("errorPrecio") : ""%>
                </small>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="stock" class="col-12 col-md-3 col-form-label">Stock</label>
            <div class="col-12 col-md-9">
                <input id="stock" name="stock" type="number"
                       placeholder=""
                       value="<%=articulo.getStock()%>"
                       class="form-control"
                        <%=readonly%>/>
            </div>
        </div>
        <div class="form-group row mt-1">
            <label for="proveedor" class="col-12 col-md-3 col-form-label">Proveedores</label>
            <div class="col-12 col-md-9">
                <select id="proveedor" name="idProveedor" class="form-select"
                        <%=readonly%> aria-label="Default select example">
                    <option selected>Seleccione el proveedor</option>
                    <%for (Proveedor prov : proveedores) {%>
                    <option value="<%=prov.getId()%>"><%=prov.getNombre()%><%=prov.getApellido1()%>
                    </option>
                    <%}%>
                </select>
            </div>
        </div>

        <%if (showButtonSubmit) {%>
        <div class="row justify-content-end mt-3">
            <button type="submit" class="btn btn-primary col-12 col-md-4"><%=request.getParameter("tituloBoton")%>
            </button>
        </div>
        <%}%>

    </div>
</div>

