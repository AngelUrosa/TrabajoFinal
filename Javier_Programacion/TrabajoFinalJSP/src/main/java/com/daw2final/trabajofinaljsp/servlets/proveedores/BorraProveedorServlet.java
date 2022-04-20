package com.daw2final.trabajofinaljsp.servlets.proveedores;

import com.daw2final.trabajofinaljsp.model.dao.ProveedoresDao;
import com.daw2final.trabajofinaljsp.model.dao.impl.ProveedoresDaoImpl;
import com.daw2final.trabajofinaljsp.model.entity.Proveedor;
import com.daw2final.trabajofinaljsp.services.ProveedoresService;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.util.logging.Logger;


    //urlPatterns={"/usuarios/alta"}
    @WebServlet(value = "/proveedores/borra")
    public class BorraProveedorServlet extends HttpServlet {
        private final static Logger LOG = Logger.getLogger(BorraProveedorServlet.class.getName());
        private ProveedoresService proveedoresService;

        public void init() {
            LOG.info("Inicializando ConsultaUsuarioServlet");
            proveedoresService = ProveedoresService.getInstance();  // UsuariosService es un Singleton
        }

        @Override
        protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ProveedoresDao proveedoresDao = new ProveedoresDaoImpl();
            request.setCharacterEncoding("UTF-8");
            Proveedor proveedor;
            if (request.getParameter("nifBusca") != null) {  // Si se ha seleccionado un nif de busqueda
                String nifBusca = request.getParameter("nifBusca") != null ? request.getParameter("nifBusca").trim() : "";
                proveedor = proveedoresDao.getByNif(nifBusca);
                if (proveedor == null) {
                    proveedor = new Proveedor("", "", "", "","","","");
                    request.setAttribute("alertWarning", "No se ha encontrado ningún proveedor con el Nif " + request.getParameter("nifBusca"));
                    request.setAttribute("showButtonSubmit", false);
                } else {
                    request.setAttribute("alertInfo", "Proveedor encontrado.");
                    request.setAttribute("showButtonSubmit", true);
                }
            } else {
                proveedor = new Proveedor( "", "", "","", "", "", "");
                request.setAttribute("showButtonSubmit", false);
            }
            request.setAttribute("proveedor", proveedor);
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.setAttribute("readonly", "readonly");
            request.getRequestDispatcher("/proveedores/borra.jsp").forward(request, response);
        }


        @Override
        protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
            ProveedoresDao proveedoresDao = new ProveedoresDaoImpl();
            request.setCharacterEncoding("UTF-8");
            Proveedor proveedor = proveedoresService.requestToClass(request);

            if (proveedoresDao.deleteByNif(proveedor.getNif())) {
                String mensaje = "El proveedor " + proveedor.getNombre() + " " + proveedor.getApellido1() + " " + proveedor.getApellido2() + " ha sido modificado";
                request.setAttribute("alertSuccess", mensaje);
                proveedor = new Proveedor("", "", "", "","","","");
                request.setAttribute("readonly", "readonly");
            } else {
                String mensaje = "El proveedor " + proveedor.getNombre() + " " + proveedor.getApellido1() + " " + proveedor.getApellido2() + " no ha sido dado de alta. Ya existe un proveedor con el nif " + proveedor.getNif();
                request.setAttribute("alertDanger", mensaje);
            }
            request.setAttribute("proveedor", proveedor);
            request.setAttribute("proveedores", proveedoresDao.listAll());
            request.getRequestDispatcher("/proveedores/borra.jsp").forward(request, response);
        }


        public void destroy() {
        }
    }

