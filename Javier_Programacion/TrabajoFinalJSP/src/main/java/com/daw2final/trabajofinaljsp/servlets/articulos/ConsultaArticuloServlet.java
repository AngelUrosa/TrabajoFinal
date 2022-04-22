package com.daw2final.trabajofinaljsp.servlets.articulos;

import com.daw2final.trabajofinaljsp.model.dao.ArticulosDao;
import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.dao.impl.ArticulosDaoImpl;
import com.daw2final.trabajofinaljsp.model.dao.impl.ProveedoresDaoImpl;
import com.daw2final.trabajofinaljsp.model.entity.Articulo;
import com.daw2final.trabajofinaljsp.model.entity.Proveedor;
import com.daw2final.trabajofinaljsp.services.ArticulosService;
import com.daw2final.trabajofinaljsp.services.ProveedoresService;
import com.daw2final.trabajofinaljsp.servlets.proveedores.ConsultaProveedorServlet;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.logging.Logger;




    //urlPatterns={"/usuarios/alta"}
    @WebServlet(value = "/articulos/consulta")
    public class ConsultaArticuloServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(com.daw2final.trabajofinaljsp.servlets.articulos.ConsultaArticuloServlet.class.getName());
        private ArticulosService articulosService;
        private ProveedoresDao proveedoresDao;

        public void init() {
            LOG.info("Inicializando ConsultaUsuarioServlet");
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
                    articulo = new Articulo("", "", 0,0,null);
                    request.setAttribute("alertWarning", "No se ha encontrado ningún proveedor con el Ref " + request.getParameter("refBusca"));
                    request.setAttribute("showButtonSubmit", false);
                } else {
                    request.setAttribute("alertInfo", "Proveedor encontrado.");
                    request.setAttribute("showButtonSubmit", true);
                }
            } else {
                articulo = new Articulo( 0, "", "",0, 0, null);
                request.setAttribute("showButtonSubmit", false);
            }
            request.setAttribute("articulo", articulo);
            request.setAttribute("articulos", articulosDao.listAllFillProv());
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.setAttribute("readonly", "readonly");
            request.setAttribute("disabled", "disabled");
            request.setAttribute("showButtonSubmit", false);
            request.getRequestDispatcher("/articulos/consulta.jsp").forward(request, response);
        }


        public void destroy() {
        }
    }
