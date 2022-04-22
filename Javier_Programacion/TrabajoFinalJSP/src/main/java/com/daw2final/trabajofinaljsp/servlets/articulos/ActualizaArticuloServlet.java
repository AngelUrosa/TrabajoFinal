package com.daw2final.trabajofinaljsp.servlets.articulos;

import com.daw2final.trabajofinaljsp.model.dao.ArticulosDao;
import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.dao.impl.ArticulosDaoImpl;
import com.daw2final.trabajofinaljsp.model.dao.impl.ProveedoresDaoImpl;
import com.daw2final.trabajofinaljsp.model.entity.Articulo;
import com.daw2final.trabajofinaljsp.model.entity.Proveedor;
import com.daw2final.trabajofinaljsp.services.ArticulosService;
import com.daw2final.trabajofinaljsp.services.ProveedoresService;
import com.daw2final.trabajofinaljsp.servlets.proveedores.ActualizaProveedorServlet;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.Map;
import java.util.logging.Logger;







    @WebServlet(value = "/articulos/actualiza")
    public class ActualizaArticuloServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(com.daw2final.trabajofinaljsp.servlets.articulos.ActualizaArticuloServlet.class.getName());
        private ArticulosService articulosService;
        private ProveedoresDao proveedoresDao;

        public void init() {
            LOG.info("Inicializando ActualizaUsuarioServlet");
            articulosService = ArticulosService.getInstance();  // UsuariosService es un Singleton
            proveedoresDao = new ProveedoresDaoImpl();
        }

        @Override
        protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ArticulosDao articulosDao = new ArticulosDaoImpl();
            request.setCharacterEncoding("UTF-8");
            Articulo articulo;
            if (request.getParameter("refBusca") != null) {  // Si se ha seleccionado un nif de busqueda
                String refBusca = request.getParameter("refBusca") != null ? request.getParameter("refBusca").trim() : "";
                articulo = articulosDao.getByRef(refBusca);
                if (articulo == null) {
                    articulo = new Articulo(0,"", "", 0, 0,null);
                    request.setAttribute("alertWarning", "No se ha encontrado ningún articulo con esa Referecia " + request.getParameter("refBusca"));
                } else {
                    request.setAttribute("alertInfo", "Articulo encontrado. Puede modificarlo ahora");
                }
            } else {
                articulo = new Articulo(0,"", "", 0, 0,null);
            }

            if (articulo.getId() != null) {
                request.setAttribute("readonly", "");
                request.setAttribute("showButtonSubmit", true);
            } else
                request.setAttribute("readonly", "readonly");

            request.setAttribute("articulo", articulo);
            request.setAttribute("articulos", articulosDao.listAllFillProv());
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.getRequestDispatcher("/articulos/actualiza.jsp").forward(request, response);


        }

        @Override
        protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ArticulosDao articulosDao = new ArticulosDaoImpl();
            request.setCharacterEncoding("UTF-8");
            Articulo articulo = articulosService.requestToClass(request);

            Map<String, String> errorsItems = articulosService.errors(request);

            if (errorsItems.isEmpty()) {
                if (articulosDao.update(articulo)) {
                    String mensaje = "El articulo " + articulo.getRef() + " " + articulo.getDescripcion() + " ha sido modificado";
                    request.setAttribute("alertSuccess", mensaje);
                    articulo = new Articulo(0, "", "", 0,0,null);
                    request.setAttribute("readonly", "readonly");
                    request.setAttribute("showButtonSubmit", false);
                } else {
                    String mensaje = "El articulo " + articulo.getRef() + " " + articulo.getDescripcion() + " no ha sido dado de alta. Ya existe un articulo con el ref " + articulo.getRef();
                    request.setAttribute("alertDanger", mensaje);
                    request.setAttribute("showButtonSubmit", true);
                }
            } else {
                request.setAttribute("alertDanger", "Los datos no son correctos, no se pudo guardar los datos");
                request.setAttribute("showButtonSubmit", true);
            }
            request.setAttribute("errorsItems", errorsItems);
            request.setAttribute("articulo", articulo);
            request.setAttribute("articulos", articulosDao.listAll());
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.getRequestDispatcher("/articulos/listar.jsp").forward(request, response);
        }

        public void destroy() {
        }
    }



