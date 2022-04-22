package com.daw2final.trabajofinaljsp.servlets.articulos;

import com.daw2final.trabajofinaljsp.model.dao.ArticulosDao;
import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.dao.impl.ArticulosDaoImpl;
import com.daw2final.trabajofinaljsp.model.dao.impl.ProveedoresDaoImpl;
import com.daw2final.trabajofinaljsp.model.entity.Articulo;
import com.daw2final.trabajofinaljsp.services.ArticulosService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.logging.Logger;



    //urlPatterns={"/usuarios/alta"}
    @WebServlet(value = "/articulos/borra")
    public class BorraArticuloServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(com.daw2final.trabajofinaljsp.servlets.articulos.BorraArticuloServlet.class.getName());
        private ArticulosService articulosService;
        private ProveedoresDao proveedoresDao;


        public void init() {
            LOG.info("Inicializando ConsultaUsuarioServlet");
            articulosService = ArticulosService.getInstance();
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
                    request.setAttribute("alertWarning", "No se ha encontrado ningún articulos con esa Ref " + request.getParameter("refBusca"));
                    request.setAttribute("showButtonSubmit", false);
                } else {
                    request.setAttribute("alertInfo", "Articulo encontrado.");
                    request.setAttribute("showButtonSubmit", true);
                }
            } else {
                articulo = new Articulo("", "",0, 0, null);
                request.setAttribute("showButtonSubmit", false);
            }
            request.setAttribute("articulo", articulo);
            request.setAttribute("articulos", articulosDao.listAllFillProv());
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.setAttribute("readonly", "readonly");
            request.setAttribute("disabled", "disabled");
            request.getRequestDispatcher("/articulos/borra.jsp").forward(request, response);
        }


        @Override
        protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ArticulosDao articulosDao = new ArticulosDaoImpl();
            request.setCharacterEncoding("UTF-8");
            Articulo articulo = articulosService.requestToClass(request);

            if (articulosDao.delete(articulo.getId())) {
                String mensaje = "El articulo " + articulo.getRef() + " " + articulo.getDescripcion() + " ha sido modificado";
                request.setAttribute("alertSuccess", mensaje);
                articulo = new Articulo(0, "", "", 0,0,null);
                request.setAttribute("readonly", "readonly");
            } else {
                String mensaje = "El articulo "+ articulo.getRef() + " " + articulo.getDescripcion() + " no ha sido dado de alta. Ya existe un proveedor con el ref " + articulo.getRef();
                request.setAttribute("alertDanger", mensaje);
            }
            request.setAttribute("articulo", articulo);
            request.setAttribute("articulos", articulosDao.listAllFillProv());
            request.getRequestDispatcher("/articulos/listar.jsp").forward(request, response);
        }


        public void destroy() {
        }
    }

